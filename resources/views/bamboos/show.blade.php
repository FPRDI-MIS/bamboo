@extends('layouts.app')

@section('content')
    @include('inc.messages')
    <div class='container'>
    <table>
        <hr>
        <tr><h5>Scientific Name:</h5> <h2><i>{{ $bamboo->sci_name }}</i></h2>
        <h5>Common Name:</h5> <h2>{{ $bamboo->com_name }}</h2>
        <h5>Local name:</h5> <h2>{{ $bamboo->loc_name }}</h2>
        <h5>Family:</h5> <h2>{{ $bamboo->family }}</h2>
        <h5>Genus:</h5> <h2>{{ $bamboo->genus }}</h2>
        <h5>Species:</h5> <h2>{{ $bamboo->species }}</h2>
        <h5>Author's Name:</h5> <h2>{{ $bamboo->auth_name }}</h2></tr>
        
    </table>
        <br><br>
        <hr>
        <h4>Description</h4>
        <p>{!! $bamboo->description !!}</p>
        <hr>
        <h4>Comments</h4>
        <p>{{ $bamboo->comments }}</p>
        <form action="{{ route('bamboos-destroy', $bamboo->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" name="button" class="btn btn-danger float-right">DELETE</button>
        </form>
        <a href="{{ route('bamboos-edit', $bamboo->id) }}" class="btn btn-success">Edit</a>
        <a href="{{ route('bamboos-index', $bamboo->id) }}" class="btn btn-secondary">Back</a>
        <hr>
        <img src="/storage/bamboos/{{ $bamboo->sci_name }}/{{ $bamboo->photo }}" alt="{{ $bamboo->photo }}" width="700px" height="700px">
        <hr>

        @if (count ($bamboo->pictures) > 0)
            @foreach ($bamboo->pictures as $picture)
            <img src="/storage/pictures/{{ $picture->bamboo_id}}/{{ $picture->image }}" alt="{{ $picture->image }}" width="700px" height="700px">
            @endforeach

        @else
            <h3>No other photos. Click button to upload additional photos</h3>
        @endif

        <hr>
        <a href="{{ route('pictures-create', $bamboo->id) }}" class="btn btn-primary">Add more photos</a>
        
    </div>

@endsection