@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">Edit Service</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                
                <form id="update_service" method="POST" action="{{ route('updateService') }}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $service->id }}">

                    <div class="row mb-3">
                        <label for="position" class="col-md-4 col-form-label text-md-end">Position</label>

                        <div class="col-md-6">
                            <select id="position" name="position" class="form-control">
                                @for ($i = 1; $i <= $count; $i++)
                                    <option value="{{ $i }}" @if ($service->position == $i) selected @endif >{{ $i }}</option>
                                @endfor
                            </select>
                            <small class="form-text text-muted">Determinate the order in list.</small>
                        </div>
                    </div>
                        
                    <div class="row mb-3">
                        <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $service->title }}" required autofocus>
                            <small class="form-text text-muted">Will be shown in browser tab (100 symbols max).</small>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="keywords" class="col-md-4 col-form-label text-md-end">Keywords</label>

                        <div class="col-md-6">
                            <input id="keywords" type="text" class="form-control @error('keywords') is-invalid @enderror" name="keywords" value="{{ $service->keywords }}">
                            <small class="form-text text-muted">Keywords for user's requests (250 symbols max).</small>

                            @error('keywords')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-end">Description</label>

                        <div class="col-md-6">
                            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $service->description }}">
                            <small class="form-text text-muted">Short information in search result (250 symbols max).</small>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name", value="{{ $service->name }}">
                            <small class="form-text text-muted">Service header (255 symbols max).</small>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="text" class="col-md-4 col-form-label text-md-end">Text</label>
                        <div class="col-md-6">
                            <textarea id="text" class="form-control @error('text') is-invalid @enderror" name="text">{{ $service->text }}</textarea>
                            <small class="form-text text-muted">Service full text.</small>

                            
                            @error('text')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="image" class="col-md-4 col-form-label text-md-end">Image</label>

                        <div class="col-md-6">
                            <div class="mb-3" style="width: 400px; height: 300px; overflow: hidden;">
                                <img id="imgfile" src="{{ asset("images/home/services/$service->image") }}" style="width: 400px;">
                            </div>
                            <input id="image" name="image" type="file" class="form-control @error('name') is-invalid @enderror" onchange="javascript:loadFile('#image', '#imgfile')">
                            <small class="form-text text-muted">Recommended file size is (400 x 300)px. Max size 2MB.</small>
                            
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

                <div class="text-center">
                    <a class="btn btn-primary" href="#">Edit Gallery</a>
                </div>

            </div>
        </div>
    </div>
    
</div>
@endsection

@push('scripts')
    <script src="{{asset('js/file_processing.js')}}" type="application/javascript"></script>
    <script src="{{asset('js/ckeditor5/ckeditor.js')}}" type="application/javascript"></script>
    <script src="{{asset('js/ckeditor5/ckeditor_setup.js')}}" type="application/javascript"></script>
    
@endpush

