<?php

namespace App\Http\Controllers\Backend\AccountsManagement;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\BalanceTransfer;
use App\Rules\isSameAccount;
use App\Rules\RemoveBalanceRule;
use App\Services\AccountsService;
use Illuminate\Http\Request;

class BalanceTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transfers = BalanceTransfer::all();
        return view('backend.cashbooks.balance-transfer.index',compact('transfers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $accounts = Account::all();
        return view('backend.cashbooks.balance-transfer.create',compact('accounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, AccountsService $account)
    {
        $request->validate([
            'transfer_reason'   => 'required',
            'from_account_id'   => 'required',
            'to_account_id'     => ['required', new isSameAccount],
            'ammount'           => ['required', new RemoveBalanceRule],
            'status'            => 'required',
        ]);


        $transfer = BalanceTransfer::create([
            'from_account_id'   => $request->from_account_id,
            'to_account_id'     => $request->to_account_id,
            'transfer_reason'   => $request->transfer_reason,
            'ammount'           => $request->ammount,
            'status'            => $request->status,
            'note'              => $request->note,
            'date'              => $request->date,
        ]);

        // transfer balance service
        $account->transferBalance($transfer);

        toastr()->success('Balance Transfer Successfully');
        return to_route('balance-transfer.index');
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
