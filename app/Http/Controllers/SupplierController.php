<?php

namespace App\Http\Controllers;

use App\Supplier;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use OwenIt\Auditing\Models\Audit;
use Illuminate\Support\Facades\Storage;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::orderBy("created_at", "desc")->get();
        return view("supplier.index", compact("suppliers"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $audits = Audit::where("auditable_type", "App\Supplier")->limit(10)->orderBy("created_at", "desc")->get();
        return view("supplier.create", compact("audits"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supplier = new Supplier;
        $file = $request->file('contract');
        $filename = $file->getClientOriginalName();
        $filename = str_replace(" ", "", $filename);
        $path = '/pdf/' . $filename;
        Storage::disk("public")->put($path, file_get_contents($request->contract));
        $supplier->id = self::uuid($request);
        $supplier->name = $request->name;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->is_active = $request->is_active;
        $supplier->contract = $path;
        $supplier->save();
        return redirect()->back()->with("status", "Data berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $supplier = Supplier::where("uuid", $uuid)->get()->last();
        $audits = Audit::where("auditable_type", "App\Supplier")->limit(10)->orderBy("created_at", "desc")->get();
        return view("supplier.edit", compact("supplier", "audits"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        $supplier_id = Supplier::where("uuid", $uuid)->get()->last()->id;
        Supplier::find($supplier_id)->update($request->except(["_method", "_token", "uuid"]));
        return redirect()->back()->with("status", "Data berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $supplier_id = Supplier::where("uuid", $uuid)->get()->last()->id;
        Supplier::find($supplier_id)->delete();
        return redirect()->back()->with("status", "Data berhasil dihapus");
    }

    public static function upload($request){
        if($request->has("contract")){
            $fileName = $request->file("contract")->getClientOriginalName();
            $filePath = "pdf/" . $fileName;
            Storage::disk("public")->put($filePath, file_get_contents($request->contract));
            $request->request->add(["contract" => $filePath]);
        }
    }

    public static function uuid($request){
        return Uuid::uuid4();
    }
}
