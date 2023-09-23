<?php

namespace App\Http\Controllers\Backend\SetupManagement;

use App\Http\Controllers\Controller;
use App\Models\Vat;
use Illuminate\Http\Request;

class VatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vats = Vat::all();
        return view('backend.setup.vat.index',compact('vats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.setup.vat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:vats',
            'code' => 'required|unique:vats',
            'rate' => 'required|unique:vats',
            'status' => 'required',
        ]);

        Vat::create([
            'name' => $request->name,
            'code' => $request->code,
            'rate' => $request->rate,
            'status' => $request->status,
        ]);


        toastr()->success('Vat Added');
        return to_route('setup.vat.index');
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
        $vat = Vat::find($id);
        return view('backend.setup.vat.edit',compact('vat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'rate' => 'required',
            'status' => 'required',
        ]);

        Vat::find($id)->update([
            'name' => $request->name,
            'code' => $request->code,
            'rate' => $request->rate,
            'status' => $request->status,
        ]);


        toastr()->success('Vat Updated');
        return to_route('setup.vat.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Vat::find($id)->delete();
        toastr()->success('Vat Deleted');
        return redirect()->back();
    }
}
