<?php

namespace App\Http\Controllers\Backend\Expense;

use App\Http\Controllers\Controller;
use App\Models\ExpCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ExpCategory::all();
        return view('backend.expense.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.expense.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|unique:exp_categories',
            'status'=> 'required'
        ]);

        ExpCategory::create([
            'name'  => $request->name,
            'status'  => $request->status,
            'note'  => $request->note,
        ]);

        toastr()->success('Expense category created successfully');
        return to_route('expense.categories.index');
    }

    public function edit(string $id)
    {
        $category = ExpCategory::find($id);
        return view('backend.expense.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'  => 'required|unique:exp_categories,name,' . $id,
            'status'=> 'required'
        ]);

        ExpCategory::find($id)->update([
            'name'  => $request->name,
            'status'  => $request->status,
            'note'  => $request->note,
        ]);

        toastr()->success('Expense category updated successfully');
        return to_route('expense.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ExpCategory::find($id)->delete();
        toastr()->success('Expense category deleted');
        return redirect()->back();

    }
}
