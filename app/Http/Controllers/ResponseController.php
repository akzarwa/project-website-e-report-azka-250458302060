<?php

namespace App\Http\Controllers;

use App\Models\Complains;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResponseController extends Controller
{
    public function indexResponse()
    {
        return view('Admin.Response.indexR');
    } 

    public function formResponse($complain_id)
    {
        $komplen = Complains::find($complain_id);
        return view('Admin.Response.tambahResponse', compact('complain_id', 'komplen'));
    }

    public function createRespone(Request $request)
    {
        $request->validate([
            'response' => 'required|string',
        ]);

        Response::create( [
            'admin_id' => Auth::user()->id,
            'complain_id' => $request->complain_id,
            'response' => $request->response,
        ]);

        //kalo sudah response, ubah status komplain jadi selesai
        $komplen = Complains::findOrFail($request->complain_id);
        $komplen->status = 'selesai';
        $komplen->update();

        return redirect()->route('index.Response')->with('success', 'Tanggapan berhasil ditambahkan.');
    }

    public function deleteResponse(Request $request)
    {
        $respon = Response::findOrFail($request->id);
        $respon->delete();
        return redirect()->route('index.Response')->with('Delete', 'Tanggapan berhasil dihapus.');
    }

    public function updateResponse(Request $request)
    {
        $request->validate([
            'response' => 'required|string',
        ]);  
        $respon = Response::findOrFail($request->id);
        $respon->response = $request->response;
        $respon->update();

        return redirect()->route('index.Response')->with('success', 'Tanggapan berhasil diupdate.');
    }
}
