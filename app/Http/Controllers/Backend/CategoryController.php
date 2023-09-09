<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $categories = Category::orderBy('id','DESC')->get();
        return view('backend.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|unique:categories',
            'status' => 'required',
            'note'   => 'max:100'
        ]);

        Category::create([
            'name'  => $request->name,
            'status'=> $request->status,
            'note'  => $request->note
        ]);

        toastr()->success('New Category Added');
        return redirect()->back();

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
        $category = Category::find($id);
        return view('backend.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'   => 'required',
            'status' => 'required',
            'note'   => 'max:100'
        ]);

        Category::find($id)->update([
            'name'  => $request->name,
            'status'=> $request->status,
            'note'  => $request->note
        ]);

        toastr()->success('Category Updated');
        return redirect()->route('product-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::find($id)->delete();
        
        toastr()->success('Category Deleted');
        return redirect()->back();
    }
}
