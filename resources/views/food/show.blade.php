@extends('layouts.app')
@section('title')
    Food Details
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
        <h1>Food Details</h1>
        <div class="section-header-breadcrumb">

{!! Form::open(['route' => ['food.destroy', $food->id], 'method' => 'delete']) !!}
{{-- <div class='btn-group'> --}}

    <a href="{{ route('food.edit', $food->id) }}" class='btn btn-secondary'>
        <i class="fa fa-edit">Edit </i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i> Delete', [
        'type' => 'submit',
        'class' => 'ml-2  btn btn-danger ',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
{{-- </div> --}}
{!! Form::close() !!}


            <a href="{{ route('food.index') }}"
                 class="ml-2 btn btn-primary form-btn float-right">Back</a>
        </div>
      </div>
   @include('stisla-templates::common.errors')
    <div class="section-body">
           <div class="card">
            <div class="card-body">
                    @include('food.show_fields')
            </div>
            </div>
    </div>
    </section>
@endsection
