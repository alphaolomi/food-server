@extends('layouts.base')
@section('title', 'Home')
@section('content')

<section class="animated fadeIn section ">
    <div class="row sameheight-container">
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
</section>

@endsection
