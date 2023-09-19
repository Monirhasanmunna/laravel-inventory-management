@extends('app')

@push('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12  animation">
        <div class="x_panel">
          <div class="x_title">
            <h2>
              @if (!isset($user))
                Add User<small>add a user</small>
                @else
                Edit User<small>edit a user</small>
              @endif
            </h2>

            <div class="text-right">
                <a href="{{route('userManagement.user.index')}}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left mr-2" style="font-size: 17px;"></i>Back</a>
            </div>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form id="demo-form" action="{{!@$user ? route('userManagement.user.store') : route('userManagement.user.update',$user->id)}}" method="Post" enctype="multipart/form-data">
              @csrf
              @if (isset($user))
                  @method('PUT')
              @endif
              <div class="row mb-3">

                <div class="col-4">
                    <label for="heard">Roles Name *:</label>
                    <select id="heard" class="form-control form-control @error('role') is-invalid @enderror" name="role">
                      @foreach ($roles as $role)
                          <option value="{{$role->id}}"
                            @if (isset($user))
                                {{$user->roles[0]->id == $role->id ? 'selected' : ''}}
                            @endif 
                            >{{$role->name}}</option>
                      @endforeach
                    </select>
                </div>


                <div class="col-4 ">
                  <label for="fullname">User Name * :</label>
                  <input type="text" id="fullname" class="form-control" name="name" value="{{$user->name ?? ''}}" class="@error('name') is-invalid @enderror">
                  @error('name')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-4">
                  <label for="fullname">Email * :</label>
                  <input type="email" id="fullname" class="form-control" value="{{$user->email ?? ''}}" name="email" class="@error('email') is-invalid @enderror">
                  @error('email')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-4 mt-3">
                  <label for="fullname">Password * :</label>
                  <input type="password" id="fullname" class="form-control" name="password" class="@error('password') is-invalid @enderror">
                  @error('password')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-4 mt-3">
                  <label for="fullname">Confirm Password * :</label>
                  <input type="password" id="fullname" class="form-control" name="c-password" class="@error('c-password') is-invalid @enderror">
                  @error('c-password')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>


                <div class="col-4 mt-3">
                  <label for="fullname">Avatar :</label>
                  <input class="form-control dropify" id="avatar" data-default-file="{{isset($user) ? asset($user->avatar) : ''}}" name="avatar" type="file"
                  class="@error('avatar') is-invalid @enderror">
  
                  @error('avatar')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-4">
                  <button class="btn btn-primary" type="submit" ><i class="fa-solid fa-circle-plus"></i> Submit</button>
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