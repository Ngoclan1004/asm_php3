<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonhangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $oder = DB::table('orders')->get();
        
        //dd($data);
        return view('admin.donhang.list', compact('oder'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $model = DB::table('orders')->where('id', $id)->first();
        return view('admin.donhang.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // DB::table('orders')->where('id',$id)->update([
        //     'ten_nguoi_nhan' => $request->ten_nguoi_nhan,
        //     'sdt_nguoi_nhan' => $request->sdt_nguoi_nhan,
        //     'trang_thai_don_hang' => $request->trang_thai_don_hang,
        //     'trang_thai_thanh_toan' => $request->trang_thai_thanh_toan,
        //     'ma_don_hang' => $request->ma_don_hang,
        //     'tong_tien' => $request->tong_tien,
            
        // ]);
        $data = $request->all();
        $model = Order::query()->where('id', $id)->first();
        $model->update($data);
        return redirect()->route('donhang.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
