@extends('Layout.V_Template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-3 mb-5">
                <div class="box mt-5">
                    <div class="box-header">
                        <h1 style="text-align: center">History Pemesanan</h1>
                    </div>
                    <div class="box-body pb-5">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Nama Pemesan</th>
                                    <th>Alamat Pengiriman</th>
                                    <th>jumlah_pesanan</th>
                                    <th>Harga Produk</th>
                                    <th>Total Pemesanan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan as $index=>$p)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$p->produk->nama_produk}}</td>
                                    <td>{{$p->nama_pemesan}}</td>
                                    <td>{{$p->alamat}}</td>
                                    <td>{{$p->jumlah_pesanan}}</td>
                                    <td>Rp.{{number_format($p->produk->harga_produk,3)}}</td>
                                    <td>Rp.{{number_format($p->jumlah_harga,3)}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection