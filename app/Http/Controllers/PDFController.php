<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class PDFController extends Controller
{
    public function generatePDF()
    {
        // $data = [
        //     'title' => 'Welcome to ItSolutionStuff.com',
        //     'date' => date('m/d/Y')
        // ];

        $barang = DB::table('barang')->get();
        $data = array(
            'menu' => 'Barcode',
            'barang' => $barang,
            'submenu' => '',
        );
          
        $pdf = PDF::loadView('myPDF', $data);
    
        return $pdf->download('barcode.pdf');
    }
}
