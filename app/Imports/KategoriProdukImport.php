<?php

namespace App\Imports;

use App\KategoriProduk;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class KategoriProdukImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new KategoriProduk([
            'name'     => $row[1],
        ]);
    }

    public function startRow(): int
    {
        return 3;
    }
}
