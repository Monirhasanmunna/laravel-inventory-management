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
            <h2>Edit a Adjustment</h2>

            <div class="text-right">
                <a href="{{route('balance.index')}}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left mr-2" style="font-size: 17px;"></i>Back</a>
            </div>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form id="demo-form" action="{{route('balance.update',$adjustment->id)}}" method="Post">
              @csrf
              @method('PUT')
              <div class="row">

                <div class="col-6 mb-3">
                  <label for="account">Account *:</label>
                  <select id="account_id" class="form-control js-example-basic-single" name="account_id">
                    @foreach ($accounts as $account)
                    <option {{$adjustment->Account->id == $account->id ? 'selected' : ''}} value="{{$account->id}}">{{$account->bank_name}} {{$account->account_number ? '[ '.$account->account_number.' ]' : ''}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-6 mb-3">
                  <label for="heard">Type *:</label>
                  <select id="heard" class="form-control @error('status') is-invalid @enderror" name="type">
                    <option {{$adjustment->type == 'addBalance' ? 'selected' : ''}} value="addBalance">Add Balance</option>
                    <option {{$adjustment->type == 'removeBalance' ? 'selected' : ''}} value="removeBalance">Remove Balance</option>
                  </select>
                </div>

                <div class="col-6 mb-3">
                  <label for="availabe-balace">Availabe Balance * :</label>
                  <input type="number" readonly id="availabe-balace" name="available_balance" value="{{$adjustment->available_balance ?? ''}}" class="form-control">
                </div>

                <div class="col-6 mb-3">
                  <label for="ammount">Ammount * :</label>
                  <input type="number" id="ammount" class="form-control" value="{{$adjustment->ammount ?? ''}}"  name="ammount" class="@error('ammount') is-invalid @enderror">
                  @error('ammount')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-6 mb-3">
                  <label for="date">Date * :</label>
                  <input type="date" id="date" class="form-control" name="date" value="{{$adjustment->date ?? date('Y-m-d') }}" class="@error('date') is-invalid @enderror">
                  @error('date')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-6 mb-3">
                  <label for="heard">Status *:</label>
                  <select id="heard" class="form-control @error('status') is-invalid @enderror" name="status">
                    <option {{$adjustment->status == 'active' ? 'selected' : ''}} value="active">Active</option>
                    <option {{$adjustment->status == 'inactive' ? 'selected' : ''}} value="inactive">Inactive</option>
                </select>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-12">
                  <label for="message">Note (100 chars max) :</label>
                    <textarea id="message" class="form-control form-control" name="note" class="@error('note') is-invalid @enderror">{{$adjustment->note ?? ''}}</textarea>
                    @error('note')
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

@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  // In your Javascript (external .js resource or <script> tag)
  $(document).ready(function() {
      $('.js-example-basic-single').select2();
  });
</script>


<script>

let id = $("#account_id").val();
  function getAvailableBalance(id){
    $.ajax({
        url     : `/cashbook/balance/account_info/${id}`,
        type    : 'GET',
        success : (data)=>{
          if(data.total_ammount){
            $("#availabe-balace").val(data.total_ammount);
          }else{
            $("#availabe-balace").val(0);
          }
          
        }
      })
  }

  getAvailableBalance(id)

  $(document).ready(function(){
    $("#account_id").change(function(){
      let id = $(this).val();
      getAvailableBalance(id)
    })
    
  });
</script>
@endpush