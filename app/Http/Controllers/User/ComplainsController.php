<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Complains;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplainsController extends Controller
{
    public function tableUser()
    {
        // Ambil semua data dari tabel complains yang user_id nya sama dengan id user yang sedang login
        // pakai get karena get ini fungsi untuk mengambil semua data sesuai dengan kriteria yang diberikan
        // kalau mau ambil satu data aja pakai first()
        $aduan = Complains::where('user_id', Auth::user()->id)->get();
        return view('User.complains.indexCom' , compact('aduan'));
    }

    public function formAduan()
    {
        $category = category::all();
        return view('User.complains.formComplain'  , compact('category'));
    }

    public function storeAduan(Request $request) {
        $request->validate([
            'category_id' => 'required',
            'judul' => 'required',
            'keterangan' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'lokasi' => 'required',
            'tanggal_aduan' => 'required',
        ]);

        $filename = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/complainsImages', $filename);

        $kata = "ADUAN-";
        $karakter_code = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $acak = str_shuffle($karakter_code);
        // str_shuffle() untuk mengacak string karakter_code
        $code = substr($acak, 0, 4);
        // substr() untuk mengambil 4 karakter dari string yang sudah diacak
        $no_aduan = $kata . $code;

        Complains::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'no_aduan' => $no_aduan,
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'image' => $filename,
            'lokasi' => $request->lokasi,
            'tanggal_aduan' => $request->tanggal_aduan,
        ]);

        return redirect()->route('pengaduan.my')->with('success', 'Aduan Berhasil Dikirim !');
        
    }

    public function deleteAduan(Request $request)
    {
        $complains = Complains::findOrFail($request->id);
        $complains->delete();

        return redirect()->back()->with('delete', 'Berhasil hapus data !');
    }
}
