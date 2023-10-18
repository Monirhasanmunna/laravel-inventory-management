@extends('app')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12  animation">
        <div class="x_panel">
          <div class="x_title">
            <h2>Edit Product<small>edit a product</small></h2>

            <div class="text-right">
                <a href="{{route('product.index')}}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left mr-2" style="font-size: 17px;"></i>Back</a>
            </div>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form id="demo-form" action="{{route('product.update',$product->id)}}" method="Post" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-4">
                  <label for="fullname">Name * :</label>
                  <input type="text" id="fullname" class="form-control" value="{{$product->name ?? ''}}" name="name" class="@error('name') is-invalid @enderror">
                  @error('name')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-4">
                  <label for="model">Model * :</label>
                  <input type="text" id="model" class="form-control" value="{{$product->model ?? ''}}" name="model" class="@error('model') is-invalid @enderror">
                  @error('model')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-4">
                  <label for="item_code">Item Code * :</label>
                  <input type="text" id="item_code" readonly class="form-control" value="{{$product->item_code ?? ''}}" name="item_code" class="@error('item_code') is-invalid @enderror">
                  @error('item_code')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-4 mt-3">
                  <label for="category">Category *:</label>
                  <select id="category_id" class="form-control js-example-basic-single">
                    <option hidden selected>Choose a Category</option>
                    @foreach ($categories as $category)
                      <option {{$product->subCategory->category->id == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-4 mt-3">
                  <label for="sub_category">Sub Category *:</label>
                  <select id="sub_category" class="form-control @error('sub_category_id') is-invalid @enderror js-example-basic-single" name="sub_category_id">
                    @foreach ($sub_categories as $sub)
                      <option {{$product->sub_category_id == $sub->id ? 'selected' : ''}} value="{{$sub->id}}">{{$sub->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-4 mt-3">
                  <label for="brand">Brand *:</label>
                  <select id="brand" class="form-control @error('brand_id') is-invalid @enderror js-example-basic-single" name="brand_id">
                    <option hidden selected>Choose a Brand</option>
                    @foreach ($brands as $brand)
                      <option {{$product->brand->id == $brand->id ? 'selected' : ''}} value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-4 mt-3">
                  <label for="unit">Unit *:</label>
                  <select id="unit" class="form-control @error('unit_id') is-invalid @enderror js-example-basic-single" name="unit_id">
                    <option hidden selected>Choose a Unit</option>
                    @foreach ($units as $unit)
                      <option {{$product->unit->id == $unit->id ? 'selected' : ''}} value="{{$unit->id}}">{{$unit->name}}</option>
                    @endforeach
                </select>
                </div>

                <div class="col-4 mt-3">
                  <label for="vat">VAT *:</label>
                  <select id="vat" class="form-control @error('vat_id') is-invalid @enderror js-example-basic-single" name="vat_rate">
                    @foreach ($vats as $vat)
                      <option {{$product->vat_rate == $vat->rate ? 'selected' : ''}} value="{{$vat->rate}}">{{$vat->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-4 mt-3">
                  <label for="vat_type">VAT Type *:</label>
                  <select id="vat_type" class="form-control form-control @error('vat_type') is-invalid @enderror" name="vat_type">
                    <option {{$product->vat_type == 'inclusive' ? 'selected' : ''}} value="inclusive">Inclusive</option>
                    <option {{$product->vat_type == 'exclusive' ? 'selected' : ''}} value="exclusive">Exclusive</option>
                  </select>
                </div>

                <div class="col-4 mt-3">
                  <label for="regular_price">Regular Price * :</label>
                  <input type="number" id="regular_price" class="form-control" value="{{$product->regular_price ?? ''}}" name="regular_price" class="@error('regular price') is-invalid @enderror">
                  @error('regular price')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-4 mt-3">
                  <label for="discount">Discount * : <small>(in %)</small></label>
                  <input type="number" id="discount" class="form-control" value="{{$product->discount ?? ''}}" name="discount" class="@error('discount') is-invalid @enderror">
                  @error('discount')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-4 mt-3">
                  <label for="selling_price">Selling Price * :</label>
                  <input type="number" id="selling_price" readonly value="{{$product->selling_price ?? ''}}" class="form-control" name="selling_price" class="@error('selling_price') is-invalid @enderror">
                  @error('selling_price')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-12 mt-3">
                  <label for="note">Note (100 chars max) :</label>
                    <textarea id="note" class="form-control form-control" name="note" class="@error('note') is-invalid @enderror">{{$product->note}}</textarea>
                    @error('note')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-4 mt-3">
                  <label for="alert_quantity">Alert Quantity * :</label>
                  <input type="number" id="alert_quantity" class="form-control" value="{{$product->alert_quantity ?? ''}}" name="alert_quantity" class="@error('alert_quantity') is-invalid @enderror">
                  @error('alert_quantity')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-4 mt-3">
                  <label for="status">Status *:</label>
                  <select id="status" class="form-control form-control @error('status') is-invalid @enderror" name="status">
                    <option {{$product->vat_type == 'active' ? 'selected' : ''}} value="active">Active</option>
                    <option {{$product->vat_type == 'inactive' ? 'selected' : ''}} value="inactive">Inactive</option>
                  </select>
                </div>

                <div class="col-4 mt-3">
                  <label for="image">image :</label>
                  <input class="form-control dropify" data-default-file="{{asset($product->image)}}" id="image" name="image" type="file"
                  class="@error('image') is-invalid @enderror">
  
                  @error('image')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="row mt-3">
                <div class="col-12">
                  <button class="btn btn-primary" type="submit" >Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  // In your Javascript (external .js resource or <script> tag)
  $(document).ready(function() {
      $('.dropify').dropify();
      $('.js-example-basic-single').select2();
  });
</script>


<script>
  $(document).ready(function(){
    $("#category_id").change(function(){
      let id = $(this).val();
      
      $.ajax({
        url     : `/product/get_sub_category/${id}`,
        type    : 'GET',
        success : function(data){
          if(data.length > 0){
            $("#sub_category").empty();
            $.each(data,function(i,v){
              $("#sub_category").append(`<option value='${v.id}'>${v.name}</option>`);
              $("#sub_category").removeAttr('disabled');
            });
          }else{
            $("#sub_category").html(`<option>No sub category added</option>`);
            $("#sub_category").attr('disabled','disabled');
          }
        }
      });
    });


    function calculationSellingPrice(){
      let regularPrice = $("#regular_price").val();
      let vatRate      = $("#vat").val();
      let discountRate = $("#discount").val();
      let vatType      = $("#vat_type").val();
      let calculateSellingPrice = parseInt(regularPrice);

      vatType == 'exclusive' ? calculateSellingPrice = calculateSellingPrice + (parseInt(regularPrice) / 100) * parseInt(vatRate) : calculateSellingPrice;
      
      let discountAmmount = (calculateSellingPrice/100)* parseInt(discountRate);
      discountAmmount ? calculateSellingPrice = calculateSellingPrice - discountAmmount : calculateSellingPrice;

      $("#selling_price").val(calculateSellingPrice);
    }
    

    $("#vat_type , #vat").change(function(){
      calculationSellingPrice();
    });

    $("#regular_price , #discount").keyup(function(){
      calculationSellingPrice();
    });


  });
</script>
    
@endpush