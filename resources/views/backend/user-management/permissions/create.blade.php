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
            <h2>Add Permission<small>add a permission</small></h2>

            <div class="text-right">
                <a href="{{route('userManagement.permission.index')}}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left mr-2" style="font-size: 17px;"></i>Back</a>
            </div>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form id="demo-form" action="{{route('userManagement.permission.store')}}" method="Post">
              @csrf
              <div class="row mb-3">
                <div class="col-6">
                  <label for="fullname">Permission Name * :</label>
                  <input type="text" id="fullname" class="form-control" name="name" class="@error('name') is-invalid @enderror">
                  @error('name')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-6">
                  <label for="heard">Group Name *:</label>
                  <select id="heard" class="form-control form-control @error('status') is-invalid @enderror" name="group_name">
                    <option value="dashboard">Dashboard</option>
                    <option value="user_management">User Management</option>
                    <option value="expenses">Expenses</option>
                    <option value="purchase">Purchases</option>
                    <option value="sales">Sales</option>
                    <option value="products">Products</option>
                    <option value="inventory">Inventory</option>
                  </select>
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