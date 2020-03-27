@extends('layouts.base')
@section('title', 'Foods List')
@section('content')

<div class="">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Foods</li>
    </ol>
    <div class="animated fadeIn">
        @include('flash::message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header pl-4 pt-3">
                        <h4><i class="fa fa-align-justify"></i>
                            Foods
                            <a class="btn btn-sm btn-primary" href="{{ route('foods.create') }}"><i
                                    class="fa fa-plus-square fa-lg"></i> Add Food</a></h4>
                    </div>
                    <div class="card-body">
                        @include('foods.table')
                        <div class="pull-right mr-3">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
