@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="clearfix">
                        <div class="float-left">
                            {{ __('Dashboard') }}

                        </div>
                        <div class="float-right">
                            {{ Breadcrumbs::render('about') }}
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}



<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-success color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">201</h2>
                    <div class="m-b-5">NEW ORDERS</div><i class="ti-shopping-cart widget-stat-icon"></i>
                    <div><i class="fa fa-level-up m-r-5"></i><small>25% higher</small></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-info color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">1250</h2>
                    <div class="m-b-5">UNIQUE VIEWS</div><i class="ti-bar-chart widget-stat-icon"></i>
                    <div><i class="fa fa-level-up m-r-5"></i><small>17% higher</small></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-warning color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">$1570</h2>
                    <div class="m-b-5">TOTAL INCOME</div><i class="fa fa-money widget-stat-icon"></i>
                    <div><i class="fa fa-level-up m-r-5"></i><small>22% higher</small></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-danger color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">108</h2>
                    <div class="m-b-5">NEW USERS</div><i class="ti-user widget-stat-icon"></i>
                    <div><i class="fa fa-level-down m-r-5"></i><small>-12% Lower</small></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="ibox">
                <div class="ibox-body">
                    <div class="flexbox mb-4">
                        <div>
                            <h3 class="m-0">Statistics</h3>
                            <div>Your shop sales analytics</div>
                        </div>
                        <div class="d-inline-flex">
                            <div class="px-3" style="border-right: 1px solid rgba(0,0,0,.1);">
                                <div class="text-muted">WEEKLY INCOME</div>
                                <div>
                                    <span class="h2 m-0">$850</span>
                                    <span class="text-success ml-2"><i class="fa fa-level-up"></i> +25%</span>
                                </div>
                            </div>
                            <div class="px-3">
                                <div class="text-muted">WEEKLY SALES</div>
                                <div>
                                    <span class="h2 m-0">240</span>
                                    <span class="text-warning ml-2"><i class="fa fa-level-down"></i> -12%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <canvas id="bar_chart" style="height:260px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Statistics</div>
                </div>
                <div class="ibox-body">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <canvas id="doughnut_chart" style="height:160px;"></canvas>
                        </div>
                        <div class="col-md-6">
                            <div class="m-b-20 text-success"><i class="fa fa-circle-o m-r-10"></i>Desktop 52%</div>
                            <div class="m-b-20 text-info"><i class="fa fa-circle-o m-r-10"></i>Tablet 27%</div>
                            <div class="m-b-20 text-warning"><i class="fa fa-circle-o m-r-10"></i>Mobile 21%</div>
                        </div>
                    </div>
                    <ul class="list-group list-group-divider list-group-full">
                        <li class="list-group-item">Chrome
                            <span class="float-right text-success"><i class="fa fa-caret-up"></i> 24%</span>
                        </li>
                        <li class="list-group-item">Firefox
                            <span class="float-right text-success"><i class="fa fa-caret-up"></i> 12%</span>
                        </li>
                        <li class="list-group-item">Opera
                            <span class="float-right text-danger"><i class="fa fa-caret-down"></i> 4%</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Visitors Statistics</div>
                </div>
                <div class="ibox-body">
                    <div id="world-map" style="height: 300px;"></div>
                    <table class="table table-striped m-t-20 visitors-table">
                        <thead>
                            <tr>
                                <th>Country</th>
                                <th>Visits</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img class="m-r-10" src="./assets/img/flags/us.png" />USA</td>
                                <td>755</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" style="width:52%; height:5px;" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="progress-parcent">52%</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img class="m-r-10" src="./assets/img/flags/Canada.png" />Canada</td>
                                <td>700</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" style="width:48%; height:5px;" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="progress-parcent">48%</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img class="m-r-10" src="./assets/img/flags/India.png" />India</td>
                                <td>410</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" style="width:37%; height:5px;" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="progress-parcent">37%</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img class="m-r-10" src="./assets/img/flags/Australia.png" />Australia</td>
                                <td>304</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info" role="progressbar" style="width:36%; height:5px;" aria-valuenow="36" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="progress-parcent">36%</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img class="m-r-10" src="./assets/img/flags/Singapore.png" />Singapore</td>
                                <td>203</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar" role="progressbar" style="width:35%; height:5px;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="progress-parcent">35%</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img class="m-r-10" src="./assets/img/flags/uk.png" />UK</td>
                                <td>202</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info" role="progressbar" style="width:35%; height:5px;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="progress-parcent">35%</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img class="m-r-10" src="./assets/img/flags/UAE.png" />UAE</td>
                                <td>180</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" style="width:30%; height:5px;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="progress-parcent">30%</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Tasks</div>
                    <div>
                        <a class="btn btn-info btn-sm" href="javascript:;">New Task</a>
                    </div>
                </div>
                <div class="ibox-body">
                    <ul class="list-group list-group-divider list-group-full tasks-list">
                        <li class="list-group-item task-item">
                            <div>
                                <label class="ui-checkbox ui-checkbox-gray ui-checkbox-success">
                                    <input type="checkbox">
                                    <span class="input-span"></span>
                                    <span class="task-title">Meeting with Eliza</span>
                                </label>
                            </div>
                            <div class="task-data"><small class="text-muted">10 July 2018</small></div>
                            <div class="task-actions">
                                <a href="javascript:;"><i class="fa fa-edit text-muted m-r-10"></i></a>
                                <a href="javascript:;"><i class="fa fa-trash text-muted"></i></a>
                            </div>
                        </li>
                        <li class="list-group-item task-item">
                            <div>
                                <label class="ui-checkbox ui-checkbox-gray ui-checkbox-success">
                                    <input type="checkbox" checked="">
                                    <span class="input-span"></span>
                                    <span class="task-title">Check your inbox</span>
                                </label>
                            </div>
                            <div class="task-data"><small class="text-muted">22 May 2018</small></div>
                            <div class="task-actions">
                                <a href="javascript:;"><i class="fa fa-edit text-muted m-r-10"></i></a>
                                <a href="javascript:;"><i class="fa fa-trash text-muted"></i></a>
                            </div>
                        </li>
                        <li class="list-group-item task-item">
                            <div>
                                <label class="ui-checkbox ui-checkbox-gray ui-checkbox-success">
                                    <input type="checkbox">
                                    <span class="input-span"></span>
                                    <span class="task-title">Create Financial Report</span>
                                </label>
                                <span class="badge badge-danger m-l-5"><i class="ti-alarm-clock"></i> 1 hrs</span>
                            </div>
                            <div class="task-data"><small class="text-muted">No due date</small></div>
                            <div class="task-actions">
                                <a href="javascript:;"><i class="fa fa-edit text-muted m-r-10"></i></a>
                                <a href="javascript:;"><i class="fa fa-trash text-muted"></i></a>
                            </div>
                        </li>
                        <li class="list-group-item task-item">
                            <div>
                                <label class="ui-checkbox ui-checkbox-gray ui-checkbox-success">
                                    <input type="checkbox" checked="">
                                    <span class="input-span"></span>
                                    <span class="task-title">Send message to Mick</span>
                                </label>
                            </div>
                            <div class="task-data"><small class="text-muted">04 Apr 2018</small></div>
                            <div class="task-actions">
                                <a href="javascript:;"><i class="fa fa-edit text-muted m-r-10"></i></a>
                                <a href="javascript:;"><i class="fa fa-trash text-muted"></i></a>
                            </div>
                        </li>
                        <li class="list-group-item task-item">
                            <div>
                                <label class="ui-checkbox ui-checkbox-gray ui-checkbox-success">
                                    <input type="checkbox">
                                    <span class="input-span"></span>
                                    <span class="task-title">Create new page</span>
                                </label>
                                <span class="badge badge-success m-l-5">2 Days</span>
                            </div>
                            <div class="task-data"><small class="text-muted">07 Dec 2018</small></div>
                            <div class="task-actions">
                                <a href="javascript:;"><i class="fa fa-edit text-muted m-r-10"></i></a>
                                <a href="javascript:;"><i class="fa fa-trash text-muted"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Messages</div>
                </div>
                <div class="ibox-body">
                    <ul class="media-list media-list-divider m-0">
                        <li class="media">
                            <a class="media-img" href="javascript:;">
                                <img class="img-circle" src="./assets/img/users/u1.jpg" width="40" />
                            </a>
                            <div class="media-body">
                                <div class="media-heading">Jeanne Gonzalez <small class="float-right text-muted">12:05</small></div>
                                <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                            </div>
                        </li>
                        <li class="media">
                            <a class="media-img" href="javascript:;">
                                <img class="img-circle" src="./assets/img/users/u2.jpg" width="40" />
                            </a>
                            <div class="media-body">
                                <div class="media-heading">Becky Brooks <small class="float-right text-muted">1 hrs ago</small></div>
                                <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                            </div>
                        </li>
                        <li class="media">
                            <a class="media-img" href="javascript:;">
                                <img class="img-circle" src="./assets/img/users/u3.jpg" width="40" />
                            </a>
                            <div class="media-body">
                                <div class="media-heading">Frank Cruz <small class="float-right text-muted">3 hrs ago</small></div>
                                <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                            </div>
                        </li>
                        <li class="media">
                            <a class="media-img" href="javascript:;">
                                <img class="img-circle" src="./assets/img/users/u6.jpg" width="40" />
                            </a>
                            <div class="media-body">
                                <div class="media-heading">Connor Perez <small class="float-right text-muted">Today</small></div>
                                <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Latest Orders</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item">option 1</a>
                            <a class="dropdown-item">option 2</a>
                        </div>
                    </div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th width="91px">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="invoice.html">AT2584</a>
                                </td>
                                <td>@Jack</td>
                                <td>$564.00</td>
                                <td>
                                    <span class="badge badge-success">Shipped</span>
                                </td>
                                <td>10/07/2017</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="invoice.html">AT2575</a>
                                </td>
                                <td>@Amalia</td>
                                <td>$220.60</td>
                                <td>
                                    <span class="badge badge-success">Shipped</span>
                                </td>
                                <td>10/07/2017</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="invoice.html">AT1204</a>
                                </td>
                                <td>@Emma</td>
                                <td>$760.00</td>
                                <td>
                                    <span class="badge badge-default">Pending</span>
                                </td>
                                <td>10/07/2017</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="invoice.html">AT7578</a>
                                </td>
                                <td>@James</td>
                                <td>$87.60</td>
                                <td>
                                    <span class="badge badge-warning">Expired</span>
                                </td>
                                <td>10/07/2017</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="invoice.html">AT0158</a>
                                </td>
                                <td>@Ava</td>
                                <td>$430.50</td>
                                <td>
                                    <span class="badge badge-default">Pending</span>
                                </td>
                                <td>10/07/2017</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="invoice.html">AT0127</a>
                                </td>
                                <td>@Noah</td>
                                <td>$64.00</td>
                                <td>
                                    <span class="badge badge-success">Shipped</span>
                                </td>
                                <td>10/07/2017</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Best Sellers</div>
                </div>
                <div class="ibox-body">
                    <ul class="media-list media-list-divider m-0">
                        <li class="media">
                            <a class="media-img" href="javascript:;">
                                <img src="./assets/img/image.jpg" width="50px;" />
                            </a>
                            <div class="media-body">
                                <div class="media-heading">
                                    <a href="javascript:;">Samsung</a>
                                    <span class="font-16 float-right">1200</span>
                                </div>
                                <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                            </div>
                        </li>
                        <li class="media">
                            <a class="media-img" href="javascript:;">
                                <img src="./assets/img/image.jpg" width="50px;" />
                            </a>
                            <div class="media-body">
                                <div class="media-heading">
                                    <a href="javascript:;">iPhone</a>
                                    <span class="font-16 float-right">1150</span>
                                </div>
                                <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                            </div>
                        </li>
                        <li class="media">
                            <a class="media-img" href="javascript:;">
                                <img src="./assets/img/image.jpg" width="50px;" />
                            </a>
                            <div class="media-body">
                                <div class="media-heading">
                                    <a href="javascript:;">iMac</a>
                                    <span class="font-16 float-right">800</span>
                                </div>
                                <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                            </div>
                        </li>
                        <li class="media">
                            <a class="media-img" href="javascript:;">
                                <img src="./assets/img/image.jpg" width="50px;" />
                            </a>
                            <div class="media-body">
                                <div class="media-heading">
                                    <a href="javascript:;">apple Watch</a>
                                    <span class="font-16 float-right">705</span>
                                </div>
                                <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="ibox-footer text-center">
                    <a href="javascript:;">View All Products</a>
                </div>
            </div>
        </div>
    </div>
    <style>
        .visitors-table tbody tr td:last-child {
            display: flex;
            align-items: center;
        }

        .visitors-table .progress {
            flex: 1;
        }

        .visitors-table .progress-parcent {
            text-align: right;
            margin-left: 10px;
        }
    </style>
</div>
@endsection


<!-- PAGE LEVEL PLUGINS-->
@push('scripts')
<script src="{{ asset('assets/vendors/chart.js/dist/Chart.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js') }}" type="text/javascript"></script>

<!-- PAGE LEVEL SCRIPTS-->
<script src="{{ asset('assets/js/scripts/dashboard_1_demo.js') }}" type="text/javascript"></script>
@endpush
