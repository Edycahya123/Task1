@extends('Layout.V_Template')
@section('title')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <h1 style="text-align: center">Tambah Barang</h1>
            </div>
            <div class="box-body">
                <form action="/Barang/Input" method="post" enctype="multipart/form-data">
    @csrf
   <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                 <label>Kode Produk</label>
                <input type="text" class="form-control" name="kode_produk" value="{{ old('kode_produk')}}">
                <div class="text-danger">
                    @error('kode_produk')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
       <div class="col-lg-6">
            <div class="form-group">
                 <label>Nama Produk</label>
                 <input type="text" class="form-control" name="nama_produk"  value="{{ old('nama_produk')}}">
                <div class="text-danger">
                    @error('nama_produk')
                        {{ $message }}
                    @enderror
                </div>
            </div>
       </div>
   </div>
   <div class="row">
       <div class="col-lg-6">
            <div class="form-group">
                 <label>Quantitas Produk</label>
                <input type="text" class="form-control" name="kuantitas_produk"  value="{{ old('kuantitas_produk')}}">
                <div class="text-danger">
                    @error('kuantitas_produk')
                        {{ $message }}
                    @enderror
                </div>
            </div>
       </div>
       <div class="col-lg-6">
           <div class="form-group">
               <label>Harga Produk</label>
               <input type="text" class="form-control" name="harga_produk"  value="{{ old('harga_produk')}}">
               <div class="text-danger">
                @error('harga_produk')
                    {{ $message }}
                @enderror
            </div>
           </div>  
       </div>
   </div>
   <div class="form-group">
    <label>Upload Gambar</label>
    <input type="file" class="form-control-file" name="foto_produk">
    <div class="text-danger">
        @error('foto_produk')
            {{ $message }}
        @enderror
    </div>
  </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
            </div>
        </div>
    </div>
</div>
@endsection