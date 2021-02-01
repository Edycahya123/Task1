<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanans';
    protected $primaryKey = 'id';
    protected $fillable = ['produk_id','nama_pemesan','email_pemesan','alamat','jumlah_pesanan','jumlah_harga'];


    public function produk()
    {
        return $this->belongsTo(Produk::class,'produk_id', 'id_produk');
    }

}
