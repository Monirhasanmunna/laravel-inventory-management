<?php

namespace App\Http\Controllers\Backend\AccountsManagement;

use App\Http\Controllers\Controller;
use App\Models\TransactionHistory;
use Illuminate\Http\Request;

class TransactionHistoryController extends Controller
{
    public function index(){
        $transactions = TransactionHistory::orderBy('id','DESC')->get();
        return view('backend.transactions.index',compact('transactions'));
    }
}
