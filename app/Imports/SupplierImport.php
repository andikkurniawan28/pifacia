<?php

namespace App\Imports;

use App\Supplier;
use Ramsey\Uuid\Uuid;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SupplierImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Supplier([
            "uuid"      => Uuid::uuid4(),
            'name'      => $row[1],
            'phone'     => $row[2],
            'address'   => $row[3],
        ]);
    }

    public function startRow(): int
    {
        return 3;
    }
}
