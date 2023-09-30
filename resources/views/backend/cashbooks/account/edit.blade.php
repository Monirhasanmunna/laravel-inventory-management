@extends('app')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12  animation">
        <div class="x_panel">
          <div class="x_title">
            <h2>Edit Accounts<small>edit a account</small></h2>

            <div class="text-right">
                <a href="{{route('accounts.index')}}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left mr-2" style="font-size: 17px;"></i>Back</a>
            </div>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form id="demo-form" action="{{route('accounts.update', $account->id)}}" method="Post">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-12 mb-3">
                  <label for="name">Bank Name * :</label>
                  <input type="text" id="name" value="{{$account->bank_name ?? ''}}" class="form-control" name="bank_name" class="@error('bank_name') is-invalid @enderror">
                  @error('bank_name')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-6 mb-3">
                  <label for="branch">Branch Name * :</label>
                  <input type="text" id="branch" value="{{$account->branch_name ?? ''}}" class="form-control" name="branch_name" class="@error('branch_name') is-invalid @enderror">
                  @error('branch_name')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-6 mb-3">
                  <label for="account_number">Account Number * :</label>
                  <input type="number" id="account_number" value="{{$account->account_number ?? ''}}" class="form-control" name="account_number" class="@error('account_number') is-invalid @enderror">
                  @error('account_number')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-6 mb-3">
                  <label for="date">Date * :</label>
                  <input type="date" id="date" class="form-control" name="date" value="{{ $account->date ?? date('Y-m-d') }}" class="@error('date') is-invalid @enderror">
                  @error('date')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-6 mb-3">
                  <label for="heard">Status *:</label>
                  <select id="heard" class="form-control form-control @error('status') is-invalid @enderror" name="status">
                    <option {{$account->status == 'active' ? 'selected' : ''}} value="active">Active</option>
                    <option {{$account->status == 'inactive' ? 'selected' : ''}} value="inactive">Inactive</option>
                </select>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-12">
                  <label for="message">Note (100 chars max) :</label>
                    <textarea id="message" class="form-control form-control" name="note" class="@error('note') is-invalid @enderror">{{$account->note ?? ''}}</textarea>
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