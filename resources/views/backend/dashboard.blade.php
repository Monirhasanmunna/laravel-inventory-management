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

{{-- report card setion --}}
    <div class="col-12 animation">
        <div class="card">
            <div class="card-header py-2">
                <div class="d-flex justify-content-between">
                    <div class="left-item" style="color: #000000e0">
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
            </div>

            {{-- <hr style="margin-top: 5px"> --}}

            <div class="card-body">
                <div class="row">
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
    
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 mb-md-0">
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
    
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 mb-md-0">
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
    
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 mb-sm-0">
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
    
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
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
{{-- report card setion --}}

{{-- report table middle --}}
<div class="col-12">
    <div class="row pt-3">
        <div class="col-12 col-md-5 mb-3 mb-xl-0">
            <div class="card">
                <div class="card-header py-1" style="color: #000000e0">
                    <h2><i class="fa-solid fa-circle-exclamation"></i><span class="pl-1">Stock Alert</span></h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead style="background-color: #3D9970;color:white">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Code</th>
                                <th scope="col">Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Alert Quantity</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th>1</th>
                                <td>Ap-000008</td>
                                <td>Square</td>
                                <td>0pc</td>
                                <td>1pc</td>
                              </tr>
                              <tr>
                                <th>1</th>
                                <td>Ap-052412</td>
                                <td>Bat</td>
                                <td>0pc</td>
                                <td>10pc</td>
                              </tr>
                              <tr>
                                <th>1</th>
                                <td>Ap-054462</td>
                                <td>Fan</td>
                                <td>0pc</td>
                                <td>5pc</td>
                              </tr>
                              <tr>
                                <th>1</th>
                                <td>Ap-054462</td>
                                <td>Fan</td>
                                <td>0pc</td>
                                <td>5pc</td>
                              </tr>
                              <tr>
                                <th>1</th>
                                <td>Ap-054462</td>
                                <td>Fan</td>
                                <td>0pc</td>
                                <td>5pc</td>
                              </tr>
                              <tr>
                                <th>1</th>
                                <td>Ap-054462</td>
                                <td>Fan</td>
                                <td>0pc</td>
                                <td>5pc</td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-7">
            <div class="card">
                <div class="card-header py-1" style="color: #000000e0">
                    <h2><i class="fa-solid fa-swatchbook"></i><span class="pl-1">Recent Activities</span></h2>
                </div>

                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#invoices">Invoice</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#purchase">Purchase</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#expenses">Expenses</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#transactions">Transactions</a>
                        </li>
                    </ul>
                    
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane container active" id="invoices">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead style="background-color: #17A2B8;color:white">
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Invoice No</th>
                                        <th scope="col">Invoice Date</th>
                                        <th scope="col">Client</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Net Total</th>
                                        <th scope="col">Total Due</th>
                                        <th scope="col">Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th>1</th>
                                        <td>Ap-000008</td>
                                        <td>29th Nov, 2023</td>
                                        <td>Farhan Fahidur Rahim</td>
                                        <td>৳300.00</td>
                                        <td>৳325.00</td>
                                        <td>৳325.00</td>
                                        <td><span class="badge badge-primary">Active</span></td>
                                      </tr>
                                      <tr>
                                        <th>2</th>
                                        <td>Ap-000008</td>
                                        <td>29th Nov, 2023</td>
                                        <td>Farhan Fahidur Rahim</td>
                                        <td>৳300.00</td>
                                        <td>৳325.00</td>
                                        <td>৳325.00</td>
                                        <td><span class="badge badge-primary">Active</span></td>
                                      </tr>
                                      <tr>
                                        <th>3</th>
                                        <td>Ap-000008</td>
                                        <td>29th Nov, 2023</td>
                                        <td>Farhan Fahidur Rahim</td>
                                        <td>৳300.00</td>
                                        <td>৳325.00</td>
                                        <td>৳325.00</td>
                                        <td><span class="badge badge-primary">Active</span></td>
                                      </tr>
                                      <tr>
                                        <th>4</th>
                                        <td>Ap-000008</td>
                                        <td>29th Nov, 2023</td>
                                        <td>Farhan Fahidur Rahim</td>
                                        <td>৳300.00</td>
                                        <td>৳325.00</td>
                                        <td>৳325.00</td>
                                        <td><span class="badge badge-primary">Active</span></td>
                                      </tr>
                                      <tr>
                                        <th>5</th>
                                        <td>Ap-000008</td>
                                        <td>29th Nov, 2023</td>
                                        <td>Farhan Fahidur Rahim</td>
                                        <td>৳300.00</td>
                                        <td>৳325.00</td>
                                        <td>৳325.00</td>
                                        <td><span class="badge badge-primary">Active</span></td>
                                      </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane container fade" id="purchase">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead style="background-color: #3D9970;color:white">
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Purchase No</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Supplier</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Net Total</th>
                                        <th scope="col">Total Due</th>
                                        <th scope="col">Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th>1</th>
                                        <td>Ap-000008</td>
                                        <td>29th Nov, 2023</td>
                                        <td>আমিন ব্রাদার্স</td>
                                        <td>৳300.00</td>
                                        <td>৳325.00</td>
                                        <td>৳325.00</td>
                                        <td><span class="badge badge-primary">Active</span></td>
                                      </tr>
                                      <tr>
                                        <th>2</th>
                                        <td>Ap-000008</td>
                                        <td>29th Nov, 2023</td>
                                        <td>আমিন ব্রাদার্স</td>
                                        <td>৳300.00</td>
                                        <td>৳325.00</td>
                                        <td>৳325.00</td>
                                        <td><span class="badge badge-primary">Active</span></td>
                                      </tr>
                                      <tr>
                                        <th>3</th>
                                        <td>Ap-000008</td>
                                        <td>29th Nov, 2023</td>
                                        <td>Rahman Traders</td>
                                        <td>৳300.00</td>
                                        <td>৳325.00</td>
                                        <td>৳325.00</td>
                                        <td><span class="badge badge-primary">Active</span></td>
                                      </tr>
                                      <tr>
                                        <th>4</th>
                                        <td>Ap-000008</td>
                                        <td>29th Nov, 2023</td>
                                        <td>Rahman Traders</td>
                                        <td>৳300.00</td>
                                        <td>৳325.00</td>
                                        <td>৳325.00</td>
                                        <td><span class="badge badge-primary">Active</span></td>
                                      </tr>
                                      <tr>
                                        <th>5</th>
                                        <td>Ap-000008</td>
                                        <td>29th Nov, 2023</td>
                                        <td>আমিন ব্রাদার্স</td>
                                        <td>৳300.00</td>
                                        <td>৳325.00</td>
                                        <td>৳325.00</td>
                                        <td><span class="badge badge-primary">Active</span></td>
                                      </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane container fade" id="expenses">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead style="background-color: #6366F1;color:white">
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Sub Category</th>
                                        <th scope="col">Expense Reason</th>
                                        <th scope="col">Ammount</th>
                                        <th scope="col">Account</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
    
                                      {{-- <tr>
                                        <th>1</th>
                                        <td>Ap-000008</td>
                                        <td>29th Nov, 2023</td>
                                        <td>আমিন ব্রাদার্স</td>
                                        <td>৳300.00</td>
                                        <td>৳325.00</td>
                                        <td>৳325.00</td>
                                        <td><span class="badge badge-primary">Active</span></td>
                                      </tr> --}}
                            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane container fade" id="transactions">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead style="background-color: #007BFF;color:white">
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Reason</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Account</th>
                                        <th scope="col">Ammount</th>
                                        <th scope="col">Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
    
                                      {{-- <tr>
                                        <th>1</th>
                                        <td>Ap-000008</td>
                                        <td>29th Nov, 2023</td>
                                        <td>আমিন ব্রাদার্স</td>
                                        <td>৳300.00</td>
                                        <td>৳325.00</td>
                                        <td>৳325.00</td>
                                        <td><span class="badge badge-primary">Active</span></td>
                                      </tr> --}}
                            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- report table middle --}}

