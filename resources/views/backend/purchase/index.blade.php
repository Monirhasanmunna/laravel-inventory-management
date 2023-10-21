@extends('app')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 animation">
        <div class="x_panel">
          <div class="x_title">
            <h2>Purchases List</h2>

            <div class="text-right">
                <a href="{{route('purchase.create')}}" class="btn btn-success"><i class="fa-solid fa-square-plus mr-2" style="font-size: 18px"></i>Add New</a>
            </div>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action table-bordered" id="datatable">
                <thead>
                  <tr class="headings">
                    <th class="column-title text-center" width='5%'>SL </th>
                    <th class="column-title">PO Reference</th>
                    <th class="column-title">Date</th>
                    <th class="column-title">Supplier</th>
                    <th class="column-title">Subtotal</th>
                    <th class="column-title">Tax</th>
                    <th class="column-title">Discount</th>
                    <th class="column-title">Transport</th>
                    <th class="column-title">Net Total</th>
                    <th class="column-title">Total Paid</th>
                    <th class="column-title">Total Due</th>
                    <th class="column-title">Status</th>
                    <th class="column-title no-link last text-center" width='7%'><span class="nobr">Action</span></th>
                  </tr>
                </thead>

                <tbody>
                    @foreach ($purchases as $purchase)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{$purchase->po_reference}}</td>
                            <td>{{$purchase->purchase_date}}</td>
                            <td>{{$purchase->supplier->name}}</td>
                            <td>Tk.{{$purchase->sub_total}}</td>
                            <td>Tk.{{$purchase->total_tax}}</td>
                            <td>{{$purchase->discount ?? 0}}%</td>
                            <td>Tk.{{$purchase->transport_cost ?? 0}}</td>
                            <td>Tk.{{$purchase->net_total}}</td>
                            <td>Tk.{{$purchase->total_paid ?? 0}}</td>
                            <td>Tk.{{$purchase->due_ammount ?? 0}}</td>
                            <td>
                                @if ($purchase->status == 'active')
                                    <span class="badge badge-primary" style="font-size: 11px">Active</span>
                                @else
                                    <span class="badge badge-danger" style="font-size: 11px">Inactive</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{route('purchase.edit',$purchase->id)}}" class="btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="javascript:void(0)" onclick="deleteItem({{$purchase->id}})" class="btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>

                            <form action="{{route('purchase.destroy',$purchase->id)}}" method="POST" class="d-none deleteForm-{{$purchase->id}}">
                              @method('PUT')
                              @csrf
                            </form>
                        </tr>
                    @endforeach
                </tbody>
              </table>

              {{-- {{$purchase->products}} --}}
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