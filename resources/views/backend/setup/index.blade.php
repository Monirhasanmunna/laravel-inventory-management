@extends('app')

@push('css')
    <style>

      .setup-card{
        border: 1px solid #b4b3b3;
        height: 180px;
      }

      .img-left i{
        font-size: 77px;
        margin-left: 36px;
        margin-top: 42px;
        margin-bottom: 19px;
        color: white;
      }

      .img-left{
        background-color: #2A3F54;
        height: 100%;
      }

      .title-right h4{
        font-size: 24px;
      }
      .title-right p{
        font-size: 14px;
      }
      .title-right a{
        font-size: 15px;
        color: #6366F1;
      }
      .title-right i{
        font-size: 11px;
      }
    </style>
@endpush

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 animation">
        <div class="x_panel">
          <div class="x_title">
            <h2>Setup</h2>

            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <div class="row">
              <div class="col-12 col-lg-6 col-xl-4 p-4">
                <div class="row setup-card">
                  <div class="col-4 col-lg-4 pl-0 img-col">
                    <div class="img-left">
                      {{-- <img src="{{asset('backend/image/setup/gear.png')}}" alt=""> --}}
                      <span><i class="fa-solid fa-gear"></i></span>
                    </div>
                  </div>
                  <div class="col-8 col-lg-8">
                    <div class="title-right pt-4">
                      <h4>General</h4>
                      <p>General settings such as, site title, site description, address and so on.</p>
                      <a href="#">Change Setting <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                  </div>

                </div>
              </div>

              <div class="col-12 col-lg-6 col-xl-4 p-4">
                <div class="row setup-card">
                  <div class="col-4 col-lg-4 pl-0 ">
                    <div class="img-left">
                      {{-- <img src="{{asset('backend/image/setup/gear.png')}}" alt=""> --}}
                      <span><i class="fa-solid fa-money-check-dollar"></i></span>
                    </div>
                  </div>
                  <div class="col-8 col-lg-8">
                    <div class="title-right pt-4">
                      <h4>Currencies</h4>
                      <p>Manage various types of currencies that you are going to use in the system.</p>
                      <a href="{{route('setup.currency.index')}}">Currencies <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                  </div>

                </div>
              </div>

              <div class="col-12 col-lg-6 col-xl-4 p-4">
                <div class="row setup-card">
                  <div class="col-4 col-lg-4 pl-0">
                    <div class="img-left">
                      {{-- <img src="{{asset('backend/image/setup/gear.png')}}" alt=""> --}}
                      <span><i class="fa-solid fa-scale-balanced"></i></span>
                    </div>
                  </div>
                  <div class="col-8 col-lg-8">
                    <div class="title-right pt-4">
                      <h4>Units</h4>
                      <p>Manage unit types for measurement that you're going to use in the system.</p>
                      <a href="{{route('setup.unit.index')}}">Units <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                  </div>

                </div>
              </div>

              <div class="col-12 col-lg-6 col-xl-4 p-4">
                <div class="row setup-card">
                  <div class="col-4 col-lg-4 pl-0">
                    <div class="img-left">
                      {{-- <img src="{{asset('backend/image/setup/gear.png')}}" alt=""> --}}
                      <span><i class="fa-solid fa-percent"></i></span>
                    </div>
                  </div>
                  <div class="col-8 col-lg-8">
                    <div class="title-right pt-4">
                      <h4>VAT Rates</h4>
                      <p>Manage VAT rates for VAT management that you're going to use in the system.</p>
                      <a href="{{route('setup.vat.index')}}">VAT Rates <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                  </div>

                </div>
              </div>

              <div class="col-12 col-lg-6 col-xl-4 p-4">
                <div class="row setup-card">
                  <div class="col-4 col-lg-4 pl-0">
                    <div class="img-left">
                      {{-- <img src="{{asset('backend/image/setup/gear.png')}}" alt=""> --}}
                      <span><i class="fa-solid fa-b"></i></span>
                    </div>
                  </div>
                  <div class="col-8 col-lg-8">
                    <div class="title-right pt-4">
                      <h4>Brands</h4>
                      <p>Manage brands that you're going to use in the system.</p>
                      <a href="{{route('setup.brand.index')}}">Brands <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                  </div>

                </div>
              </div>

              <div class="col-12 col-lg-6 col-xl-4 p-4">
                <div class="row setup-card">
                  <div class="col-4 col-lg-4 pl-0">
                    <div class="img-left">
                      {{-- <img src="{{asset('backend/image/setup/gear.png')}}" alt=""> --}}
                      <span><i class="fa-solid fa-wallet"></i></span>
                    </div>
                  </div>
                  <div class="col-8 col-lg-8">
                    <div class="title-right pt-4">
                      <h4>Payment Methods</h4>
                      <p>Manage payment methods that you're going to use in the system.</p>
                      <a href="#">Payment Methods <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
</div>
@endsection

<script>
 
</script>