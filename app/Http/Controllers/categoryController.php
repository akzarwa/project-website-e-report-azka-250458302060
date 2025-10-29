<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class categoryController extends Controller
{
    public function indexCategory() {
        $category = category::all();
        return view('admin.category.indexCategory', compact('category'));
    }

    public function createCategory(Request $request) {
        category::create( [
            'category' => $request->category,
            'slug' => str::slug(($request->category) )
        ]);

        return redirect()->back()->with('success', "Data $request->category berhasil ditambahkan !");
    } 

    public function updateCategory(Request $request) {
        $category = category::findOrFail($request->id);
        $category->update( [
            'category' => $request->category,
            'slug' => str::slug($request->category)
        ]);
        
        return redirect()->back()->with('success', "Data $request->category berhasil diupdate !");
    }

    public function deleteCategory(Request $request) {
        $category = category::findOrFail($request->id);
        $category->delete();

        return redirect()->back()->with('delete', "Data $request->category berhasil dihapus !");
    }
}
