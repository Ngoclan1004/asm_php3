<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['sanpham'] = DB::table('products')->get();
        $data['danhmuc'] = DB::table('categories')->get();
        $data['post'] = DB::table('banners')->get();
        // dd($data);
        if(Auth::user()->isAdmin()){
            return redirect()->route('admin.dashboard');
        }
        // dd(Auth::user());
        return view('client.index', $data);
    }

    function profile( ){
        $order = Order::query()->where('user_id', Auth::user()->id)->get();
        return view('client.donhang', compact('order'));
    }
}
