<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'uuid' => 'string'
    ];

    public function produk(){
        return $this->hasMany(Produk::class);
    }
}
