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
            <h2>Add Suppliers</h2>

            <div class="text-right">
                <a href="{{route('suppliers.index')}}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left mr-2" style="font-size: 17px;"></i>Back</a>
            </div>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form id="demo-form" action="{{route('suppliers.store')}}" method="Post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-6">
                  <label for="fullname">Name * :</label>
                  <input type="text" id="fullname" class="form-control" value="{{old('name')}}" name="name" class="@error('name') is-invalid @enderror">
                  @error('name')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-6">
                  <label for="company_name">Company Name * :</label>
                  <input type="text" id="company_name" class="form-control" value="{{old('company_name')}}" name="company_name" class="@error('company_name') is-invalid @enderror">
                  @error('company_name')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-6 mt-3">
                  <label for="contact_number">Contact Number * :</label>
                  <input type="text" id="contact_number" class="form-control" value="{{old('contact_number')}}" name="contact_number" class="@error('contact_number') is-invalid @enderror">
                  @error('contact_number')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-6 mt-3">
                  <label for="email">Email * :</label>
                  <input type="email" id="email" class="form-control" name="email" value="{{old('email')}}" class="@error('email') is-invalid @enderror">
                  @error('email')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-12 mt-3">
                  <label for="address">Address * :</label>
                    <textarea id="address" class="form-control form-control" name="address" class="@error('address') is-invalid @enderror">{{old('address')}}</textarea>
                    @error('address')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-6 mt-3">
                  <label for="heard">Status *:</label>
                  <select id="heard" class="form-control form-control @error('status') is-invalid @enderror" name="status">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                </div>

                <div class="col-6 mt-3">
                  <label for="image">Image :</label>
                  <input class="form-control dropify" id="image" name="image" type="file"
                  class="@error('image') is-invalid @enderror">
  
                  @error('image')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

              </div>
              
              <div class="row">
                <div class="col-12">
                  <button class="btn btn-primary" type="submit" >Submit</button>
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
@endpush