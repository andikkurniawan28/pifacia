<?php

namespace App\Http\Controllers;

use App\Imports\KategoriProdukImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KategoriProdukImportController extends Controller
{
    public function index(){
        return view("kategori_produk.import");
    }

    public function process(Request $request){
        Excel::import(new KategoriProdukImport, request()->file('file'));
        return redirect()->route("kategori_produk.index")->with("status", "Data berhasil diimpor");
    }
}
