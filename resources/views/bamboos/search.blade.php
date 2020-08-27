@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Search Results</h2>
</div>

<div class="container">


@if(count($bamboo) != 0 )

    <table class='table'>
        <table class="table table-striped">
            <tr><h4>Scientific Name</h4></tr>
        @foreach($bamboo as $bamboos)
            <tr>
            <td><img src="/storage/bamboos/{{ $bamboos->sci_name }}/{{ $bamboos->photo }}" width="70px" height="70px">&nbsp;&nbsp;
                 <a h3 style="font-size:200%" href="{{ route('bamboos-show', $bamboos->id) }}"> {{ $bamboos->sci_name }}</a>
            </tr>
        @endforeach
        {{ $bamboo->links( )}}
    </table>
@else
    <p><h3>No results found. Please try a different instance!</h3></p>
@endif

</div>

@endsection