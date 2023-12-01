@extends('app')
@section('content')
<div class="row">
{{-- page title section --}}
    <div class="col-12">
        <div class="d-flex justify-content-between">
            <div class="left-content">
                <h2 class="">Dashboard</h2>
            </div>
            <div class="right-content">
                
            </div>
        </div>
    </div>
{{-- page title section --}}


    <div class="col-12 animation">
        <div class="card">
            <div class="d-flex justify-content-between mt-2 mx-3">
                <div class="left-item">
                    <h2><i class="fa-solid fa-chart-pie"></i><span class="pl-1">Today Summary</span></h2>
                </div>
                <div class="right-item">
                    <select class="form-control" name="" id="">
                        <option value="">Today</option>
                        <option value="">Last 7 day</option>
                        <option value="">This Month</option>
                        <option value="">This Year</option>
                    </select>
                </div>
            </div>

            <hr>

            <div class="row mx-2 mb-3">
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                    <div class="p-2 px-3 bg-primary text-white d-flex justify-content-between">
                        <div class="">
                            <h2 class="dashboard-card-ammount">Tk 10000</h2>
                            <h2 class="dashboard-card-title">Purchase</h2>
                        </div>
                        <div class="dashboard-card-icon" style="color:#005bbd;">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                    </div>
                    <div class="p-1 text-center text-white" style="background-color:#005bbd;">
                        <h6 class="mb-0"><a class="text-white" href="{{route('purchase.index')}}">More info <i class="fa-solid fa-arrow-right"></i></a></h6>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                    <div class="p-2 px-3 bg-info text-white d-flex justify-content-between">
                        <div class="">
                            <h2 class="dashboard-card-ammount">Tk 1000</h2>
                            <h2 class="dashboard-card-title">Purchase return</h2>
                        </div>
                        <div class="dashboard-card-icon" style="color:#008297;">
                            <i class="fa-solid fa-forward"></i>
                        </div>
                    </div>
                    <div class="p-1 text-center text-white" style="background-color:#008297;">
                        <h6 class="mb-0"><a class="text-white" href="{{route('purchase.index')}}">More info <i class="fa-solid fa-arrow-right"></i></a></h6>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                    <div class="p-2 px-3 bg-success text-white d-flex justify-content-between">
                        <div class="">
                            <h2 class="dashboard-card-ammount">Tk 50000</h2>
                            <h2 class="dashboard-card-title">Sales</h2>
                        </div>
                        <div class="dashboard-card-icon" style="color:#00871f;">
                            <i class="fa-solid fa-bag-shopping"></i>
                        </div>
                    </div>
                    <div class="p-1 text-center text-white" style="background-color:#00871f;">
                        <h6 class="mb-0"><a class="text-white" href="{{route('purchase.index')}}">More info <i class="fa-solid fa-arrow-right"></i></a></h6>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                    <div class="p-2 px-3 bg-secondary text-white d-flex justify-content-between">
                        <div class="">
                            <h2 class="dashboard-card-ammount">Tk 5000</h2>
                            <h2 class="dashboard-card-title">Sales Return</h2>
                        </div>
                        <div class="dashboard-card-icon" style="color:#505960;">
                            <i class="fa-solid fa-backward"></i>
                        </div>
                    </div>
                    <div class="p-1 text-center text-white" style="background-color:#505960;">
                        <h6 class="mb-0"><a class="text-white" href="{{route('purchase.index')}}">More info <i class="fa-solid fa-arrow-right"></i></a></h6>
                    </div>
                </div>

                {{-- second row start --}}

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                    <div class="p-2 px-3 text-white d-flex justify-content-between" style="background-color: #3D9970">
                        <div class="">
                            <h2 class="dashboard-card-ammount">Tk 5000</h2>
                            <h2 class="dashboard-card-title">Client Payment</h2>
                        </div>
                        <div class="dashboard-card-icon" style="color:#327256;">
                            <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        </div>
                    </div>
                    <div class="p-1 text-center text-white" style="background-color:#327256;">
                        <h6 class="mb-0"><a class="text-white" href="{{route('purchase.index')}}">More info <i class="fa-solid fa-arrow-right"></i></a></h6>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                    <div class="p-2 px-3 text-white d-flex justify-content-between" style="background-color: #6610F2">
                        <div class="">
                            <h2 class="dashboard-card-ammount">Tk 5000</h2>
                            <h2 class="dashboard-card-title">Supplier Payment</h2>
                        </div>
                        <div class="dashboard-card-icon" style="color:#4c12ab;">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        </div>
                    </div>
                    <div class="p-1 text-center text-white" style="background-color:#4c12ab;">
                        <h6 class="mb-0"><a class="text-white" href="{{route('purchase.index')}}">More info <i class="fa-solid fa-arrow-right"></i></a></h6>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                    <div class="p-2 px-3 text-white d-flex justify-content-between" style="background-color: #DC3545">
                        <div class="">
                            <h2 class="dashboard-card-ammount">Tk 5000</h2>
                            <h2 class="dashboard-card-title">Sales Return</h2>
                        </div>
                        <div class="dashboard-card-icon" style="color:#bf0617;">
                            <i class="fa-solid fa-calculator"></i>
                        </div>
                    </div>
                    <div class="p-1 text-center text-white" style="background-color:#bf0617;">
                        <h6 class="mb-0"><a class="text-white" href="{{route('purchase.index')}}">More info <i class="fa-solid fa-arrow-right"></i></a></h6>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                    <div class="p-2 px-3 text-white d-flex justify-content-between" style="background-color: #001F3F">
                        <div class="">
                            <h2 class="dashboard-card-ammount">Tk 5000</h2>
                            <h2 class="dashboard-card-title">Balance Transfers</h2>
                        </div>
                        <div class="dashboard-card-icon" style="color:#001224;">
                            <i class="fa-solid fa-arrow-right-arrow-left"></i>
                        </div>
                    </div>
                    <div class="p-1 text-center text-white" style="background-color:#001224;">
                        <h6 class="mb-0"><a class="text-white" href="{{route('purchase.index')}}">More info <i class="fa-solid fa-arrow-right"></i></a></h6>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection

@push('js')

@endpush
