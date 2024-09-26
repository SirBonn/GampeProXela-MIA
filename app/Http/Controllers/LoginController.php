<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\loginStore;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(session()->has('user')) {
            if (session()->get('user')->role->uid  == 0) {
                return redirect()->route('admin.index');
            } else if (session()->get('user')->role->uid  == 2) {
                return redirect()->route('checkers.index');
            } else if (session()->get('user')->role->uid  == 3) {
                return redirect()->route('storeView');
            } else if (session()->get('user')->role->uid  == 4) {
                return redirect()->route('inventaryView');
            } else {
                return redirect()->route('customers.index');
            }
        }
        return view('users.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(loginStore $request)
    {

        $validatedData = $request->validated();
        $user = User::where('username', $validatedData['username'])->first();

        if ($user) {
            if ($user->password == $validatedData['password']) {
                $request->session()->put('user', $user);
            } else {
                return redirect()->back()->with('error', 'Invalid credentials');
            }

            if ($user->role->uid == 0) {
                return redirect()->route('admin.index');
            } else if ($user->role->uid == 2) {
                return redirect()->route('checkers.index');
            } else if ($user->role->uid == 3) {
                return redirect()->route('storeView');
            } else if ($user->role->uid == 4) {
                return redirect()->route('inventaryView');
            } else {
                return redirect()->route('customers.index');
            }

        }

        return redirect()->back()->with('error', 'Invalid credentials');

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
