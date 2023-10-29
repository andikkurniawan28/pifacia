<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Produk;
use App\Supplier;
use App\KategoriProduk;
use Illuminate\Http\Request;

class RestoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($model, $id)
    {
        switch($model){
            case "role" : Role::whereId($id)->restore(); break;
            case "user" : User::whereId($id)->restore(); break;
            case "kategori_produk" : KategoriProduk::whereId($id)->restore(); break;
            case "supplier" : Supplier::whereId($id)->restore(); break;
            case "produk" : Produk::whereId($id)->restore(); break;
            default : return redirect()->back()->with("status", "Error!"); break;
        }
        return redirect()->route("{$model}.index")->with("status", "Data berhasil dikembalikan");
    }
}
