@extends('app')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 animation">
        <div class="x_panel">
          <div class="x_title">
            <h2>Roles List <small>All roles list here</small></h2>

            <div class="text-right">
                <a href="{{route('userManagement.role.create')}}" class="btn btn-success"><i class="fa-solid fa-square-plus mr-2" style="font-size: 18px"></i>Add New</a>
            </div>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action table-bordered" id="datatable">
                <thead>
                  <tr class="headings">
                    <th class="column-title text-center" width='5%'>SL </th>
                    <th class="column-title">Name</th>
                    <th class="column-title">Permission</th>
                    <th class="column-title no-link last text-center" width='10%'><span class="nobr">Action</span></th>
                  </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{$role->name}}</td>
                            <td><span class="badge badge-info">{{$role->permissions->count()}}</span></td>
                            <td class="text-center">
                                <a href="{{route('userManagement.role.permission.create',$role->id)}}" class="btn-sm btn-info"><i class="fa-solid fa-gears"></i></a>
                                <a href="{{route('userManagement.role.edit',$role->id)}}" class="btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="javascript:void(0)" onclick="deleteItem({{$role->id}})" class="btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>

                            <form action="{{route('userManagement.role.destroy',$role->id)}}" method="POST" class="d-none deleteForm-{{$role->id}}">
                              @method('PUT')
                              @csrf
                            </form>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection

<script>
  function deleteItem(id){
      Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
      if (result.isConfirmed) {
          Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
          )

          $(".deleteForm-"+id).submit();
      }
      });
      
  }
</script>