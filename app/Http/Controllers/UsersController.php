<?php

namespace App\Http\Controllers;

use App\Http\Requests\userStore;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.singin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(userStore $request)
    {
        $validatedData = $request->validated();
        User::create([
            'dpi' => $validatedData['DPI'],
            'username' => $validatedData['username'],
            'password' => $validatedData['password'],
            'rol' => 1
        ]);
        Customer::create([
            'nit' => $validatedData['nit'],
            'name' => $validatedData['names'],
            'address' => $validatedData['address'],
            'dpi' => $validatedData['DPI']
        ]);

        return redirect()->back()->withSuccess('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
