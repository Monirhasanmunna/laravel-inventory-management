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
            <h2>Create an expense</h2>

            <div class="text-right">
                <a href="{{route('expense.expenses.index')}}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left mr-2" style="font-size: 17px;"></i>Back</a>
            </div>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form id="demo-form" action="{{route('expense.expenses.store')}}" method="POST">
              @csrf
              <div class="row">
                <div class="col-12 mb-3">
                  <label for="reason">Expense Reason * :</label>
                  <input type="text" id="reason" class="form-control" name="reason" class="@error('reason') is-invalid @enderror">
                  @error('reason')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-6">
                    <label for="category_id">Category *:</label>
                    <select id="category_id" class="form-control form-control @error('category_id') is-invalid @enderror" name="category_id">
                      <option selected>Select Once</option>
                      @foreach ($categories as $category)
                          <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                  </select>
                </div>

                <div class="col-6">
                    <label for="sub_category_id">Sub Category *:</label>
                    <select id="sub_category_id" disabled class="form-control form-control @error('sub_category_id') is-invalid @enderror" name="sub_category_id">
                      {{-- comes from ajax --}}
                  </select>
                </div>

                <div class="col-6 mt-3">
                    <label for="account_id">Account *:</label>
                    <select id="account_id" class="form-control form-control @error('account_id') is-invalid @enderror" name="account_id">
                      <option selected>Select Once</option>
                      @foreach ($accounts as $account)
                          <option value="{{$account->id}}">{{$account->bank_name}}</option>
                      @endforeach
                  </select>
                </div>

                <div class="col-6 mt-3">
                  <label for="available_balance">Available Balance * :</label>
                  <input type="number" readonly id="available_balance" class="form-control" name="available_balance" class="@error('available_balance') is-invalid @enderror">
                  @error('available_balance')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-4 mt-3">
                  <label for="ammount">Ammount * :</label>
                  <input type="number" id="ammount" class="form-control" name="ammount" class="@error('ammount') is-invalid @enderror">
                  @error('ammount')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-4 mt-3">
                  <label for="check_no">check_no * :</label>
                  <input type="number" id="check_no" class="form-control" name="check_no" class="@error('check_no') is-invalid @enderror">
                  @error('check_no')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-4 mt-3">
                  <label for="voucher_no">voucher_no * :</label>
                  <input type="text" id="voucher_no" class="form-control" name="voucher_no" class="@error('voucher_no') is-invalid @enderror">
                  @error('voucher_no')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-12 mt-3">
                  <label for="message">Note (100 chars max) :</label>
                    <textarea id="message" class="form-control form-control" name="note" class="@error('note') is-invalid @enderror"></textarea>
                    @error('note')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-6 mt-3">
                  <label for="date">date * :</label>
                  <input type="date" id="date" class="form-control" value="{{date('Y-m-d')}}" name="date" class="@error('date') is-invalid @enderror">
                  @error('date')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-6 mt-3">
                    <label for="heard">Status *:</label>
                    <select id="heard" class="form-control form-control @error('status') is-invalid @enderror" name="status">
                      <option value="active">Active</option>
                      <option value="inactive">Inactive</option>
                  </select>
                </div>

              </div>

              <div class="row mt-3">
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
    <script>
      $(document).ready(function(){
        $("#category_id").change(function(){
          $("#sub_category_id").empty();
          $("#sub_category_id").attr('disabled', 'disabled');

          let id = $(this).val();
          $.ajax({
            url : `/expense/expenses/sub_category_by_category_id/${id}`,
            tupe : "GET",
            success :(response)=>{
              if(response.length > 0){
                $.each(response,function(i,v){
                  $("#sub_category_id").append(`<option value='${v.id}'>${v.name}</option>`);
                });

                $("#sub_category_id").removeAttr('disabled');
              }
            }
          })
        });


        // check available balance
        $("#account_id").change(function(){
            let id = $(this).val();
            $.ajax({
              url     : `/cashbook/balance/account_info/${id}`,
              type    : 'GET',
              success : (data)=>{
                if(data.total_ammount){
                  $("#available_balance").val(data.total_ammount);
                }else{
                  $("#available_balance").val(0);
                }
                
              }
            })
        });
      });
    </script>
@endpush