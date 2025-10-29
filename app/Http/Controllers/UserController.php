<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function indexUser() {
        $user = User::all();
        return view('admin.dataUser.indexDU', compact('user'));
    }

    public function createUser(Request $request) {
        $request->validate( [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'nik' => 'required|unique:users',
            'gender' => 'required',
            'role' => 'required',
            'password' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $fileName = time() .'.'. $request->image->extension();  
        $request->image->storeAs('public/usersImage', $fileName);

        User::create( [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'nik' => $request->nik,
            'image' => $fileName,
            'address' => $request->address,
            'gender' => $request->gender,
            'role' => $request->role,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan !');
    }
}
