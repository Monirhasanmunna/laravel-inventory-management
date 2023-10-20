<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Vat;
use App\Rules\Purchase\availableBalanceCheckRule;
use App\Rules\Purchase\quantityCheckRule;
use Illuminate\Http\Request;

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
        $suppliers  = Supplier::all();
        $products   = Product::all();
        $vats       = Vat::all();
        $accounts   = Account::all();
        return view('backend.purchase.create',compact('suppliers','products','vats','accounts'));
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
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'supplier_id'       => 'required',
            'quantity'          => [new quantityCheckRule],
            // 'purchase_price'    => 'required',
            // 'total'             => 'required',
            'net_total'         => 'required',
            'total_paid'        => ['required',new availableBalanceCheckRule],
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
            'sub_total'         => $request->sub_total
        ]);


        $products = [];
        foreach ($request['product_id'] as $key => $value) {
            // create new array for attach
            $products [] = [
                'product_id'        => $request['product_id'][$key],
                'quantity'          => $request['quantity'][$key],
                'price'    => $request['purchase_price'][$key],
                'subtotal'          => $request['subtotal'][$key],
            ];
        }

        $purchase->products()->attach($products);
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
