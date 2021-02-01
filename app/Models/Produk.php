<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{

    protected $table = 'produks';
    protected $primaryKey = 'id_produk';
    protected $fillable = ['kode_produk','nama_produk','kuantitas_produk','harga_produk','foto_produk'];

    public function pesanan()
    {
        return $this->hasMany('App\Pesanan','produk_id','id');
    }

}
