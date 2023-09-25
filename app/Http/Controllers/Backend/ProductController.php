<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;
use App\Models\Vat;
use App\Traits\FileSaver;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use FileSaver;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id','DESC')->get();
        return view('backend.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        $data['categories']     = Category::all();
        $data['brands']         = Brand::all();
        $data['units']          = Unit::all();
        $data['vats']           = Vat::all();
        $data['productCode']    = Helper::productCode();

        return view('backend.product.create')->with($data);
    }


    public function getSubCategoryBycategoryId($id)
    {
        $subCategory = SubCategory::where('category_id',$id)->where('status','active')->get();
        return $subCategory;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'                  => 'required',
            'model'                 => 'required',
            'item_code'             => 'required|unique:products',
            'sub_category_id'       => 'required',
            'brand_id'              => 'required',
            'unit_id'               => 'required',
            'vat_rate'              => 'required',
            'vat_type'              => 'required',
            'regular_price'         => 'required',
            'selling_price'         => 'required',
            'alert_quantity'        => 'required',
            'status'                => 'required',
        ]);

      $product =  Product::create([
            'name'              => $request->name,
            'model'             => $request->model,
            'item_code'         => $request->item_code,
            'sub_category_id'   => $request->sub_category_id,
            'brand_id'          => $request->brand_id,
            'unit_id'           => $request->unit_id,
            'vat_rate'          => $request->vat_type == 'exclusive' ? $request->vat_rate : 0,
            'vat_type'          => $request->vat_type,
            'regular_price'     => $request->regular_price,
            'selling_price'     => $request->selling_price,
            'alert_quantity'    => $request->alert_quantity,
            'status'            => $request->status,
            'discount'          => $request->discount ?? 0,
        ]);


        if($request->file('image')){
            $this->uploadFileWithResize($request->image, $product, 'image', 'product',250,250);
        }


        toastr()->success('Product Added');
        return to_route('product.index');
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
        $data = [];
        $data['product']        = Product::find($id);
        $data['categories']     = Category::all();
        $data['sub_categories'] = SubCategory::all();
        $data['brands']         = Brand::all();
        $data['units']          = Unit::all();
        $data['vats']           = Vat::all();

        return view('backend.product.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'                  => 'required',
            'model'                 => 'required',
            'item_code'             => 'required',
            'sub_category_id'       => 'required',
            'brand_id'              => 'required',
            'unit_id'               => 'required',
            'vat_rate'              => 'required',
            'vat_type'              => 'required',
            'regular_price'         => 'required',
            'selling_price'         => 'required',
            'alert_quantity'        => 'required',
            'status'                => 'required',
        ]);

        $product =  Product::find($id);
        $product->update([
            'name'              => $request->name,
            'model'             => $request->model,
            'item_code'         => $request->item_code,
            'sub_category_id'   => $request->sub_category_id,
            'brand_id'          => $request->brand_id,
            'unit_id'           => $request->unit_id,
            'vat_rate'          => $request->vat_type == 'exclusive' ? $request->vat_rate : 0,
            'vat_type'          => $request->vat_type,
            'regular_price'     => $request->regular_price,
            'selling_price'     => $request->selling_price,
            'alert_quantity'    => $request->alert_quantity,
            'status'            => $request->status,
            'discount'          => $request->discount ?? 0,
        ]);


        if($request->file('image')){
            $this->upload_file($request->image, $product, 'image', 'product');
        }


        toastr()->success('Product Updated');
        return to_route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        // <!-- delete file if exist -->
        if (file_exists($product->image)){
                unlink($product->image);
        }

        $product->delete();
        toastr()->success('Product Deleted');
        return redirect()->back();
    }
}
