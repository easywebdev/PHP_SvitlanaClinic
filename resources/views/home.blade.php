@extends('layouts.main')

@section('content')
    <div class="s-slider">
        <div id="slider" class="slider" style="background-image: url({{ count($slides) > 0 ? asset('images/home/slides/' . $slides[0]->image) : "" }}); background-size: cover">
            @foreach($slides as $slide)
                <div class="slide">
                    <img src="{{ asset('images/home/slides/' . $slide->image) }}" alt="{{ $slide->name }}">
                </div>
            @endforeach
        </div>
    </div>
    
    <div class="container">
        <div class="text-content">
            {{ $page->text }}
        </div>
    </div>
@endsection

@push('css')
    <link href="{{ asset('css/skdslider.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('scripts')
    <script src="{{asset('js/skdslider/jquery-3.3.1.js')}}" type="application/javascript"></script>
    <script src="{{asset('js/skdslider/skdslider.js')}}" type="application/javascript"></script>
    <script src="{{asset('js/skdslider/skdslider_manage.js')}}" type="application/javascript"></script>
@endpush
