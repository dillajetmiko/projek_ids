<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Customer;
use App\Imports\CustomerImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = DB::table('customer')->get();
        $data = array(
            'menu' => 'MasterTambahData',
            'customer' => $customer,
            'submenu' => 'customer',
        );

        return view('customer/viewCustomer',$data); 
    }

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
        // Storage::disk('local')->put($file, $image_base64);
       
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
       
        DB::table('customer')->insert([
            'nama' => $request->nama,      
            'alamat' => $request->alamat,      
            'foto' => $img,      
            'subdis_id' => $request->subdistrict,     
        ]);

        return redirect('/dropdown2');
    }

    public function importexcel(Request $request)
    {
        //validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        //menangkap file excel
        $file = $request->file('file');

        //upload folder
        $nama_file = rand().$file->getClientOriginalName();
        $file->move('dataCustomer', $nama_file);

        //import data
        $import = new CustomerImport;
        $import->import(public_path('/dataCustomer/'.$nama_file));
        // $import = Excel::import(new CustomerImport, public_path('/dataCustomer/'.$nama_file));

        Session::flash('sukses', 'Data customer berhasil di Import');

        if($import->failures()->isNotEmpty()){
            return back()->withFailures($import->failures());
        } 
        
        return \redirect()->back();
    }


}
