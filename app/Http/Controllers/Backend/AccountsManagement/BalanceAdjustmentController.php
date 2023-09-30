<?php

namespace App\Http\Controllers\Backend\AccountsManagement;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\BalanceAdjustment;
use Illuminate\Http\Request;
use App\Services\AccountsService;
use App\Rules\RemoveBalanceRule;

class BalanceAdjustmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adjustments = BalanceAdjustment::orderBy('id','DESC')->get();
        return view('backend.cashbooks.balance_adjustment.index',compact('adjustments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $accounts = Account::all();
        return view('backend.cashbooks.balance_adjustment.create',compact('accounts'));
    }

    public function AccountInfo($id)
    {
        return Account::find($id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , AccountsService $accounts)
    {
        
        $request->validate([
            'account_id'        => 'required',
            'type'              => 'required',
            'ammount'           => ['required',new RemoveBalanceRule],
            'date'              => 'required',
            'status'            => 'required',
        ]);


        $adjustment = BalanceAdjustment::create([
            'account_id'  => $request->account_id,
            'type'        => $request->type,
            'ammount'     => $request->ammount,
            'date'        => $request->date,
            'status'      => $request->status,
            'note'        => $request->note,
        ]);

        // balance adjustment servire
        $accounts->BalanceAdjustmentToAccount($adjustment);

        toastr()->success('Balance Adjustment Successfully');
        return to_route('balance.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
