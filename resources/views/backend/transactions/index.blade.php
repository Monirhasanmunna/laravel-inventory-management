@extends('app')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 animation">
        <div class="x_panel">
          <div class="x_title">
            <h2>Transaction List</h2>

            {{-- <div class="text-right">
                <a href="{{route('purchase.create')}}" class="btn btn-success"><i class="fa-solid fa-square-plus mr-2" style="font-size: 18px"></i>Add New</a>
            </div> --}}
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action table-bordered" id="datatable">
                <thead>
                  <tr class="headings">
                    <th class="column-title text-center" width='5%'>SL </th>
                    <th class="column-title">Reason</th>
                    <th class="column-title">Date</th>
                    <th class="column-title">Type</th>
                    <th class="column-title">Account</th>
                    <th class="column-title">Ammount</th>
                    {{-- <th class="column-title no-link last text-center" width='7%'><span class="nobr">Action</span></th> --}}
                  </tr>
                </thead>

                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{$transaction->reason}}</td>
                            <td>{{$transaction->date}}</td>
                            <td>
                                @if ($transaction->type == 'debit')
                                    <span class="badge badge-danger" style="font-size: 11px">Debit</span>
                                @else
                                    <span class="badge badge-primary" style="font-size: 11px">Credit</span>
                                @endif
                            </td>
                            <td>{{$transaction->source->account->bank_name}}</td>
                            <td>Tk.{{$transaction->ammount}}</td>
                            {{-- <td class="text-center">
                                <a href="{{route('purchase.edit',$purchase->id)}}" class="btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="javascript:void(0)" onclick="deleteItem({{$purchase->id}})" class="btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>--}}
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
  
</script>