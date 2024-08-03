<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $carts = session()->get('cart', []);
        dd($carts);
        if (!empty($carts)) {
            dd('aaaa');
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
