<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pesanan;
use Auth;
use App\Models\PesananDetail;
use Carbon\Carbon;

class PesanController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        // $produk = Produk::where('id_produk',$id)->first();

        // return view('Detail_Pesan',['produk' => $produk]);
    }

    public function pesan(Request $request)
    {
        // //dd($request);
        $produk = Produk::where('id_produk', $request-> produk_id)->first();

        Pesanan::create([
            'produk_id'=> $request -> produk_id,
            'nama_pemesan' => $request-> nama_pemesan,
            'email_pemesan' => $request-> email_pemesan,
            'alamat' => $request-> alamat,
            'jumlah_pesanan' => $request-> jumlah_pesanan,
            'jumlah_harga' => $produk->harga_produk*$request->jumlah_pesanan
        ]);


        return redirect('Home');

        // validasi melebihi stock
        if($request->jumlah_pemesanan > $produk-> kuantitas_produk)
        {
            return redirect('Home/Pesan/'.$id);
        }


        // $cek_pesanan = Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
        // //database pesanan
        // if(empty($cek_pesanan))
        // {
        //     $pesanan = new Pesanan;
        //     $pesanan->user_id = Auth::user()->id;
        //     $pesanan->tgl_pesanan = $tanggal;
        //     $pesanan->status = 0;
        //     $pesanan->jumlah_harga = 0;
        //     $pesanan->save();
        // }
       

        // //database pesanan detail
        // $pesanan_baru = Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();

        // $cek_pesanan_detail = PesananDetail::where('produk_id', $produk->id_produk)->where('pesanan_id',$pesanan_baru->id)->first();
        // if(empty($cek_pesanan_detail))
        // {
        //     $pesanan_detail = new PesananDetail;
        //     $pesanan_detail->produk_id = $produk->id_produk;
        //     $pesanan_detail->pesanan_id = $pesanan_baru->id;
        //     $pesanan_detail->jumlah = $request->jumlah_pesan;
        //     $pesanan_detail->jumlah_harga = $produk->harga_produk*$request->jumlah_pesan;
        //     $pesanan_detail->save();
        // }else
        // {
        //     $pesanan_detail = PesananDetail::where('produk_id', $produk->id_produk)->where('pesanan_id',$pesanan_baru->id)->first();
        //     $pesanan_detail->jumlah =  $pesanan_detail->jumlah+$request->jumlah_pesan;
        //     $harga_pesanan_detail_baru = $produk->harga_produk*$request->jumlah_pesan;
        //     $pesanan_detail->jumlah_harga =  $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
        //     $pesanan_detail->update();
        // }

        // $pesanan =Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
        // $pesanan->jumlah_harga = $pesanan->jumlah_harga+ $produk->harga_produk*$request->jumlah_pesan;
        // $pesanan->update();

        // return redirect('Home');
    }

    public function about()
    {
        return view('About');
    }

    public function logout()
    {
         //logout user
    Auth()->logout();
    // redirect to homepage
    return redirect('/login');
    }
}
