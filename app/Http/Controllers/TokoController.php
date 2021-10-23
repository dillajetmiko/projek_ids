<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TokoController extends Controller
{
    public function index()
    {
        $lokasi_toko = DB::table('lokasi_toko')->get();
        $data = array(
            'menu' => 'geolocation',
            'lokasi_toko' => $lokasi_toko,
            'submenu' => '',
        );

        return view('toko/viewToko',$data); 
    }

    public function formToko()
    {
        $data = array(
            'menu' => 'geolocation',
            'submenu' => '',
        );

        return view('toko/formToko',$data); 
    }

    public function tambahToko(Request $post)
    {  
        DB::table('lokasi_toko')->insert([
            'barcode' => $post->barcode,
            'nama_toko' => $post->nama,
            'latitude' => $post->latitude,
            'longitude' => $post->longitude,
            'accuracy' => $post->accuracy,
        ]);

        // return redirect('/pegawai');
        return redirect('/toko');
    }

    public function scanner()
    {
        $getFields = DB::table('lokasi_toko')->where('barcode', 12345)->first();
        $data = array(
            'menu' => 'kunjungan',
            'nama_toko' => $getFields,
            'submenu' => '',
        );

        // var_dump($getFields);
        return view('toko/scannerToko',$data); 
    }

    public function getAllFields(Request $request)
    {
        try {
            $getFields = DB::table('lokasi_toko')->where('barcode', $request->scanned)->first();
            // here you could check for data and throw an exception if not found e.g.
            // if(!$getFields) {
            //     throw new \Exception('Data not found');
            // }
            return response()->json($getFields, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function getBarcode()
    {
        $barcode = $_GET['barcode'];

        $lokasi_toko = DB::table('lokasi_toko')->where('barcode', $barcode)->get();
        $data = array(
            'menu' => 'kunjungan',
            'lokasi_toko' => $lokasi_toko,
            'submenu' => '',
        );

        var_dump($lokasi_toko);
        return view('toko/scannerToko',$data); 
    }

}
