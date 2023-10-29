<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'uuid' => 'string',
        "barcode" => "json",
    ];

    public function kategori_produk(){
        return $this->belongsTo(KategoriProduk::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