<div class="col-12">
    <div class="row pt-3">
        <div class="col-12  col-md-4 mb-3 mb-md-0" style="padding:0px 10px 0px 10px">
            <div class="card">
                <div class="card-header py-1" style="color: #000000e0">
                    <h2><i class="fa-solid fa-chart-pie"></i><span class="pl-1">Top Selling Product</span></h2>
                </div>
                <div class="card-body">
                    <div class="piChart-wrapper text-center">
                        <canvas id="piChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12  col-md-8" style="padding:0px 10px 0px 10px">
            <div class="card">
                <div class="card-header py-1" style="color: #000000e0">
                    <h2><i class="fa-solid fa-chart-simple"></i><span class="pl-1">Sales Report</span></h2>
                </div>
                <div class="card-body">
                    <div class="barChart-wrapper">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    const piChart = document.getElementById('piChart');
    new Chart(piChart,{
        type: 'pie',
        data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: 'My First Dataset',
            data: [300, 50, 100,200,400],
            backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)'
            ],
            hoverOffset: 4
        }]
        },
        options : {
            responsive: true,
            // plugins: {
            //     legend:{
            //         position:'top'
            //     }
            // }
        }
    });
</script>

<script>
    const barChart = document.getElementById('barChart');
    const labels = ['January','February','March','April','May','June','July','August'];
    const data = {
        labels: labels,
        datasets: [{
            label: 'Total Sale',
            data: [65, 59, 80, 90, 56, 55, 40,60,75],
            backgroundColor: [
            '#007BFF',
            '#17A2B8',
            '#28A745',
            '#6C757D',
            '#3D9970',
            '#6610F2',
            '#DC3545',
            '#001F3F',
            '#FFC234',
            ],
        }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {
            responsive: true,
            scales: {
            y: {
                beginAtZero: true
            }
            }
        },
    };

    new Chart(barChart, config);
</script>
@endpush
