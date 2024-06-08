@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">Contacts</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif       
            </div>

            <form id="update_contacts" action="{{ route('updateContacts') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $contacts->id }}">

                <div class="row mb-3">
                    <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $contacts->title }}" required autofocus>
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
                        <input id="keywords" type="text" class="form-control @error('keywords') is-invalid @enderror" name="keywords" value="{{ $contacts->keywords }}">
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
                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $contacts->description }}">
                        <small class="form-text text-muted">Short information in search result (250 symbols max).</small>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $contacts->email }}">
                        <small class="form-text text-muted">Contact Email (250 symbols max).</small>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="phone" class="col-md-4 col-form-label text-md-end">Phone</label>

                    <div class="col-md-6">
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $contacts->phone }}">
                        <small class="form-text text-muted">Contact Phone (100 symbols max).</small>

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="facebook" class="col-md-4 col-form-label text-md-end">Facebook</label>

                    <div class="col-md-6">
                        <input id="facebook" type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ $contacts->facebook }}">
                        <small class="form-text text-muted">Contact Facebook (255 symbols max).</small>

                        @error('facebook')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="address" class="col-md-4 col-form-label text-md-end">Facebook</label>

                    <div class="col-md-6">
                        <input id="desaddress" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $contacts->address }}">
                        <small class="form-text text-muted">Contact Facebook (255 symbols max).</small>

                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="geolocation" class="col-md-4 col-form-label text-md-end">Geolocation</label>

                    <div class="col-md-6">
                        <input id="desgeolocation" type="text" class="form-control @error('geolocation') is-invalid @enderror" name="geolocation" value="{{ $contacts->geolocation }}">
                        <small class="form-text text-muted">Contact Geolocation.</small>

                        @error('geolocation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="image" class="col-md-4 col-form-label text-md-end">Image</label>

                    <div class="col-md-6">
                        <div class="mb-3" style="width: 300px; height: 400px; overflow: hidden;">
                            <img id="imgfile" src="{{ asset("images/home/contacts/$contacts->image") }}" style="width: 300px;">
                        </div>
                        <input id="image" name="image" type="file" class="form-control @error('name') is-invalid @enderror" onchange="javascript:loadFile('#image', '#imgfile')">
                        <small class="form-text text-muted">Recommended file size is (300 x 400)px. Max size 2MB.</small>
                        
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
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
    <script src="{{asset('js/file_processing.js')}}" type="application/javascript"></script>
@endpush