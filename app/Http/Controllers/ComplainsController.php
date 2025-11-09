<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\complains;
use App\Models\User;
use Illuminate\Http\Request;

class ComplainsController extends Controller
{
    public function indexComplains()
    {
        $complains = complains::all();
        return view('Admin.Complains.indexC', compact('complains'));
    }   

    public function createComplains()
    {
        $user = User::all();
        $category = category::all();
        return view('Admin.Complains.create' , compact('user', 'category'));
    }

    public function updateStatus(Request $request, $id)
    {
        $complain = complains::findOrFail($id);
        $complain->status = $request->status;
        $complain->update();
        return redirect()->back()->with('success', 'Status pengaduan berhasil diperbarui.');
        
    }   
}
