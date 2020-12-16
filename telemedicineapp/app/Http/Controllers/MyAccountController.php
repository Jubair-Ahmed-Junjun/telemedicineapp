<?php

namespace App\Http\Controllers;

use App\MyAccount;
use App\User;
use Illuminate\Http\Request;

class MyAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.pages.my-account',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MyAccount  $myAccount
     * @return \Illuminate\Http\Response
     */
    public function show(MyAccount $myAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MyAccount  $myAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(MyAccount $myAccount)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MyAccount  $myAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->roles = $request->roles;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        return redirect(route('my-account.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MyAccount  $myAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(MyAccount $myAccount)
    {
        //
    }
}
