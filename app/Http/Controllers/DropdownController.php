<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DropdownController extends Controller
{
    public function index()
    {
        $provinces = DB::table("provinces")->pluck("prov_name","prov_id");
        $data = array(
            'menu' => 'MasterTambahData',
            'submenu' => 'tambahdata',
        );
        return view('dropdown',$data,compact('provinces'));
    }

    public function index2()
    {
        $provinces = DB::table("provinces")->pluck("prov_name","prov_id");
        $data = array(
            'menu' => 'MasterTambahData',
            'submenu' => 'tambahdata2',
        );
        return view('dropdown',$data,compact('provinces'));
    }
    
    public function getCity(Request $request)
    {
        $cities = DB::table("cities")
        ->where("prov_id",$request->prov_id)
        ->pluck("city_name","city_id");
        return response()->json($cities);
    }
    
    public function getDistrict(Request $request)
    {
        $districts = DB::table("districts")
        ->where("city_id",$request->city_id)
        ->pluck("dis_name","dis_id");
        return response()->json($districts);
    }

    public function getsubDistrict(Request $request)
    {
        $subdistricts = DB::table("subdistricts")
        ->where("dis_id",$request->dis_id)
        ->pluck("subdis_name","subdis_id");
        return response()->json($subdistricts);
    }
}
