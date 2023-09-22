<?php

namespace App\Http\Controllers\Backend\SetupManagement;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currencies = Currency::all();
        return view('backend.setup.currency.index',compact('currencies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.setup.currency.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|unique:currencies',
            'code'      => 'required|unique:currencies',
            'symbol'    => 'required|unique:currencies',
            'note'      => 'max:100',
        ]);

        Currency::create([
            'name' => $request->name,
            'code' => $request->code,
            'symbol' => $request->symbol,
            'status' => $request->status,
            'note' => $request->note
        ]);

        toastr()->success('Currency Added');
        return to_route('setup.currency.index');
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
        $currency = Currency::find($id);
        return view('backend.setup.currency.edit',compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'      => 'required',
            'code'      => 'required',
            'symbol'    => 'required',
            'note'      => 'max:100',
        ]);

        Currency::find($id)->update([
            'name'      => $request->name,
            'code'      => $request->code,
            'symbol'    => $request->symbol,
            'status'    => $request->status,
            'note'      => $request->note
        ]);

        toastr()->success('Currency Updated');
        return to_route('setup.currency.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Currency::find($id)->delete();
        toastr()->success('Currency Deleted');
        return redirect()->back();
    }
}
