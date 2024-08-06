<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function donhangct(string $id){
        $model = DB::table('orders')->where('id', $id)->first();
        // dd($model);
        $orderDetails = OrderDetail::where('order_id',$model->id)->get();
        return view('client.donhangct', compact('model','orderDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $carts = Cart::getContent();
        if (!empty($carts)) {
            // $order_code = \Str::random(10);
            $total = 0;
            $subTotal = 0;
            foreach($carts as $item) {
                $subTotal += $item['price'] * $item['quantity'];
            }
            $shipping = 30000;
            $total = $subTotal + $shipping;

            return view('client.order.create', compact('shipping', 'total','carts','subTotal'));
        }
        return redirect()->route('cart.index');
        //  return view('client.order.create');
    }   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // them don hang
        $data = $request->all();
        $data['ma_don_hang'] = \Str::random(10);
        $data['user_id'] = Auth::user()->id ?? '' ;
        $order = Order::create($data);
        // dd($order);
        // them chi tiet don hang
        $carts = Cart::getContent();
        foreach($carts as $cart){
            $data = [
                'order_id' => $order->id,
                'product_id' => $cart->id,
                             
                'so_luong' => $cart->quantity,
                'don_gia' => $cart->price,
                'thanh_tien' => $cart->price * $cart->quantity,

            ];
            OrderDetail::create($data);
        }
        Cart::clear();
        return redirect('/order/thank-you')->with('message','Đặt hàng thành công');

    }
    public function thank(){
        return view('client.order.thankyou');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
