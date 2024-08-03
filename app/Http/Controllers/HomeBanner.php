<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeBanner extends Controller
{
       public function indexUser()
    {
        $post = DB::table('banners')->get();

        // dd($post);
        return view('client.index', compact('post'));
    }

}
