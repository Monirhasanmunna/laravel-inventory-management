@extends('app')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12  animation">
        <div class="x_panel">
          <div class="x_title">
            <h2>Add User<small>add a user</small></h2>

            <div class="text-right">
                <a href="{{route('userManagement.user.index')}}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left mr-2" style="font-size: 17px;"></i>Back</a>
            </div>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form id="demo-form" action="{{route('userManagement.user.store')}}" method="Post">
              @csrf
              <div class="row mb-3">

                <div class="col-6">
                    <label for="heard">Roles Name *:</label>
                    <select id="heard" class="form-control form-control @error('role') is-invalid @enderror" name="role">
                      @foreach ($roles as $role)
                          <option value="{{$role->id}}">{{$role->name}}</option>
                      @endforeach
                    </select>
                </div>

                <div class="col-6"></div>

                <div class="col-6 mt-3">
                  <label for="fullname">User Name * :</label>
                  <input type="text" id="fullname" class="form-control" name="name" class="@error('name') is-invalid @enderror">
                  @error('name')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-6 mt-3">
                  <label for="fullname">Email * :</label>
                  <input type="email" id="fullname" class="form-control" name="email" class="@error('email') is-invalid @enderror">
                  @error('email')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-6 mt-3">
                  <label for="fullname">Password * :</label>
                  <input type="password" id="fullname" class="form-control" name="password" class="@error('password') is-invalid @enderror">
                  @error('password')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-6 mt-3">
                  <label for="fullname">Confirm Password * :</label>
                  <input type="password" id="fullname" class="form-control" name="c-password" class="@error('c-password') is-invalid @enderror">
                  @error('c-password')
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