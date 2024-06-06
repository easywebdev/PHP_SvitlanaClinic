@extends('layouts.main')

@section('content')
    <div class="container">
        @foreach ($page->services as $service)
            <a href="{{ route('service', [$service->name]) }}" class="fgrid__item">
                <div>
                    <img src="images/home/services/{{ $service->image }}">
                </div>
                <div>
                    {{ $service->name }}
                </div>
            </a>
        @endforeach
    </div>
@endsection