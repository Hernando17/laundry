<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Outlet;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;


class RegisterController extends Controller
{
    public function index()
    {
        $data = [
            'user' => Outlet::all(),
        ];

        return view('register', $data);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nama' => ['required', 'min:3', 'max:255'],
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'id_outlet' => ['required'],
            'role' => ['required'],
            'password' => ['required', 'min:5', 'max:255'],
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        $request->session()->flash('success', 'Registration successful!');

        return redirect('/login');
    }
}
