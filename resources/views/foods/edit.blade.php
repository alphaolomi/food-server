@extends('layouts.base')
@section('title', 'Edit food')
@section('content')

<div class="">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('foods.index') !!}">Food</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <div class="animated fadeIn">
        @include('coreui-templates::common.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-edit fa-lg"></i>
                        <strong>Edit Food</strong>
                    </div>
                    <div class="card-body">
                        {!! Form::model($food, ['route' => ['foods.update', $food->id], 'method' => 'patch']) !!}

                        @include('foods.fields')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
