<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produk;
use App\Models\Pesanan;
use Auth;
use App\Models\PesananDetail;

class ProdukController extends Controller
{   
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function Master()
    {
        // $pesanan =Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        // $pesanan_details = PesananDetail::where('pesanan_id',$pesanan->id)->get();
        $pesanan = Pesanan::all();

        return view('Admins.Home',['pesanan'=> $pesanan]);
    }

    public function index()
    {
        //mengambil data di database dari table produk
        //$produk = DB::table('produk')->get();
        $produk = Produk::paginate(5);

        //mengrim data ke view Barang
        return view('Admins.Barang',['produk' => $produk]);
    }

    public function home()
    {
        //mengambil data di database dari table produk
        //$produk = DB::table('produk')->get();
        $produk = Produk::all();

        //mengrim data ke view Barang
        return view('Home',['produk' => $produk]);
    }

    public function Tambah()
    {
        return view('Admins.Tambah');
    }

    public function Input( Request $request)
    {

        $validated = $request->validate([
            'kode_produk' => 'required|max:5',
            'nama_produk' => 'required',
            'kuantitas_produk' => 'required',
            'harga_produk' =>'required',
            'foto_produk' =>'required|mimes:jpg,jpeg,png'
        ]);
        

       // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('foto_produk');
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'Foto_Produk';
 
                // upload file
		$file->move($tujuan_upload,$file->getClientOriginalName());
 

        // DB::table('produk')->insert([
        //     'kode_produk' => $request-> kode_produk,
        //     'nama_produk' => $request-> nama_produk,
        //     'kuantitas_produk' => $request-> kuantitas_produk,
        //     'harga_produk' => $request-> harga_produk,
        //     'foto_produk' => $file->getClientOriginalName()
        // ]);

        Produk::create([
            'kode_produk' => $request-> kode_produk,
            'nama_produk' => $request-> nama_produk,
            'kuantitas_produk' => $request-> kuantitas_produk,
            'harga_produk' => $request-> harga_produk,
            'foto_produk' => $file->getClientOriginalName()
        ]);

        return redirect('/Barang');
    }

    public function Edit($id)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        //$produk = DB::table('produk')->where('id_produk',$id)->get();
        $produk = Produk::find($id);

	    // passing data pegawai yang didapat ke view edit.blade.php
	    return view('Admins.Edit',['produk' => $produk]);
    }

    public function update($id, Request $request)
    {
        
        $validated = $request->validate([
            'kode_produk' => 'required|max:5',
            'nama_produk' => 'required',
            'kuantitas_produk' => 'required',
            'harga_produk' =>'required',
            'foto_produk' =>'required|mimes:jpg,jpeg,png'
        ]);

        // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('foto_produk');
 
        // nama file
        'File Name: '.$file->getClientOriginalName();

        // ekstensi file
        'File Extension: '.$file->getClientOriginalExtension();

        // real path
        'File Real Path: '.$file->getRealPath();

        // ukuran file
        'File Size: '.$file->getSize();

         // tipe mime
        'File Mime Type: '.$file->getMimeType();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'Foto_Produk';

            // upload file
        $file->move($tujuan_upload,$file->getClientOriginalName());
        
        $produk = Produk::find($id);
        $produk->kode_produk = $request->kode_produk;
        $produk->nama_produk = $request->nama_produk;
        $produk->kuantitas_produk = $request->kuantitas_produk;
        $produk->harga_produk = $request->harga_produk;
        $produk->foto_produk = $file->getClientOriginalName();
        $produk->save();

	// alihkan halaman ke halaman pegawai
	    return redirect('/Barang');
    }


    public function Hapus($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        //DB::table('produk')->where('id_produk',$id)->delete();
        $produk = Produk::find($id);
        $produk->delete();
		
	    // alihkan halaman ke halaman pegawai
	    return redirect('/Barang');
    }
}
