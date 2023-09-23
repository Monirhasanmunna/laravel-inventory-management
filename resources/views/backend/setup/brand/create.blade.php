@extends('app')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12  animation">
        <div class="x_panel">
          <div class="x_title">
            <h2>Add Brand<small>add a brand</small></h2>

            <div class="text-right">
                <a href="{{route('setup.brand.index')}}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left mr-2" style="font-size: 17px;"></i>Back</a>
            </div>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form id="demo-form" action="{{route('setup.brand.store')}}" method="Post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-4">
                  <label for="name">Name * :</label>
                  <input type="text" id="name" class="form-control" name="name" class="@error('name') is-invalid @enderror">
                  @error('name')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-4">
                  <label for="code">Code * :</label>
                  <input type="text" id="code" class="form-control" name="code" class="@error('code') is-invalid @enderror">
                  @error('code')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-4">
                    <label for="heard">Status *:</label>
                    <select id="heard" class="form-control form-control @error('status') is-invalid @enderror" name="status">
                      <option value="active">Active</option>
                      <option value="inactive">Inactive</option>
                  </select>
                </div>


                <div class="col-12 mt-3">
                  <label for="fullname">image :</label>
                  <input class="form-control dropify" id="image" name="image" type="file"
                  class="@error('image') is-invalid @enderror">
  
                  @error('image')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="row mt-3">
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

<script>
  // In your Javascript (external .js resource or <script> tag)
  $(document).ready(function() {
      $('.dropify').dropify();
      $('.js-example-basic-single').select2();
  });
</script>
    
@endpush