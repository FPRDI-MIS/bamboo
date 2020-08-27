@extends('layouts.app')


@section('content')
    <div class="container">
        <h2>Create new</h2>
        <form method="post" action="{{ route('bamboos-store') }}" enctype="multipart/form-data">
            @csrf
                <!-- Form for scientific name -->
                <div class="form-group">
                    <label for="sci_name" class="">{{ __('Scientific Name') }}</label>
                    <input type="text" class="form-control @error('sci_name') is-invalid @enderror" name="sci_name" id="sci_name" value="{{ old('sci_name') }}" required autocomplete="sci_name" autofocus placeholder="Enter scientific name">
                    
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
                            <input type="text" class="form-control" name="com_name" id="com_name" placeholder="Enter common name">
                        </div>

                        <!-- Form for local name -->
                        <div class="form-group col-md-6">
                            <label for="loc_name">Local Name</label>
                            <input type="text" class="form-control" name="loc_name" id="loc_name" placeholder="Enter local name">
                        </div>
                    </div>
                </div>
                
                <!-- Text area for family name -->
                <div class="form-group">
                    <label for="family">Family</label>
                    <input type="text" class="form-control" name="family" id="family" placeholder="Enter plant's family">
                </div>

                <!-- Text area for genus -->
                <div class="form-group">
                    <label for="genus">Genus</label>
                    <input type="text" class="form-control" name="genus" id="genus" placeholder="Enter plant's genus">
                </div>

                 <!-- Text area for species -->
                 <div class="form-group">
                    <label for="species">Species</label>
                    <input type="text" class="form-control" name="species" id="species" placeholder="Enter plant's species">
                </div>

                <!-- Text area for author's name -->
                <div class="form-group">
                    <label for="auth_name">Author's name</label>
                    <input type="text" class="form-control" name="auth_name" id="auth_name" placeholder="Enter author's name">
                </div>


                <!-- Text area for description -->
                <div class="form-group">
                    <label for="description">{{ __('Description') }}</label>
                    <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus></textarea>
                        
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> 

                 <!-- Text area for comments -->
                 <div class="form-group">
                    <label for="comments">Comments</label>
                    <textarea type="text" class="form-control" name="comments" id="comments" rows="2"> </textarea>
                </div>

                <!-- Form for uploading primary photo -->   
                 <div class="form-group">
                    <label for="photo">{{ __('Photo') }}</label>
                    <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" id="photo" value="{{ old('photo') }}" required autocomplete="photo" autofocus>
                
                    @error('photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('bamboos-index') }}" class="btn btn-secondary my-2">Discard</a>
                </div>
        </form>
    </div>
@endsection