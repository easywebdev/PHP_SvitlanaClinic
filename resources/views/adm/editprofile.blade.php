@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                Edit Profile
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                
                <form id="update_service" method="POST" action="{{ route('updateUserProfile') }}">
                    @csrf

                    <input type="hidden" name="id" value="{{ $user->id }}">
                        
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autofocus>
                            <small class="form-text text-muted">Profile Email (Uses for the password reset).</small>

                            @error('email')
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
    <script src="{{asset('js/ckeditor5/jquery-3.3.1.js')}}" type="application/javascript"></script>
    <script src="{{asset('js/ckeditor5/ckeditor.js')}}" type="application/javascript"></script>
    <script src="{{asset('js/ckeditor5/ckeditor_setup.js')}}" type="application/javascript"></script>
    
@endpush

