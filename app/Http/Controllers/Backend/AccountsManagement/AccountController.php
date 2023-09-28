<?php

namespace App\Http\Controllers\Backend\AccountsManagement;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = Account::all();
        return view('backend.account.index',compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.account.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bank_name'     => 'required|unique:accounts',
            'branch_name'   => 'required',
            'account_number'=> 'required|unique:accounts',
            'date'          => 'required',
        ]);

        Account::create([
            'bank_name'         => $request->bank_name,
            'branch_name'       => $request->branch_name,
            'account_number'    => $request->account_number,
            'date'              => $request->date,
            'note'              => $request->note,
        ]);


        toastr()->success('Account Added Successfully');
        return to_route('accounts.index');
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
        $account = Account::find($id);
        return view('backend.account.edit',compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'bank_name'     => 'required',
            'branch_name'   => 'required',
            'account_number'=> 'required',
            'date'          => 'required',
        ]);

        Account::find($id)->update([
            'bank_name'         => $request->bank_name,
            'branch_name'       => $request->branch_name,
            'account_number'    => $request->account_number,
            'date'              => $request->date,
            'note'              => $request->note,
        ]);


        toastr()->success('Account Updated Successfully');
        return to_route('accounts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Account::find($id)->delete();
        toastr()->success('Account Deleted Successfully');
        return redirect()->back();
    }
}
