@extends('layouts.app')

@section('content')
    @include('inc.messages')
    <div class='container'>
        <h1 class="AlbumTilte"><strong>FPRDI Bamboo Collection</h1>
        <p class="lead text-muted">Bamboo system description</p>
    </div>

    @if (count ($bamboo) > 0)
        <div class='container'>
            <div class="row row-cols-1 row-cols-md-4" >
                    @foreach ($bamboo as $bamboos)
                        <div class="col-md-4" style="27rem">
                            <div class="card mb-4 box-shadow h-50 w-100">
                                <img src="/storage/bamboos/{{ $bamboos->sci_name }}/{{ $bamboos->photo }}" alt="{{ $bamboos->photo }}" height="200px" >
                                <div class="card-body">
                                    <p class="card-text"><i>{{ $bamboos->sci_name }}</i></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <medium class="text-muted">{{ $bamboos->loc_name }}</medium>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ route('bamboos-show', $bamboos->id) }}" class="btn btn-sm btn-outline-success">View</a>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    @else
        <div class='container'>
            <h3>No entries yet.</h3>
        </div>      
    @endif

@endsection