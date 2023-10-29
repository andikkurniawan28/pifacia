<?php

namespace App\Http\Controllers;

use App\KategoriProduk;
use Illuminate\Http\Request;
use OwenIt\Auditing\Models\Audit;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori_produks = KategoriProduk::orderBy("id", "asc")->get();
        return view("kategori_produk.index", compact("kategori_produks"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $audits = Audit::where("auditable_type", "App\KategoriProduk")->limit(10)->orderBy("id", "desc")->get();
        return view("kategori_produk.create", compact("audits"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        KategoriProduk::create($request->all());
        return redirect()->back()->with("status", "Data berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KategoriProduk  $kategori_produk
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriProduk $kategori_produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KategoriProduk  $kategori_produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori_produk = KategoriProduk::whereId($id)->get()->last();
        $audits = Audit::where("auditable_type", "App\KategoriProduk")->limit(10)->orderBy("id", "desc")->get();
        return view("kategori_produk.edit", compact("kategori_produk", "audits"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KategoriProduk  $kategori_produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kategori_produk = KategoriProduk::find($id)->update($request->except(["_method", "_token"]));
        return redirect()->back()->with("status", "Data berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KategoriProduk  $kategori_produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KategoriProduk::find($id)->delete();
        return redirect()->back()->with("status", "Data berhasil dihapus");
    }
}
