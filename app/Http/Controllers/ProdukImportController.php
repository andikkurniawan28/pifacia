<?php

namespace App\Http\Controllers;

use App\Imports\ProdukImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProdukImportController extends Controller
{
    public function index(){
        return view("produk.import");
    }

    public function process(Request $request){
        Excel::import(new ProdukImport, request()->file('file'));
        return redirect()->route("produk.index")->with("status", "Data berhasil diimpor");
    }
}
