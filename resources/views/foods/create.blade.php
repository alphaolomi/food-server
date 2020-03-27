@extends('layouts.base')

@section('title', 'Create')

@section('content')

<div class="">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('foods.index') !!}">Food</a>
        </li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
    <div class="animated fadeIn">
        @include('adminlte-templates::common.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom pl-4">
                        <i class="fa fa-plus-square-o fa-lg pl-3 pr-2"></i>
                        <strong>Create Food</strong>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'foods.store']) !!}

                        @include('foods.fields')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
