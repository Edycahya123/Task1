@extends('Layout.Master');
@section('content')
<div class="row">
@foreach ($produk as $prd) 
<div class="col-lg-4 col-md-6 mb-5">
  <div class="card h-100">
    <img class="card-img-top" src="/Foto_Produk/{{$prd->foto_produk}}" alt="">
    <div class="card-body">
      <h4 class="card-title">
        <a href="#" >{{$prd->nama_produk}}</a>
      </h4>
      <h5>Rp.{{number_format($prd->harga_produk,3)}} | Stock:{{$prd->kuantitas_produk}}</h5>
      <a href=""  data-toggle="modal" data-target="#modalPesan-{{$prd->id_produk}}" class="btn btn-primary"> Pesan </a>
    </div>
  </div>
</div>

<!-- untuk modal--> 
<div class="modal fade" id="modalPesan-{{$prd->id_produk}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/Home/Pesan" method="post">
          @csrf
          <input type="text" class="form-control" name="produk_id" value="{{$prd->id_produk}}" readonly>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" name="nama_pemesan">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" name="email_pemesan">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" name="alamat">
            </div>
            <div class="form-group">
              <label>Pesanan</label>
              <input type="text" class="form-control" name="jumlah_pesanan">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach
</div>

@endsection