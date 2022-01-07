<?php

namespace App\Http\Controllers;

use App\Imports\CustomerImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class UsersImportController extends Controller
{
    public function index(){
        $cust = DB::table('cust')
        ->get();
        $data = array(
            'menu' => 'cust',
            'submenu' => '',
            'cust'=>$cust
        );
        return view('pages.dataCust',$data);
    
    }

    public function create()
    {
        // $menu = 'menuexcel';
        $data = array(
            'menu' => 'menuexcel',
            'submenu' => '',
        );
        return view('pages.excel_view',$data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
	    'excel' => 'file'
	]);

	$excel = $request->file('excel');

	$import = new CustomerImport;
	$import->import($excel);

	if($import->failures()->isNotEmpty()){
	    return back()->withFailures($import->failures());
	} 

	return redirect('/excel')->with('success', 'File excel berhasil diimpor');
    }
}
