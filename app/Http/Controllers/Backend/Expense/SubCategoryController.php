<?php

namespace App\Http\Controllers\Backend\Expense;

use App\Http\Controllers\Controller;
use App\Models\ExpCategory;
use App\Models\ExpSubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategories = ExpSubCategory::orderBy('id','DESC')->get();
        return view('backend.expense.sub-categories.index',compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ExpCategory::where('status','active')->get();
        return view('backend.expense.sub-categories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name'          => 'required|unique:exp_sub_categories',
            'category_id'   => 'required',
            'status'        => 'required'
        ]);

        ExpSubCategory::create([
            'exp_category_id'   => $request->category_id,
            'name'              => $request->name,
            'status'            => $request->status,
            'note'              => $request->note
        ]);

        toastr()->success('Expense Subcategory Created');
        return to_route('expense.sub_categories.index');
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
        $categories = ExpCategory::all();
        $subCategory = ExpSubCategory::find($id);
        return view('backend.expense.sub-categories.edit',compact('categories','subCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'          => 'required|unique:exp_sub_categories,name,' . $id,
            'category_id'   => 'required',
            'status'        => 'required'
        ]);

        ExpSubCategory::find($id)->update([
            'exp_category_id'   => $request->category_id,
            'name'              => $request->name,
            'status'            => $request->status,
            'note'              => $request->note
        ]);

        toastr()->success('Expense Subcategory Updated');
        return to_route('expense.sub_categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ExpSubCategory::find($id)->delete();
        toastr()->success('Expense Subcategory Deleted');
        return redirect()->back();
    }
}
