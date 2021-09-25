<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function simpan(Request $request)
    {
        $img =  $request->get('image');
        $folderPath = "uploads/";
        $image_parts = explode(";base64,", $img);

        foreach ($image_parts as $key => $image){
            $image_base64 = base64_decode($image);
        }

        $fileName = uniqid() . '.png';
        $file = $folderPath . $fileName;
        file_put_contents($file, $image_base64);
       
        DB::table('customer')->insert([
            'nama' => $request->nama,      
            'alamat' => $request->alamat,      
            'file_path' => $fileName,      
            'subdis_id' => $request->subdistrict,     
        ]);

        return redirect('/dropdown');
    }

    public function simpan2(Request $request)
    {
        $img =  $request->get('image');
        $folderPath = "uploads/";
        $image_parts = explode(";base64,", $img);

        foreach ($image_parts as $key => $image){
            $image_base64 = base64_decode($image);
        }

        $fileName = uniqid() . '.png';
        $file = $folderPath . $fileName;
        file_put_contents($file, $image_base64);
       
        DB::table('customer')->insert([
            'nama' => $request->nama,      
            'alamat' => $request->alamat,      
            'file_path' => $fileName,      
            'subdis_id' => $request->subdistrict,     
        ]);

        return redirect('/dropdown');
    }
}