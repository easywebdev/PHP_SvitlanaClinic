@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">Home</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif       
            </div>

            <form id="update_home" method="POST" action="{{ route('updateHome') }}">
                @csrf

                <input type="hidden" name="id" value="{{ $home->id }}">
                    
                <div class="row mb-3">
                    <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $home->title }}" required autofocus>
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
                        <input id="keywords" type="text" class="form-control @error('keywords') is-invalid @enderror" name="keywords" value="{{ $home->keywords }}">
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
                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $home->description }}">
                        <small class="form-text text-muted">Short information in search result (250 symbols max).</small>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="text" class="col-md-4 col-form-label text-md-end">Text</label>
                    <div class="col-md-6">
                        <textarea id="text" class="form-control @error('text') is-invalid @enderror" name="text">{{ $home->text }}</textarea>
                        <small class="form-text text-muted">Service full text.</small>

                        
                        @error('text')
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

@endsection

@push('scripts')
    <script src="{{asset('js/ckeditor5/jquery-3.3.1.js')}}" type="application/javascript"></script>
    <script src="{{asset('js/ckeditor5/ckeditor.js')}}" type="application/javascript"></script>
    <script src="{{asset('js/ckeditor5/ckeditor_setup.js')}}" type="application/javascript"></script>
    
@endpush