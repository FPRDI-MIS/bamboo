@extends('layouts.app')

@section('content')
<div class="container text-white">     
    <div class="jumbotron jumbotron-fluid bg-dark text-center">
        <div class="container">
            <h1 class="jumbotron-heading bg-dark"><strong>FPRDI Bamboo Collection</strong></h1>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h2>Hello {{ Auth::user()->first_name }}!!!</h2>
            </div>
            <p> 
                <a href="{{ route('bamboos-index') }}" class="btn btn-success my-2">View Specimens</a>                 
            </p>
            <form action="/search" method="GET" role="search">
                @csrf
                <div class="input-group mb-3">
                    <input type="search" class="form-control" name="search" placeholder="Looking for species?">
                    <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" >Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
