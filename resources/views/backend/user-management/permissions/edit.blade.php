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
            <h2>Edit Permission<small>Edit a permission</small></h2>

            <div class="text-right">
                <a href="{{route('userManagement.permission.index')}}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left mr-2" style="font-size: 17px;"></i>Back</a>
            </div>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form id="demo-form" action="{{route('userManagement.permission.update',$permission->id)}}" method="Post">
              @method('PUT')
              @csrf
              <div class="row mb-3">
                <div class="col-6">
                  <label for="fullname">Name * :</label>
                  <input type="text" id="fullname" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$permission->name ?? ''}}">
                </div>

                <div class="col-6">
                  <label for="heard">Group Name *:</label>
                  <select id="heard" class="form-control form-control @error('status') is-invalid @enderror" name="group_name">
                    <option {{$permission->group_name == 'dashboard' ? 'selected' : ''}} value="dashboard">Dashboard</option>
                    <option {{$permission->group_name == 'user_management' ? 'selected' : ''}} value="user_management">User Management</option>
                    <option {{$permission->group_name == 'expenses' ? 'selected' : ''}} value="expenses">Expenses</option>
                    <option {{$permission->group_name == 'purchase' ? 'selected' : ''}} value="purchase">Purchases</option>
                    <option {{$permission->group_name == 'sales' ? 'selected' : ''}} value="sales">Sales</option>
                    <option {{$permission->group_name == 'products' ? 'selected' : ''}} value="products">Products</option>
                    <option {{$permission->group_name == 'inventory' ? 'selected' : ''}} value="inventory">Inventory</option>
                  </select>
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

