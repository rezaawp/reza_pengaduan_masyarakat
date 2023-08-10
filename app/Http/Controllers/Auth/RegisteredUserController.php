<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
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

class RegisteredUserController extends Controller
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
                'nik' => ['required', 'min:16', 'max:16'],
                'no_telp' => ['required', 'min:10', 'max:15']
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user->assignRole('masyarakat');

            $validasiDataMasyarakat = Validator::make(['nik' => $request->nik, 'no_telp' => $request->no_telp], [
                'nik' => ['unique:masyarakat,nik'],
                'no_telp' => ['unique:masyarakat,telp']
            ]);

            if ($validasiDataMasyarakat->fails()) {
                DB::rollBack();
                return redirect()->back()->withInput($request->input())->withErrors($validasiDataMasyarakat->errors());
            }

            Masyarakat::create([
                'user_id' => $user->id,
                'nik' => $request->nik,
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
}
