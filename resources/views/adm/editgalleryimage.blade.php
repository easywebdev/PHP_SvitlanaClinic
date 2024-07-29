@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <a class="navbar-brand text-primary" href="{{ route('getService', ['id' => $service['id']]) }}">{{ $service['name'] }}</a> ->  
                <a class="navbar-brand text-primary" href="{{ route('getServiceGallery', ['service_id' => $service['id']]) }}">Gallery</a> ->
                Image # {{ $image->position }}
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                
                <form id="update_image" method="POST" action="{{ route('updateGalleryImage') }}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $image->id }}">
                    <input type="hidden" name="service_id" value="{{ $service['id'] }}">

                    <div class="row mb-3">
                        <label for="position" class="col-md-4 col-form-label text-md-end">Position</label>

                        <div class="col-md-6">
                            <select id="position" name="position" class="form-control">
                                @for ($i = 1; $i <= $count; $i++)
                                    <option value="{{ $i }}" @if ($image->position == $i) selected @endif >{{ $i }}</option>
                                @endfor
                            </select>
                            <small class="form-text text-muted">Determinate the order in list.</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="text" class="col-md-4 col-form-label text-md-end">Caption</label>

                        <div class="col-md-6">
                            <input id="text" type="text" class="form-control" name="text", value="{{ $image->text }}">
                            <small class="form-text text-muted">Image caption (255 symbols max).</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="image" class="col-md-4 col-form-label text-md-end">Image</label>

                        <div class="col-md-6">
                            <div class="mb-3 gallery-img">
                                <img id="imgfile" src="{{ asset("images/home/galleries/$image->image") }}" alt="{{ $image->image }}" style="width: 100%;">
                            </div>
                            <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror" onchange="javascript:loadFile('#image', '#imgfile')">
                            <small class="form-text text-muted">Max size 2MB.</small>
                            
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>
@endsection

@push('scripts')
    <script src="{{asset('js/file_processing.js')}}" type="application/javascript"></script>
@endpush