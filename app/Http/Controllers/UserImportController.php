<?php

namespace App\Http\Controllers;

use App\Imports\UserImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserImportController extends Controller
{
    public function index(){
        return view("user.import");
    }

    public function process(Request $request){
        Excel::import(new UserImport, request()->file('file'));
        return redirect()->route("user.index")->with("status", "Data berhasil diimpor");
    }
}
