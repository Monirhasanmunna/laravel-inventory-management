@extends('app')
@push('css')
    <style>
      .no-preview{
        width: 70px;
        height: 70px;
        border-radius: 5px;
        background-color: #a4a4a4;
        padding-top: 28px;
      }

      .no-preview small{
        font-size: 11px;
      }
    </style>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 animation">
        <div class="x_panel">
          <div class="x_title">
            <h2>Product List <small>All product list show here</small></h2>

            <div class="text-right">
                <a href="{{route('product.create')}}" class="btn btn-success"><i class="fa-solid fa-square-plus mr-2" style="font-size: 18px"></i>Add New</a>
            </div>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action table-bordered" id="datatable">
                <thead>
                  <tr class="headings">
                    <th class="column-title text-center" width='5%'>SL </th>
                    <th class="column-title text-center" width='7%'>Image</th>
                    <th class="column-title">Name</th>
                    <th class="column-title">Code</th>
                    <th class="column-title">Category</th>
                    <th class="column-title">Model</th>
                    <th class="column-title">Unit</th>
                    <th class="column-title">Selling Price</th>
                    <th class="column-title">Status</th>
                    <th class="column-title no-link last text-center" width='7%'><span class="nobr">Action</span></th>
                  </tr>
                </thead>

                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            @if (isset($product->image))
                              <td><img style="height: 70px;width:70px;border-radius:5px;" src="{{asset($product->image)}}" alt="{{$product->image}}"></td>
                            @else
                              <td>
                                <div class="no-preview text-center">
                                  <small>No Preview</small>
                                </div>
                              </td>
                            @endif
                            <td>{{$product->name}}</td>
                            <td>{{$product->item_code}}</td>
                            <td>{{$product->subCategory->category->name}}</td>
                            <td>{{$product->model}}</td>
                            <td>{{$product->unit->code}}</td>
                            <td>{{$product->selling_price}}</td>
                            <td>
                                @if ($product->status == 'active')
                                    <span class="badge badge-primary" style="font-size: 11px">Active</span>
                                @else
                                    <span class="badge badge-danger" style="font-size: 11px">Inactive</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{route('product.edit',$product->id)}}" class="btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="javascript:void(0)" onclick="deleteItem({{$product->id}})" class="btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>

                            <form action="{{route('product.destroy',$product->id)}}" method="POST" class="d-none deleteForm-{{$product->id}}">
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