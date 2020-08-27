@extends('layouts.app')


@section('content')
    <div class="container">
        <h2>Edit information</h2>
        <form method="post" action="{{ route('bamboos-update', $bamboo->id) }}" enctype="multipart/form-data">
            @csrf
                {{ method_field('PUT') }}
                <input type="hidden" name="id" id="id" value="{{ $bamboo->id }}">

                <!-- Form for scientific name -->
                <div class="form-group">
                    <label for="sci_name" class="">{{ __('Scientific Name') }}</label>
                    <input type="text" class="form-control @error('sci_name') is-invalid @enderror" name="sci_name" id="sci_name" value="{{ $bamboo->sci_name }}" required autocomplete="sci_name" autofocus placeholder="Enter scientific name">
                    
                    @error('sci_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div>
                    <div class="form-row">
                         <!-- Form for common name -->
                        <div class="form-group col-md-6">
                            <label for="com_name">{{ __('Common Name') }}</label>
                            <input type="text" value="{{ $bamboo->com_name }}" class="form-control" name="com_name" id="com_name" placeholder="Enter common name">
                        </div>

                        <!-- Form for local name -->
                        <div class="form-group col-md-6">
                            <label for="loc_name">Local Name</label>
                            <input type="text" value="{{ $bamboo->loc_name }}" class="form-control" name="loc_name" id="loc_name" placeholder="Enter local name">
                        </div>
                    </div>
                </div>
                
                <!-- Text area for family name -->
                <div class="form-group">
                    <label for="family">Family</label>
                    <input type="text" value="{{ $bamboo->family }}" class="form-control" name="family" id="family" placeholder="Enter plant's family">
                </div>

                <!-- Text area for genus -->
                <div class="form-group">
                    <label for="genus">Genus</label>
                    <input type="text" value="{{ $bamboo->genus }}" class="form-control" name="genus" id="genus" placeholder="Enter plant's genus">
                </div>

                 <!-- Text area for species -->
                 <div class="form-group">
                    <label for="species">Species</label>
                    <input type="text" value="{{ $bamboo->species }}" class="form-control" name="species" id="species" placeholder="Enter plant's species">
                </div>

                <!-- Text area for author's name -->
                <div class="form-group">
                    <label for="auth_name">Author's name</label>
                    <input type="text" value="{{ $bamboo->auth_name }}" class="form-control" name="auth_name" id="auth_name" placeholder="Enter author's name">
                </div>


                <!-- Text area for description -->
                <div class="form-group">
                    <label for="description">{{ __('Description') }}</label>
                    <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>{{ $bamboo->description }}</textarea>
                        
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div>
                    <div class="form-row">
                         <!-- Form for longitude -->
                        <div class="form-group col-md-6">
                            <label for="longitude">Location-longitude</label>
                            <input type="text" value="{{ $bamboo->longitude }}" class="form-control" name="longitude" id="longitude" placeholder="Enter longitude">
                        </div>
                    

                        <!-- Form for latitude -->
                        <div class="form-group col-md-6">
                            <label for="latitude">Location-latitude</label>
                            <input type="text" value="{{ $bamboo->latitude }}" class="form-control" name="latitude" id="latitude" placeholder="Enter latitude">
                        </div>
                    </div>
                </div>

                <!-- Text area for comments -->
                <div class="form-group">
                    <label for="comments">Comments</label>
                    <textarea type="text" class="form-control" name="comments" id="comments" rows="2">{{ $bamboo->comments }}</textarea>
                </div>

                

                <button type="submit" class="btn btn-primary">Save</button>
                
        </form>
    </div>
@endsection