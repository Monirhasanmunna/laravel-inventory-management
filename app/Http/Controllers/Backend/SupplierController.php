<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Traits\FileSaver;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    use FileSaver;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::orderBy('id','DESC')->get();
        return view('backend.suppliers.index',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name'  => 'required|unique:suppliers',
            'name'          => 'required',
            'contact_number'=> 'required|unique:suppliers',
            'email'         => 'required|unique:suppliers',
            'address'       => 'required',
        ]);


        $supplier = Supplier::create([
            'name'          => $request->name,
            'company_name'  => $request->company_name,
            'contact_number'=> $request->contact_number,
            'email'         => $request->email,
            'address'       => $request->address,
            'status'        => $request->status,
            // 'image'         => $request->image,
        ]);


        if($request->file('image')){
            $this->upload_file($request->image, $supplier, 'image', 'suppliers');
        }

        toastr()->success('Supplier Added Successfully');
        return to_route('suppliers.index');

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
        $supplier = Supplier::find($id);
        return view('backend.suppliers.edit',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'company_name'  => 'required',
            'name'          => 'required',
            'contact_number'=> 'required',
            'email'         => 'required',
            'address'       => 'required',
        ]);


        $supplier = Supplier::find($id);
        $supplier->update([
            'name'          => $request->name,
            'company_name'  => $request->company_name,
            'contact_number'=> $request->contact_number,
            'email'         => $request->email,
            'address'       => $request->address,
            'status'        => $request->status,
        ]);


        if($request->file('image')){
            $this->upload_file($request->image, $supplier, 'image', 'suppliers');
        }

        toastr()->success('Supplier Updated Successfully');
        return to_route('suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::find($id);
        // <!-- delete file if exist -->
        if (file_exists($supplier->image)){
                unlink($supplier->image);
        }

        $supplier->delete();
        toastr()->success('Supplier Deleted Successfully');
        return redirect()->back();
    }
}
