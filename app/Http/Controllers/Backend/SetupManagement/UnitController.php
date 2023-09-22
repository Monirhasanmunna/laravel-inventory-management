<?php

namespace App\Http\Controllers\backend\SetupManagement;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::all();
        return view('backend.setup.units.index',compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.setup.units.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:units',
            'code' => 'required|unique:units',
            'note' => 'max:100',
        ]);

        Unit::create([
            'name'      => $request->name,
            'code'      => $request->code,
            'status'    => $request->status,
            'note'      => $request->note,
        ]);

        toastr()->success('Unit Added');
        return to_route('setup.unit.index');
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
        $unit = Unit::find($id);
        return view('backend.setup.units.edit',compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'note' => 'max:100',
        ]);

        Unit::find($id)->update([
            'name'      => $request->name,
            'code'      => $request->code,
            'status'    => $request->status,
            'note'      => $request->note,
        ]);

        toastr()->success('Unit Updated');
        return to_route('setup.unit.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Unit::find($id)->delete();
        toastr()->success('Unit Deleted');
        return redirect()->back();
    }
}
