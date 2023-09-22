@extends('app')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12  animation">
        <div class="x_panel">
          <div class="x_title">
            <h2>Edit Currency<small>edit a currency</small></h2>

            <div class="text-right">
                <a href="{{route('setup.currency.index')}}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left mr-2" style="font-size: 17px;"></i>Back</a>
            </div>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form id="demo-form" action="{{route('setup.currency.update',$currency->id)}}" method="Post">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-6 mb-3">
                  <label for="name">Name * :</label>
                  <input type="text" id="name" class="form-control" value="{{$currency->name ?? ''}}" name="name" class="@error('name') is-invalid @enderror">
                  @error('name')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-6 mb-3">
                  <label for="code">Code * :</label>
                  <input type="text" id="code" class="form-control" value="{{$currency->code ?? ''}}" name="code" class="@error('code') is-invalid @enderror">
                  @error('code')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-6">
                  <label for="symbol">Symbol * :</label>
                  <input type="text" id="symbol" class="form-control" name="symbol" value="{{$currency->symbol ?? ''}}" class="@error('symbol') is-invalid @enderror">
                  @error('symbol')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-6">
                    <label for="heard">Status *:</label>
                    <select id="heard" class="form-control form-control @error('status') is-invalid @enderror" name="status">
                      <option {{$currency->status == 'active' ? 'selected' : ''}} value="active">Active</option>
                      <option {{$currency->status == 'inactive' ? 'selected' : ''}} value="inactive">Inactive</option>
                  </select>
                </div>

              </div>

              <div class="row my-3">
                <div class="col-12">
                  <label for="message">Note (100 chars max) :</label>
                    <textarea id="message" class="form-control form-control" name="note" class="@error('note') is-invalid @enderror">{{$currency->note ?? ''}}</textarea>
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