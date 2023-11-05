<?php

namespace App\Http\Controllers\Backend\Expense;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\ExpCategory;
use App\Models\Expense;
use App\Models\ExpSubCategory;
use App\Rules\ExpenseUpdateAmmountRule;
use App\Rules\Purchase\availableBalanceCheckRule;
use App\Services\AccountsService;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::with(['category','subCategory','account'])->orderBy('id','DESC')
        ->select('id','reason','exp_category_id','exp_sub_category_id','account_id','ammount','date','status')
        ->get();

        return view('backend.expense.expense.index',compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ExpCategory::where('status','active')->get();
        $accounts = Account::where('status','active')->get();

        return view('backend.expense.expense.create',compact('categories','accounts'));
    }


    public function SubCategoryById($id)
    {
        return ExpSubCategory::where('exp_category_id',$id)->where('status','active')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, AccountsService $accounts)
    {
        $request->validate([
            'reason'  => 'required',
            'category_id'  => 'required',
            'sub_category_id'  => 'required',
            'ammount'  => ['required',new availableBalanceCheckRule],
        ]);



       $expense = Expense::create([
            'exp_category_id'       => $request->category_id,
            'exp_sub_category_id'   => $request->sub_category_id,
            'account_id'            => $request->account_id,
            'reason'                => $request->reason,
            'ammount'               => $request->ammount,
            'check_no'              => $request->check_no,
            'voucher_no'            => $request->voucher_no,
            'note'                  => $request->note,
            'date'                  => $request->date,
            'status'                => $request->status,
        ]);


        $accounts->transaction($expense, 'debit', $expense->ammount);
        $reason = 'Paid For '.$expense->reason;
        $accounts->createHistory($expense, $reason, 'debit', $expense->ammount);


        toastr()->success('Expense Created');
        return to_route('expense.expenses.index');

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
        $categories = ExpCategory::where('status','active')->get();
        $accounts = Account::where('status','active')->get();

        $expense = Expense::with(['category','subCategory','account'])->find($id);
        return view('backend.expense.expense.edit',compact('expense','categories','accounts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, AccountsService $accounts)
    {
        $request->validate([
            'reason'  => 'required',
            'category_id'  => 'required',
            'sub_category_id'  => 'required',
        ]);


        $expense = Expense::find($id);
        $account = Account::find($expense->account_id);
        $account->total_ammount = $account->total_ammount + $expense->ammount;
        
        $request->validate([
            'ammount'  => ['required',new ExpenseUpdateAmmountRule($account->total_ammount)],
        ]);

       $account->save();

       $expense->update([
            'exp_category_id'       => $request->category_id,
            'exp_sub_category_id'   => $request->sub_category_id,
            'account_id'            => $request->account_id,
            'reason'                => $request->reason,
            'ammount'               => $request->ammount,
            'check_no'              => $request->check_no,
            'voucher_no'            => $request->voucher_no,
            'note'                  => $request->note,
            'date'                  => $request->date,
            'status'                => $request->status,
        ]);


        $accounts->transaction($expense, 'debit', $expense->ammount);
        $reason = 'Paid For '.$expense->reason;
        $accounts->createHistory($expense, $reason, 'debit', $expense->ammount);


        toastr()->success('Expense Updated');
        return to_route('expense.expenses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Expense::find($id)->delete();

        toastr()->success('Expense Deleted');
        return redirect()->back();
    }
}
