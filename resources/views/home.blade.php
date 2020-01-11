@extends('layouts.base')

@section('title')
Home
@endsection

@section('content')

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Home</h1>

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Dashboard</h5>
                </div>
                <div class="card-body">


                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>

</div>



@endsection