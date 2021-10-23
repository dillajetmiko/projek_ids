<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {
        // $data = [
        //     'title' => 'Welcome to ItSolutionStuff.com',
        //     'date' => date('m/d/Y')
        // ];
        $id_barang = $request->id_barang;
        $barang = DB::table('barang')->get();
        $no = 1;
        $data = array(
            'menu' => 'Barcode',
            'barang' => $barang,
            'no' => $no,
            'submenu' => '',
        );
          
        $pdf = PDF::loadView('myPDF', $data)->setPaper('a4', 'landscape');
    
        return $pdf->download('barcode.pdf');
    }
}
