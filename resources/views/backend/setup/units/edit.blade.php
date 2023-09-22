@extends('app')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12  animation">
        <div class="x_panel">
          <div class="x_title">
            <h2>Edit Units<small>edit a unit</small></h2>

            <div class="text-right">
                <a href="{{route('setup.unit.index')}}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left mr-2" style="font-size: 17px;"></i>Back</a>
            </div>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form id="demo-form" action="{{route('setup.unit.update',$unit->id)}}" method="Post">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-12 mb-3">
                  <label for="name">Name * :</label>
                  <input type="text" id="name" class="form-control" name="name" value="{{$unit->name ?? ''}}" class="@error('name') is-invalid @enderror">
                  @error('name')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-6">
                  <label for="code">Code * :</label>
                  <input type="text" id="code" class="form-control" value="{{$unit->code ?? ''}}" name="code" class="@error('code') is-invalid @enderror">
                  @error('code')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-6">
                    <label for="heard">Status *:</label>
                    <select id="heard" class="form-control form-control @error('status') is-invalid @enderror" name="status">
                      <option {{$unit->status == 'active' ? 'selected' : ''}} value="active">Active</option>
                      <option {{$unit->status == 'inactive' ? 'selected' : ''}} value="inactive">Inactive</option>
                  </select>
                </div>

              </div>

              <div class="row my-3">
                <div class="col-12">
                  <label for="message">Note (100 chars max) :</label>
                    <textarea id="message" class="form-control form-control" name="note" class="@error('note') is-invalid @enderror">{{$unit->note ?? ''}}</textarea>
                    @error('note')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
              </div>
              
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