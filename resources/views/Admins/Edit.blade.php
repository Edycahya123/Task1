@extends('Layout.V_Template')
@section('title','Edit Data Barang')
@section('content')

    <a href="/Barang" class="btn btn-primary">Kembali</a>
    <form action="/Barang/Update/{{$produk->id_produk}}" method="post" enctype="multipart/form-data">
        @csrf
       <div class="row">
            <div class="col-lg-6">
                <div class="form-group mt-4">
                     <label>Kode Produk</label>
                    <input type="text" class="form-control" name="kode_produk" value="{{$produk -> kode_produk}}">
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
                     <input type="text" class="form-control" name="nama_produk"  value="{{$produk -> nama_produk}}">
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
                    <input type="text" class="form-control" name="kuantitas_produk"  value="{{$produk -> kuantitas_produk}}">
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
                   <input type="text" class="form-control" name="harga_produk"  value="{{$produk -> harga_produk}}" >
                   <div class="text-danger">
                    @error('harga_produk')
                        {{ $message }}
                    @enderror
                </div>
               </div>  
           </div>
       </div>
        <div class="form-group">
            <img src="{{url('Foto_Produk/'.$produk-> foto_produk)}}" alt="">
            <div>
                <label>Upload Gambar</label>
                <input type="file" class="form-control-file" name="foto_produk"  value="{{url('Foto_Produk/'.$produk-> foto_produk)}}">
                <div class="text-danger">
                    @error('foto_produk')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection