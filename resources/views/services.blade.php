@extends('layouts.main')

@section('content')
    <div class="container flex-grid flex-grid_center bg-main pad-1">
        @foreach ($page->services as $service)
            <a href="{{ route('service', [$service->name]) }}" class="grid-link">
                <div class="grid-image-wrapper">
                    <img src="images/home/services/{{ $service->image }}" alt="{{ $service->image }}">
                </div>
                <div class="text-center">
                    {{ $service->name }}
                </div>
            </a>
        @endforeach
    </div>
@endsection