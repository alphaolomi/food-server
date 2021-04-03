@extends('layouts.app')
@section('title')
    Food 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Food</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('food.create')}}" class="btn btn-primary form-btn">Food <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('food.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

