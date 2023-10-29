<?php

use App\Role;
use App\User;
use App\Supplier;
use Ramsey\Uuid\Uuid;
use App\KategoriProduk;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ["name" => ucfirst("manager")],
            ["name" => ucfirst("administrator")],
            ["name" => ucfirst("customer")],
        ];
        Role::insert($roles);

        $users = [
            ["role_id" => 1, "name" => ucfirst("andi"), "email" => "andi@gmail.com", "password" => bcrypt("andi12345")],
            // ["role_id" => 2, "name" => ucfirst("budi"), "email" => "budi@gmail.com", "password" => bcrypt("budi12345")],
            // ["role_id" => 3, "name" => ucfirst("cika"), "email" => "cika@gmail.com", "password" => bcrypt("cika12345")],
        ];
        User::insert($users);

        $kategori_produks = [
            ["name" => ucfirst("rak")],
            ["name" => ucfirst("kursi")],
            ["name" => ucfirst("meja")],
            ["name" => ucfirst("jemuran")],
        ];
        // KategoriProduk::insert($kategori_produks);

        $suppliers = [
            ["uuid" => Uuid::uuid4(), "name" => ucfirst("supplier1"), "address" => ucfirst("alamat1"), "phone" => "081234567897"],
            ["uuid" => Uuid::uuid4(), "name" => ucfirst("supplier2"), "address" => ucfirst("alamat2"), "phone" => "081234567895"],
            ["uuid" => Uuid::uuid4(), "name" => ucfirst("supplier3"), "address" => ucfirst("alamat3"), "phone" => "081234567893"],
        ];
        // Supplier::insert($suppliers);
    }
}
