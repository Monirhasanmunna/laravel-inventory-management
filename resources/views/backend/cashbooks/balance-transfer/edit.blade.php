@extends('app')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12  animation">
        <div class="x_panel">
          <div class="x_title">
            <h2>Update Transfer</h2>

            <div class="text-right">
                <a href="{{route('balance-transfer.index')}}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left mr-2" style="font-size: 17px;"></i>Back</a>
            </div>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form id="demo-form" action="{{route('balance-transfer.update',$transfer->id)}}" method="Post">
              @csrf
              @method('PUT')

              <div class="row">
                <div class="col-12 mb-3">
                  <label for="reasone">Transfer Reason * :</label>
                  <input type="text" id="reasone" class="form-control" value="{{$transfer->transfer_reason ?? old('transfer_reason')}}" name="transfer_reason" class="@error('transfer_reason') is-invalid @enderror">
                  @error('transfer_reason')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-6 mb-3">
                  <label for="from-account">From Account *:</label>
                  <select id="from-account" class="form-control js-example-basic-single" class="@error('from_account_id') is-invalid @enderror" name="from_account_id">
                    @foreach ($accounts as $account)
                        <option {{$transfer->from_account_id == $account->id ? 'selected' : ''}} value="{{$account->id}}">{{$account->bank_name}} {{$account->account_number ? '[ '.$account->account_number.' ]' : ''}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-6 mb-3">
                  <label for="to-account">To Account *:</label>
                  <select id="to-account" class="form-control js-example-basic-single" class="@error('to_account_id') is-invalid @enderror" name="to_account_id">
                    @foreach ($accounts as $account)
                        <option {{$transfer->to_account_id == $account->id ? 'selected' : ''}} value="{{$account->id}}">{{$account->bank_name}} {{$account->account_number ? '[ '.$account->account_number.' ]' : ''}}</option>
                    @endforeach
                  </select>

                  @error('to_account_id')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-6 mb-3">
                  <label for="available-balance">Available Balance :</label>
                  <input type="number" readonly id="available-balance" class="form-control" name="available_balance">
                </div>

                <div class="col-6 mb-3">
                  <label for="ammount">Ammount * :</label>
                  <input type="number" id="ammount" class="form-control" name="ammount" value="{{$transfer->ammount ?? old('ammount')}}" class="@error('ammount') is-invalid @enderror">
                  @error('ammount')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-6 mb-3">
                  <label for="date">Date * :</label>
                  <input type="date" id="date" class="form-control" name="date" value="{{$transfer->date ?? date('Y-m-d') }}" class="@error('date') is-invalid @enderror">
                  @error('date')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-6 mb-3">
                  <label for="heard">Status *:</label>
                  <select id="heard" class="form-control form-control @error('status') is-invalid @enderror" name="status">
                    <option {{$transfer->status == 'active' ? 'selected' : ''}} value="active">Active</option>
                    <option {{$transfer->status == 'inactive' ? 'selected' : ''}} value="inactive">Inactive</option>
                </select>
                </div>

              </div>

              <div class="row mb-3">
                <div class="col-12">
                  <label for="message">Note (100 chars max) :</label>
                    <textarea id="message" class="form-control form-control" name="note" class="@error('note') is-invalid @enderror">{{$transfer->name ?? old('note')}}</textarea>
                    @error('note')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
              </div>

              <input type="hidden" name="type" value="removeBalance">
              <input type="hidden" name="transfer_id" value="{{$transfer->id}}">
              
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

@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  // In your Javascript (external .js resource or <script> tag)
  $(document).ready(function() {
      $('.js-example-basic-single').select2();
  });
</script>


<script>

  let id = $("#from-account").val();
    function getAvailableBalance(id){
      $.ajax({
          url     : `/cashbook/balance/account_info/${id}`,
          type    : 'GET',
          success : (data)=>{
            if(data.total_ammount){
              $("#available-balance").val(data.total_ammount);
            }else{
              $("#available-balance").val(0);
            }
            
          }
        })
    }
  
    getAvailableBalance(id)
  
    $(document).ready(function(){
      $("#from-account").change(function(){
        let id = $(this).val();
        getAvailableBalance(id)
      })
      
    });
  </script>
@endpush