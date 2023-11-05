@extends('app')

@section('content')
{{-- <div class="page-title">
    <div class="title_left">
      <h3>Category</h3>
    </div>
</div>

<div class="clearfix"></div> --}}

<div class="row">
    <div class="col-md-12 col-sm-12 animation">
        <div class="x_panel">
          <div class="x_title">
            <h2>Expense List</h2>

            <div class="text-right">
                <a href="{{route('expense.expenses.create')}}" class="btn btn-success"><i class="fa-solid fa-square-plus mr-2" style="font-size: 18px"></i>Add New</a>
            </div>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action table-bordered" id="datatable">
                <thead>
                  <tr class="headings">
                    <th class="column-title text-center" width='5%'>SL </th>
                    <th class="column-title">Reason</th>
                    <th class="column-title">Category</th>
                    <th class="column-title">Sub Category</th>
                    <th class="column-title">Ammount</th>
                    <th class="column-title">Account</th>
                    <th class="column-title">Date</th>
                    <th class="column-title">Status</th>
                    <th class="column-title no-link last text-center" width='7%'><span class="nobr">Action</span></th>
                  </tr>
                </thead>

                <tbody>
                    @foreach ($expenses as $expense)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{$expense->reason}}</td>
                            <td>{{$expense->category->name}}</td>
                            <td>{{$expense->subCategory->name}}</td>
                            <td>{{$expense->ammount}}</td>
                            <td>{{$expense->account->bank_name}}</td>
                            <td>{{$expense->date}}</td>
                            <td>
                                @if ($expense->status == 'active')
                                    <span class="badge badge-primary" style="font-size: 11px">Active</span>
                                @else
                                    <span class="badge badge-danger" style="font-size: 11px">Inactive</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{route('expense.expenses.edit',$expense->id)}}" class="btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="javascript:void(0)" onclick="deleteItem({{$expense->id}})" class="btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>

                            <form action="{{route('expense.expenses.destroy',$expense->id)}}" method="POST" class="d-none deleteForm-{{$expense->id}}">
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