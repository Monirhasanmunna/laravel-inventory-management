<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategories = SubCategory::orderBy('id','DESC')->get();
        return view('backend.sub-categories.index',compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.sub-categories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name'        => 'required|unique:sub_categories',
            'status'      => 'required',
            'note'        => 'max:100'
        ]);


        SubCategory::create([
            'category_id'   => $request->category_id,
            'name'          => $request->name,
            'status'        => $request->status,
            'note'          => $request->note
        ]);

        toastr()->success('Sub Category Added');
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
        $categories = Category::all();
        $subCategory = SubCategory::find($id);
        return view('backend.sub-categories.edit',compact('subCategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_id' => 'required',
            'name'        => 'required',
            'status'      => 'required',
            'note'        => 'max:100'
        ]);

        SubCategory::find($id)->update([
            'category_id'   => $request->category_id,
            'name'          => $request->name,
            'status'        => $request->status,
            'note'          => $request->note
        ]);

        toastr()->success('Sub Category Updated');
        return to_route('product-sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SubCategory::find($id)->delete();
        toastr()->success('Sub Category Deleted');
        return redirect()->back();
    }
}
