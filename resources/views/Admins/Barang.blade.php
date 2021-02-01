@extends('Layout.V_Template')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header" style="margin-bottom: 10px">
                    <h1 style="text-align: center">Tabel Barang</h1>
                </div>
                <a class="btn btn-primary" href="Barang/Tambah" style="margin-left:10px">Input</a>
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th style="width: 150px">Nama</th>
                                <th>Quantitas</th>
                                <th>Harga</th>
                                <th style="width: 100px">Gambar</th>
                                <th style="width: 50px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($produk as $prd)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{ $prd-> kode_produk}}</td>
                                    <td>{{ $prd-> nama_produk}}</td>
                                    <td>{{ $prd-> kuantitas_produk}}</td>
                                    <td>Rp.{{number_format($prd-> harga_produk,3)}}</td>
                                    <td><img src="{{url('Foto_Produk/'.$prd-> foto_produk)}}" alt="" width="100%"></td>
                                    <td style="width: 25%">
                                        <a class="btn btn-warning"  href="/Barang/Edit/{{$prd -> id_produk}}">Edit</a>
                                        <a class="btn btn-primary" onclick="return confirm('apa anda yakin ingin menghapus data ini?')" href="/Barang/Hapus/{{$prd -> id_produk}}">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination pagination-sm no-margin pull-right">
                        {{ $produk->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection