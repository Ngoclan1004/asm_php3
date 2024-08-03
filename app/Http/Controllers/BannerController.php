<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = DB::table('banners')->get();

        // dd($banner);
        return view('admin.banner.list', compact('banner'));
    }
    // public function indexUser()
    // {
    //     $post = DB::table('banners')->get();

    //     // dd($post);
    //     return view('client.index', compact('post'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        if ($request->hasFile('img')) {
            $url = Storage::put('/public/img', $request->file('img'));
        } else {
            $url = '';
        }
        DB::table('banners')->insert([

            'img' => $url,
        ]);
        // dd($request);
        return redirect()->route('banner.list');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $model = DB::table('banners')->where('id', $id)->first();
        return view('admin.banner.edit', compact('model'));
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
        DB::table('banners')->where('id', $id)->update([
        
            'img' => $url,
        ]);
        // dd($request);
        return redirect()->route('banner.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('banners')->where('id', $id)->delete();
        return back();
    }
}
