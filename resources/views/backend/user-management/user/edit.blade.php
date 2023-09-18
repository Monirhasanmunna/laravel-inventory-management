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
            <h2>Edit Role<small>Edit a role</small></h2>

            <div class="text-right">
                <a href="{{route('userManagement.role.index')}}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left mr-2" style="font-size: 17px;"></i>Back</a>
            </div>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form id="demo-form" action="{{route('userManagement.role.update',$role->id)}}" method="Post">
              @method('PUT')
              @csrf
              <div class="row mb-3">
                <div class="col-6">
                  <label for="fullname">Role Name * :</label>
                  <input type="text" id="fullname" class="form-control" class="@error('name') is-invalid @enderror" name="name" value="{{$role->name ?? ''}}">
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
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

