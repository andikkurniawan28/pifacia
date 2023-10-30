<?php

namespace App\Imports;

use App\Produk;
use App\Supplier;
use Ramsey\Uuid\Uuid;
use App\KategoriProduk;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProdukImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Produk([
            "uuid"                  => Uuid::uuid4(),
            'name'                  => $row[1],
            'supplier_id'           => Supplier::where("name", $row[2])->get()->last()->id,
            'kategori_produk_id'    => KategoriProduk::where("name", $row[3])->get()->last()->id,
            "price"                 => $row[4],
        ]);
    }

    public function startRow(): int
    {
        return 3;
    }
}
