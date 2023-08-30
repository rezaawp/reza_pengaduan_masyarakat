<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use App\Models\Petugas;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use PHPUnit\Event\Code\Throwable;
use Symfony\Component\Translation\CatalogueMetadataAwareInterface;

use function Pest\Laravel\json;

class RegisteredAdminController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'no_telp' => ['required', 'min:10', 'max:15']
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_done' => true
            ]);

            $user->assignRole('admin');

            $validasiDataMasyarakat = Validator::make(['no_telp' => $request->no_telp], [
                'no_telp' => ['unique:petugas,telp']
            ]);

            if ($validasiDataMasyarakat->fails()) {
                DB::rollBack();
                return redirect()->back()->withInput($request->input())->withErrors($validasiDataMasyarakat->errors());
            }

            Petugas::create([
                'user_id' => $user->id,
                'telp' => $request->no_telp
            ]);

            DB::commit();

            event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        } catch (Throwable $e) {
            DB::rollBack();
            if (env('APP_ENV') == 'local') report($e);
            abort(500);
        }
    }

    function isiDataDiri(Request $request)
    {
        DB::beginTransaction();
        try {

            $user = Auth::user();
            $roles = collect($user->getRoleNames())->toArray();

            $rulesValidasi = [
                'nik' => ['required', 'min:16', 'max:16', 'unique:masyarakat,nik'],
                'no_telp' => ['required', 'min:10', 'max:15', 'unique:masyarakat,telp'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ];

            $validasi  = Validator::make($request->all(), $rulesValidasi);

            if ($validasi->fails()) {
                return redirect()->back()->withErrors($validasi->errors())->withInput($request->input());
            }

            if (in_array('masyarakat', $roles)) {
                $inserMasyarakat = Masyarakat::create([
                    'nik' => $request->nik,
                    'telp' => $request->no_telp,
                    'user_id' => Auth::user()->id
                ]);

                if (!$inserMasyarakat) {
                    DB::rollBack();
                    return redirect()->back()->withErrors(['nik' => 'insert masyarakat gagal'])->withInput($request->input());
                }

                $user = User::where('id', Auth::user()->id);

                if (!$user->first()) {
                    DB::rollBack();
                    return redirect()->back()->withErrors(['nik' => 'user tidak dapat ditemukan'])->withInput($request->input());
                }

                $user->update([
                    'password' => bcrypt($request->password),
                    'is_done' => true
                ]);
                DB::commit();
            }

            return redirect()->route('user.home');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
