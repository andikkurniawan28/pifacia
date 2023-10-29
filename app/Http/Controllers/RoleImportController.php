<?php

namespace App\Http\Controllers;

use App\Imports\RoleImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RoleImportController extends Controller
{
    public function index(){
        return view("role.import");
    }

    public function process(Request $request){
        Excel::import(new RoleImport, request()->file('file'));
        return redirect()->route("role.index")->with("status", "Data berhasil diimpor");
    }
}
