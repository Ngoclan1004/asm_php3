<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('products')
        ->join('categories', 'products.id_dm', "=", 'categories.id_dm')
        ->select('products.*','categories.name as danhmuc')
        ->get();
        
        //dd($data);
        return view('admin.sanpham.list', compact('data'));
    }

    
    public function indexUser()
    {
        $data['sanpham'] = DB::table('products')->get();
        $data['danhmuc'] = DB::table('categories')->get();
        $data['post'] = DB::table('banners')->get();
        // dd($data);
        return view('client.index', $data);

    }

    public function detail($id)
    {
        $data['sanpham'] = DB::table('products')->find($id);
        
        return view('client.detail', $data);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view('admin.sanpham.create');
    // }
    public function create()
    {
        $danhmuc = DB::table('categories')->get();
        return view('admin.sanpham.create', compact('danhmuc'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // $danhmuc = DB::table('categories')->get();
        if ($request->hasFile('img')) {
            $url = Storage::put('/public/img', $request->file('img'));
        } else {
            $url = '';
        }
        DB::table('products')->insert([
            'name' => $request->name,
            'img' => $url,
            // 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'price' => $request->price,
            'quantity' => $request->quantity,
            'id_dm' => $request->id_dm,
            'describe' => $request->describe
        ]);
        // dd($request);
        return redirect()->route('sanpham.list');
        // return view('admin.sanpham.list', compact('data','danhmuc'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $model = DB::table('products')->where('id', $id)
        ->join('categories', 'categories.id_dm', '=', 'products.id_dm')
        ->select('products.*', 'categories.id_dm as iddm')
        ->first();
        $danhmuc = DB::table('categories')->get();
        return view('admin.sanpham.edit', compact('model','danhmuc'));
    }

    /**
     * Update the specified resource in storage.  
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        if ($request->hasFile('img')) {
            $url = Storage::put('/public/img', $request->file('img'));
        } else {
            $url = '';
        }
        DB::table('products')->where('id', $id)->update([
            'name' => $request->name,
            'img' => $url,
            // 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'price' => $request->price,
            'quantity' => $request->quantity,
            'id_dm' => $request->id_dm,
            'describe' => $request->describe
        ]);
        // dd($request);
        return redirect()->route('sanpham.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('products')->where('id', $id)->delete();
        return back();
    
    }
}
