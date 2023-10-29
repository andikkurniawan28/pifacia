<?php

namespace App\Imports;

use App\Role;
use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UserImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name'      => $row[1],
            'role_id'   => Role::where("name", $row[2])->get()->last()->id,
            'email'     => $row[3],
            'password'  => bcrypt($row[4]),
        ]);
    }

    public function startRow(): int
    {
        return 3;
    }
}
