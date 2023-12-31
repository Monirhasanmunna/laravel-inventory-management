<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\TransactionHistory;
use App\Models\Vat;
use App\Rules\Purchase\availableBalanceCheckRule;
use App\Rules\Purchase\quantityCheckRule;
use Illuminate\Http\Request;
use App\Services\AccountsService;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases = Purchase::orderBy('id','DESC')->get();
        return view('backend.purchase.index',compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $poRef      = Helper::POReferenceCount();
        $suppliers  = Supplier::all();
        $products   = Product::all();
        $vats       = Vat::all();
        $accounts   = Account::all();
        return view('backend.purchase.create',compact('suppliers','products','vats','accounts','poRef'));
    }


    public function productDetailsById($id)
    {
        return Product::find($id);
    }

    public function vatDetailsById($id)
    {
        return Vat::find($id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, AccountsService $accounts)
    {
        // return $request->all();
        $request->validate([
            'supplier_id'       => 'required',
            'quantity'          => [new quantityCheckRule],
            'net_total'         => 'required',
            'total_paid'        => [new availableBalanceCheckRule],
            'purchase_date'     => 'required',
            'po_date'           => 'required',
            'status'            => 'required',
            'product'           => 'required',
            'sub_total'         => 'required',
        ]);


        $purchase = Purchase::create([
            'supplier_id'       => $request->supplier_id,
            'account_id'        => $request->account_id,
            'vat_id'            => $request->vat_id,
            'po_reference'      => $request->po_reference,
            'payment_terms'     => $request->payment_terms,
            'total_tax'         => $request->total_tax,
            'discount'          => $request->discount,
            'transport_cost'    => $request->transport_cost,
            'net_total'         => $request->net_total,
            'total_paid'        => $request->total_paid,
            'due_ammount'       => $request->due_ammount,
            'purchase_date'     => $request->purchase_date,
            'po_date'           => $request->po_date,
            'status'            => $request->status,
            'sub_total'         => $request->sub_total,
            'check_no'          => $request->check_no,
            'receipt_no'        => $request->receipt_no,
            'note'              => $request->note,
        ]);


        $products = [];
        foreach ($request['product_id'] as $key => $value) {
            // create new array for attach
            $products [] = [
                'product_id'        => $request['product_id'][$key],
                'quantity'          => $request['quantity'][$key],
                'price'             => $request['purchase_price'][$key],
                'subtotal'          => $request['subtotal'][$key],
            ];
        }

        
        $purchase->products()->attach($products);

        // product quantity update
        foreach ($request['product_id'] as $key => $id) {
            $product = Product::find($id);
            $product->quantity = $product->quantity + $request['quantity'][$key];
            $product->save();
        }

        // create transaction history
        if($purchase->total_paid != null){
            $reason = '['.$purchase->po_reference.'] Purchase Payment sent from';
            $accounts->createHistory($purchase, $reason, 'debit', $purchase->total_paid);
            $accounts->transaction($purchase, 'debit', $purchase->total_paid);
        }

        toastr()->success('Purchase Creared Successfully');
        return to_route('purchase.index');
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
        $suppliers  = Supplier::all();
        $products   = Product::all();
        $vats       = Vat::all();
        $accounts   = Account::all();

        $purchase  = Purchase::find($id);
        return view('backend.purchase.edit',compact('suppliers','products','vats','accounts','purchase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, AccountsService $accounts)
    {
        $purchase   = Purchase::find($id);

        if($purchase->account_id){
            $account    = Account::find($purchase->account_id);
            $account->total_ammount = $account->total_ammount + $purchase->total_paid;
            $account->save();
        }

        // old product quantity minus
        foreach ($purchase->products as $key => $product) {
            $product = Product::find($product->id);
            $product->quantity = $product->quantity - $purchase->products[$key]->pivot->quantity;
            $product->save();
        }
        
        //  return $request->all();
         $request->validate([
            'supplier_id'       => 'required',
            'quantity'          => [new quantityCheckRule],
            'net_total'         => 'required',
            'total_paid'        => [new availableBalanceCheckRule],
            'purchase_date'     => 'required',
            'po_date'           => 'required',
            'status'            => 'required',
            'sub_total'         => 'required',
        ]);

        
        $purchase->update([
            'supplier_id'       => $request->supplier_id,
            'account_id'        => $request->account_id,
            'vat_id'            => $request->vat_id,
            'po_reference'      => $request->po_reference,
            'payment_terms'     => $request->payment_terms,
            'total_tax'         => $request->total_tax,
            'discount'          => $request->discount,
            'transport_cost'    => $request->transport_cost,
            'net_total'         => $request->net_total,
            'total_paid'        => $request->total_paid,
            'due_ammount'       => $request->due_ammount,
            'purchase_date'     => $request->purchase_date,
            'po_date'           => $request->po_date,
            'status'            => $request->status,
            'sub_total'         => $request->sub_total,
            'check_no'          => $request->check_no,
            'receipt_no'        => $request->receipt_no,
            'note'              => $request->note,
        ]);

        
        $products = [];
        foreach ($request['product_id'] as $key => $value) {
            // create new array for attach
            $products [] = [
                'product_id'        => $request['product_id'][$key],
                'quantity'          => $request['quantity'][$key],
                'price'             => $request['purchase_price'][$key],
                'subtotal'          => $request['subtotal'][$key],
            ];
        }

        // return $products;
        $purchase->products()->detach($request['product_id']);
        $purchase->products()->sync($products);


        // product quantity update
        foreach ($request['product_id'] as $key => $id) {
            $product = Product::find($id);
            $product->quantity = $product->quantity + $request['quantity'][$key];
            $product->save();
        }


        // create transaction history
        if($purchase->total_paid != null){
            $reason = '['.$purchase->po_reference.'] Purchase Payment sent from';
            $accounts->transaction($purchase, 'debit', $purchase->total_paid);

           $history = TransactionHistory::where('source_type','App\Models\Purchase')->where('source_id',$id)->first();
           $history->update([
            'ammount'   => $purchase->total_paid,
            'type'      => 'debit',
            'reason'    => $reason,
           ]);
        }

        toastr()->success('Purchase Creared Successfully');
        return to_route('purchase.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Purchase::find($id)->delete();
        toastr()->success('Purchase Deleted Successfully');
        return redirect()->back();
    }
}
