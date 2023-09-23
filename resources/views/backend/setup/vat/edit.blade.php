@extends('app')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12  animation">
        <div class="x_panel">
          <div class="x_title">
            <h2>Edit Vat<small>edit a vat</small></h2>

            <div class="text-right">
                <a href="{{route('setup.vat.index')}}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left mr-2" style="font-size: 17px;"></i>Back</a>
            </div>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form id="demo-form" action="{{route('setup.vat.update',$vat->id)}}" method="Post">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-6 mb-3">
                  <label for="name">Name * :</label>
                  <input type="text" id="name" class="form-control" value="{{$vat->name ?? ''}}" name="name" class="@error('name') is-invalid @enderror">
                  @error('name')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-6 mb-3">
                  <label for="code">Code * :</label>
                  <input type="text" id="code" class="form-control" value="{{$vat->code ?? ''}}" name="code" class="@error('code') is-invalid @enderror">
                  @error('code')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-6">
                  <label for="rate">Rate * :</label>
                  <input type="number" id="rate" class="form-control" value="{{$vat->rate ?? ''}}" name="rate" class="@error('rate') is-invalid @enderror">
                  @error('rate')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-6">
                    <label for="heard">Status *:</label>
                    <select id="heard" class="form-control form-control @error('status') is-invalid @enderror" name="status">
                      <option {{$vat->status == 'active' ? 'selected' : ''}} value="active">Active</option>
                      <option {{$vat->status == 'inactive' ? 'selected' : ''}} value="inactive">Inactive</option>
                  </select>
                </div>
              </div>

              <div class="row mt-4">
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