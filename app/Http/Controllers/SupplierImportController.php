<?php

namespace App\Http\Controllers;

use App\Imports\SupplierImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SupplierImportController extends Controller
{
    public function index(){
        return view("supplier.import");
    }

    public function process(Request $request){
        Excel::import(new SupplierImport, request()->file('file'));
        return redirect()->route("supplier.index")->with("status", "Data berhasil diimpor");
    }
}
