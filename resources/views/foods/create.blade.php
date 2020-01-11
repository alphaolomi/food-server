@extends('layouts.base')

@section('content')

<div class="">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('foods.index') !!}">Food</a>
        </li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
    <div class="animated fadeIn">
        @include('coreui-templates::common.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-plus-square-o fa-lg"></i>
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
