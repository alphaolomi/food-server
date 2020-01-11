@extends('layouts.base')
@section('title', 'Home')
@section('content')

<div class="animated fadeIn">
    <div class="row">
        <div class="col-12 col-sm-6 col-xl d-flex">
            <div class="card flex-fill">
                <div class="card-body py-4">
                    <div class="media">
                        <div class="d-inline-block mt-2 mr-3">
                            <i class="feather-lg text-primary" data-feather="shopping-cart"></i>
                        </div>
                        <div class="media-body">
                            <h3 class="mb-2">2.562</h3>
                            <div class="mb-0">Sales Today</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl d-flex">
            <div class="card flex-fill">
                <div class="card-body py-4">
                    <div class="media">
                        <div class="d-inline-block mt-2 mr-3">
                            <i class="feather-lg text-warning" data-feather="activity"></i>
                        </div>
                        <div class="media-body">
                            <h3 class="mb-2">17.212</h3>
                            <div class="mb-0">Visitors Today</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl d-flex">
            <div class="card flex-fill">
                <div class="card-body py-4">
                    <div class="media">
                        <div class="d-inline-block mt-2 mr-3">
                            <i class="feather-lg text-success" data-feather="dollar-sign"></i>
                        </div>
                        <div class="media-body">
                            <h3 class="mb-2">$ 24.300</h3>
                            <div class="mb-0">Total Earnings</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl d-flex">
            <div class="card flex-fill">
                <div class="card-body py-4">
                    <div class="media">
                        <div class="d-inline-block mt-2 mr-3">
                            <i class="feather-lg text-danger" data-feather="shopping-bag"></i>
                        </div>
                        <div class="media-body">
                            <h3 class="mb-2">43</h3>
                            <div class="mb-0">Pending Orders</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl d-none d-xxl-flex">
            <div class="card flex-fill">
                <div class="card-body py-4">
                    <div class="media">
                        <div class="d-inline-block mt-2 mr-3">
                            <i class="feather-lg text-info" data-feather="dollar-sign"></i>
                        </div>
                        <div class="media-body">
                            <h3 class="mb-2">$ 18.700</h3>
                            <div class="mb-0">Total Revenue</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">


    <div class=" col-md-8 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <div class="card-actions float-right">
                    <div class="dropdown show">
                        <a href="#" data-toggle="dropdown" data-display="static">
                            <i class="align-middle" data-feather="more-horizontal"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <h5 class="card-title mb-0">Top Selling Foods</h5>
            </div>
            <table id="datatables-dashboard-products" class="table table-striped my-0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th class="d-none d-xl-table-cell">Tech</th>
                        <th class="d-none d-xl-table-cell">License</th>
                        <th class="d-none d-xl-table-cell">Tickets</th>
                        <th>Sales</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>AppStack Theme</td>
                        <td><span class="badge badge-success">HTML</span></td>
                        <td class="d-none d-xl-table-cell">Single license</td>
                        <td class="d-none d-xl-table-cell">50</td>
                        <td class="d-none d-xl-table-cell">720</td>
                    </tr>
                    <tr>
                        <td>Spark Theme</td>
                        <td><span class="badge badge-danger">Angular</span></td>
                        <td class="d-none d-xl-table-cell">Single license</td>
                        <td class="d-none d-xl-table-cell">20</td>
                        <td class="d-none d-xl-table-cell">540</td>
                    </tr>
                    <tr>
                        <td>Milo Theme</td>
                        <td><span class="badge badge-warning">React</span></td>
                        <td class="d-none d-xl-table-cell">Single license</td>
                        <td class="d-none d-xl-table-cell">40</td>
                        <td class="d-none d-xl-table-cell">280</td>
                    </tr>
                    <tr>
                        <td>Ada Theme</td>
                        <td><span class="badge badge-info">Vue</span></td>
                        <td class="d-none d-xl-table-cell">Single license</td>
                        <td class="d-none d-xl-table-cell">60</td>
                        <td class="d-none d-xl-table-cell">610</td>
                    </tr>
                    <tr>
                        <td>Abel Theme</td>
                        <td><span class="badge badge-danger">Angular</span></td>
                        <td class="d-none d-xl-table-cell">Single license</td>
                        <td class="d-none d-xl-table-cell">80</td>
                        <td class="d-none d-xl-table-cell">150</td>
                    </tr>
                    <tr>
                        <td>Spark Theme</td>
                        <td><span class="badge badge-success">HTML</span></td>
                        <td class="d-none d-xl-table-cell">Single license</td>
                        <td class="d-none d-xl-table-cell">20</td>
                        <td class="d-none d-xl-table-cell">480</td>
                    </tr>
                    <tr>
                        <td>Libre Theme</td>
                        <td><span class="badge badge-warning">React</span></td>
                        <td class="d-none d-xl-table-cell">Single license</td>
                        <td class="d-none d-xl-table-cell">30</td>
                        <td class="d-none d-xl-table-cell">280</td>
                    </tr>
                    <tr>
                        <td>Von Theme</td>
                        <td><span class="badge badge-danger">Angular</span></td>
                        <td class="d-none d-xl-table-cell">Single license</td>
                        <td class="d-none d-xl-table-cell">50</td>
                        <td class="d-none d-xl-table-cell">350</td>
                    </tr>
                    <tr>
                        <td>Material Blog Theme</td>
                        <td><span class="badge badge-info">Vue</span></td>
                        <td class="d-none d-xl-table-cell">Single license</td>
                        <td class="d-none d-xl-table-cell">10</td>
                        <td class="d-none d-xl-table-cell">480</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- <div class="col-12 col-md-6 col-lg-5 col-xxl-2 d-flex"> --}}
        <div class="col-md-4 d-flex">
        <div class="card flex-fill w-100">
            <div class="card-header">
                <div class="card-actions float-right">
                    <div class="dropdown show">
                        <a href="#" data-toggle="dropdown" data-display="static">
                            <i class="align-middle" data-feather="more-horizontal"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <h5 class="card-title mb-0">Order Activity</h5>
            </div>
            <div class="card-body">
                <ul class="timeline m-3">
                    <li class="timeline-item">
                        <strong>Created Delivered</strong>
                        <p class="text-sm">2 hours ago</p>
                    </li>
                    <li class="timeline-item">
                        <strong>Created Pick Up</strong>
                        <p class="text-sm">6 hours ago</p>
                    </li>
                    <li class="timeline-item">
                        <strong>Created In Transit</strong>
                        <p class="text-sm">1 days ago</p>
                    </li>
                    <li class="timeline-item">
                        <strong>Created Dispatched</strong>
                        <p class="text-sm">3 days ago</p>
                    </li>
                    <li class="timeline-item">
                        <strong>Created Order Received</strong>
                        <p class="text-sm">4 days ago</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>



</div>

@endsection
