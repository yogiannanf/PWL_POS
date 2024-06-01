<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload()
    {
        return view('file-upload');
    }

    public function prosesFileUpload(Request $request)
    {
        //dump($request->berkas);
        // dump($request->file('file'));
        // return "Pemerosesan file upload disini";

        // if ($request->hasFile('berkas')) {
        //     echo "path(): " . $request->berkas->path() . "<br>";
        //     echo "extension(): " . $request->berkas->extension() . "<br>";
        //     echo "getClientOriginalExtension(): " . $request->berkas->getClientOriginalExtension() . "<br>";
        //     echo "getMimeType(): " . $request->berkas->getMimeType() . "<br>";
        //     echo "getClientOriginalName(): " . $request->berkas->getClientOriginalName() . "<br>";
        //     echo "getSize(): " . $request->berkas->getSize() . "<br>";
        // } else {
        //     return "Tidak ada berkas yang diupload";
        // }

        $request->validate([
            'berkas' => 'required|file|image|max:500', //membatasi jenis file dan maksimal 
        ]);
        $extfile =$request->berkas->getClientOriginalName();
        // $namaFile=$request->berkas->getClientOriginalName();
        // $path = $request->berkas->store('upload');
        $namaFile='web-'.time().".".$extfile;

        $path = $request->berkas->move('gambar', $namaFile);
        $path = str_replace("\\", "//", $path);
        echo"Variabel path berisi:$path <br>";
        // $path = $request->berkas->storeAS('public', $namaFile);
        // echo "proses upload berhasil, file berada di : $path" ;
        // echo $request->berkas->getClientOriginalName() . "lolos validasi";

        $pathBaru=asset('gambar/'.$namaFile);
        echo "proses upload berhasil, data tersimpan pada :$path";
        echo "<br>";
        return "Tampilan link : <a href='$pathBaru'>$pathBaru</a>";
    }
}
