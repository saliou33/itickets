<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        return view('admin.category.index')
            ->with('categories', Category::all());
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|unique:categories'
        ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->save();

        return back()->with('success', 'role creer avec succes.');
    }


    public function show($id) {
        $category = Category::find($id);

        if($category  == null) {
            return back()->with('danger', 'categorie introuvable.');
        }

        return view('admin.category.form')
            ->with('category', $category);
    }

    public function update(Request $request) {

        $request->validate([
            'id' => 'required',
            'name' => 'required|unique:categories'
        ]);

        $category = Category::find($id);

        if($category  == null) {
            return back()->with('danger', 'categorie introuvable.');
        }

        $category->name = $request->input('name');
        $category->save();

        return back();
    }

    public function delete($id) {
        Category::destroy($id);

        return back()->with('success', 'role supprimer avec succes.');
    }
}
