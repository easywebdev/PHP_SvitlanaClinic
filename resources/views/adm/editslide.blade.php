@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">Edit Slide</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                
                <form id="update_slide" method="POST" action="{{ route('updateSlide') }}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $slide->id }}">

                    <div class="row mb-3">
                        <label for="position" class="col-md-4 col-form-label text-md-end">Position</label>

                        <div class="col-md-6">
                            <select id="position" name="position" class="form-control">
                                @for ($i = 1; $i <= $count; $i++)
                                    <option value="{{ $i }}" @if ($slide->position == $i) selected @endif >{{ $i }}</option>
                                @endfor
                            </select>
                            <small class="form-text text-muted">Determinate the order in list.</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name", value="{{ $slide->name }}">
                            <small class="form-text text-muted">Slide name (255 symbols max).</small>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="image" class="col-md-4 col-form-label text-md-end">Image</label>

                        <div class="col-md-6">
                            <div class="mb-3" style="width: 600px; height: 200px; overflow: hidden;">
                                <img id="imgfile" src="{{ asset("images/home/slides/$slide->image") }}" style="width: 600px;">
                            </div>
                            <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror" onchange="javascript:loadFile('#image', '#imgfile')">
                            <small class="form-text text-muted">Recommended file size is (1920 x 640)px. Max size 2MB.</small>
                            
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