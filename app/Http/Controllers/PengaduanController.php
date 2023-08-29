<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Pengaduan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Output\ConsoleOutput;

use function Illuminate\Events\queueable;

class PengaduanController extends Controller
{
    function destroy(Request $request, $id)
    {
        try {
            $pengaduan = Pengaduan::find($id);
            $deleteData = $pengaduan->delete();

            if ($deleteData) {
                return "data sudah berhasil di hapus";
            }

            return "data gagal di hapus";
        } catch (Exception $e) {
            return redirect()->back()->withErrors(env('APP_ENV') === 'local' ? $e->getMessage() : '500 internal server error');
        }
    }

    function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $pengaduan = Pengaduan::find($id);

            $validasi = Validator::make([
                'pengaduan' => $pengaduan
            ], [
                'pengaduan' => ['required']
            ]);

            if ($validasi->fails()) {
                return redirect()->back()->withErrors($validasi->errors());
            }

            $updateData = $pengaduan->update([
                'subject' => $request->subject,
                'isi_laporan' => $request->isi_laporan,
                'lokasi_pengaduan' => $request->detail_alamat,
            ]);

            if (!$updateData) {
                return redirect()->back()->withErrors(['error' => 'data tidak dapat di update']);
            }

            if ($request->foto_bukti) {
                $validasiImage = Validator::make($request->all(), [
                    'foto_bukti' => ['required']
                ]);

                if ($validasiImage->fails()) {
                    DB::rollBack();
                    return redirect()->back()->withErrors($validasiImage->errors());
                }

                $image = $pengaduan->images()->first();

                $imagesSebelumnya = json_decode($image->first()->images);

                // MENGAHAPUS GAMBAR SEBELUMNYA
                foreach ($imagesSebelumnya as $imageUrl) {
                    $splitImageUrl =  explode("/", $imageUrl);
                    $imageFileName = $splitImageUrl[5];
                    File::delete('storage/images/' . $imageFileName);
                }

                $photos = $request->file('foto_bukti');

                $allowedfileExtension = ['jpg', 'png', 'mp4'];

                $photoValidasi = [];

                // HASIL IMAGES
                $images = [];

                // UPLOAD IMAGE
                foreach ($photos as $key => $photo) {
                    $filename = $photo->getClientOriginalName();
                    $extension = $photo->getClientOriginalExtension();
                    $check = in_array($extension, $allowedfileExtension);
                    if ($check) {
                        $waktuSaatIni = time() . $key;
                        $namaFile = "{$waktuSaatIni}.{$extension}";
                        $moving = $photo->move('storage/images', $namaFile);

                        array_push($images, "{$request->root()}/{$moving->getPath()}/{$moving->getFilename()}");
                        $photoValidasi[$filename] = true;
                    } else {
                        $photoValidasi[$filename] = false;
                    }
                }

                DB::table('images')->where('id', $pengaduan->image_id)->update([
                    'images' => $images
                ]);

                DB::commit();
            } else {
                DB::commit();
            }

            return redirect()->back()->with('message', 'update data berhasil dilakukan');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(env('APP_ENV') === 'local' ? $e->getMessage() : '500 internal server error');
        }
    }
}
