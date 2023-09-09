@extends('app')

@section('content')
{{-- <div class="page-title">
    <div class="title_left">
      <h3>Category</h3>
    </div>
</div>

<div class="clearfix"></div> --}}

<div class="row">
    <div class="col-md-12 col-sm-12  animation">
        <div class="x_panel">
          <div class="x_title">
            <h2>Edit Category<small>Edit a product category</small></h2>

            <div class="text-right">
                <a href="{{route('product-category.index')}}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left mr-2" style="font-size: 17px;"></i>Back</a>
            </div>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form id="demo-form" action="{{route('product-category.update',$category->id)}}" method="Post">
              @method('PUT')
              @csrf
              <div class="row">
                <div class="col-6">
                  <label for="fullname">Name * :</label>
                  <input type="text" id="fullname" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$category->name ?? ''}}">
                </div>

                <div class="col-6">
                  <label for="heard">Status *:</label>
                  <select id="heard" class="form-control form-control @error('status') is-invalid @enderror" name="status">
                    <option {{$category->status == 'active' ? 'selected' : ''}} value="active">Active</option>
                    <option {{$category->status == 'inactive' ? 'selected' : ''}} value="inactive">Inactive</option>
                </select>
                </div>
              </div>

              <div class="row my-3">
                <div class="col-12">
                  <label for="message">Note (100 chars max) :</label>
                    <textarea id="message" class="form-control form-control @error('note') is-invalid @enderror" name="note">{{$category->note ?? ''}}</textarea>
                </div>
              </div>
              
              <div class="row">
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

