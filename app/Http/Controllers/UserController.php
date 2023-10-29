<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use OwenIt\Auditing\Models\Audit;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy("id", "asc")->get();
        return view("user.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::orderBy("id", "asc")->get();
        $audits = Audit::where("auditable_type", "App\User")->limit(10)->orderBy("id", "desc")->get();
        return view("user.create", compact("roles", "audits"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(["password" => bcrypt($request->password)]);
        User::create($request->all());
        return redirect()->back()->with("status", "Data berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::whereId($id)->get()->last();
        $roles = Role::orderBy("id", "asc")->get();
        $audits = Audit::where("auditable_type", "App\User")->limit(10)->orderBy("id", "desc")->get();
        return view("user.edit", compact("user", "roles", "audits"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->request->add(["password" => bcrypt($request->password)]);
        $user = User::find($id)->update($request->except(["_method", "_token"]));
        return redirect()->back()->with("status", "Data berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->back()->with("status", "Data berhasil dihapus");
    }
}
