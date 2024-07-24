@extends('layouts.main')

@section('content')
    <div class="container bg-main pad-1">
        <div class="text-content">
            <h2 class="h2">{{ $page->name }}</h2>
            {!! $page->text !!}
        </div>
        
        @if (count($galleries) > 0)
            <div>
                <h2 class="h2">Gallery</h2>    

                <ul class="flex-grid flex-grid_center">
                    @foreach ($galleries as $gallery)
                        <a class="gallery-image-list" data-fancybox="gallery"
                            data-src="{{ asset("images/home/galleries/$gallery->image") }}"
                            data-caption="{{ $gallery->text }}">
                            <img class="gallery-image-size" src="{{ asset("images/home/galleries/$gallery->image") }}" alt="{{ $gallery->image }}" />
                        </a>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/gallery.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/gallery/fancybox.umd.js') }}" type="application/javascript"></script>
    <!--<script src="{{ asset('js/gallery/gallery.js') }}" type="application/javascript"></script>-->
@endpush