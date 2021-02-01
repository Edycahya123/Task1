<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
                //mengambil data di database dari table produk
        //$produk = DB::table('produk')->get();
        $produk = Produk::all();

        //mengrim data ke view Barang
        return view('Home',['produk' => $produk]);
    }
}
