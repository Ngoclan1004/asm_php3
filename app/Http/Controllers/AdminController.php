<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard(){
        $data = DB::table('products')
        ->join('categories', 'products.id_dm', "=", 'categories.id_dm')
        ->select('products.*','categories.name as danhmuc')
        ->get();
        
        //dd($data);
        return view('admin.sanpham.list', compact('data'));
    }
}
