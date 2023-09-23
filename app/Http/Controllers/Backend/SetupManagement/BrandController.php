<?php

namespace App\Http\Controllers\Backend\SetupManagement;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Traits\FileSaver;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    use FileSaver;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('backend.setup.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.setup.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brands',
            'code' => 'required|unique:brands',
            'status' => 'required',
        ]);

       $brand =  Brand::create([
            'name' => $request->name,
            'code' => $request->code,
            'status' => $request->status,
        ]);

        if($request->file('image')){
            $this->uploadFileWithResize($request->image, $brand, 'image', 'brand',250,250);
        }

        toastr()->success('Brand Added');
        return to_route('setup.brand.index');
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
        $brand = Brand::find($id);
        return view('backend.setup.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'status' => 'required',
        ]);

       $brand =  Brand::find($id);
       $brand->update([
            'name' => $request->name,
            'code' => $request->code,
            'status' => $request->status,
        ]);

        if($request->file('image')){
            $this->upload_file($request->image, $brand, 'image', 'brand');
        }

        toastr()->success('Brand Updated');
        return to_route('setup.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::find($id);
       // <!-- delete file if exist -->
       if (file_exists($brand->image)){
            unlink($brand->image);
        }

        $brand->delete();
        toastr()->success('Brand Deleted');
        return redirect()->back();
    }
}
