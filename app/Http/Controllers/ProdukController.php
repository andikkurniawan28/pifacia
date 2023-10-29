<?php

namespace App\Http\Controllers;

use App\Produk;
use App\Supplier;
use Ramsey\Uuid\Uuid;
use App\KategoriProduk;
use Illuminate\Http\Request;
use OwenIt\Auditing\Models\Audit;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks = Produk::orderBy("id", "asc")->get();
        return view("produk.index", compact("produks"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori_produks = KategoriProduk::orderBy("id", "asc")->get();
        $suppliers = Supplier::orderBy("id", "asc")->get();
        $audits = Audit::where("auditable_type", "App\Produk")->limit(10)->orderBy("id", "desc")->get();
        return view("produk.create", compact("audits", "kategori_produks", "suppliers"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add([
            "uuid"      => self::uuid($request),
            "barcode"   => self::barcode($request),
        ]);
        // return $request->except(["barcode_asli", "barcode_internal"]);
        Produk::create($request->except(["barcode_asli", "barcode_internal"]));
        return redirect()->back()->with("status", "Data berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $kategori_produks = KategoriProduk::orderBy("id", "asc")->get();
        $suppliers = Supplier::orderBy("id", "asc")->get();
        $produk = Produk::where("uuid", $uuid)->get()->last();
        $audits = Audit::where("auditable_type", "App\Produk")->limit(10)->orderBy("id", "desc")->get();
        return view("produk.edit", compact("produk", "audits", "kategori_produks", "suppliers"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        $produk_id = Produk::where("uuid", $uuid)->get()->last()->id;
        $request->request->add([
            "barcode"   => self::barcode($request),
        ]);
        Produk::find($produk_id)->update($request->except(["_method", "_token", "uuid", "barcode_asli", "barcode_internal"]));
        return redirect()->back()->with("status", "Data berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $produk_id = Produk::where("uuid", $uuid)->get()->last()->id;
        Produk::find($produk_id)->delete();
        return redirect()->back()->with("status", "Data berhasil dihapus");
    }

    public static function uuid($request){
        return Uuid::uuid4();
    }

    public static function barcode($request){
        return
            [
                "barcode_asli" => $request->barcode_asli,
                "barcode_internal" => $request->barcode_internal
            ];
    }
}
