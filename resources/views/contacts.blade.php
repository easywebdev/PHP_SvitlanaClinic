@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="flex-grid bg-main mb-1 pad-1">
            <div class="flex-grid__item">
                <div class="contact-image-wrapper">
                    <img class="contact-image" src="{{ asset("images/home/contacts/$page->image") }}" alt="Contact profile image">
                </div>
            </div>

            <div class="flex-grid__item_content-middle">
                <ul class="list-none">
                    <li><span class="text-label">Email:</span><span>{{ $page->email }}</span></li>
                    <li><span class="text-label">Phone:</span><span>{{ $page->phone }}</span></li>
                    <li><span class="text-label">Address:</span><span>{{ $page->address }}</span></li>
                    <li><span class="text-label"><i class="fab fa-facebook"></i></span><span>{{ $page->facebook }}</span></li>
                </ul>
            </div>
        </div>

        <div class="">
            {!! $page->geolocation !!}
        </div>
    </div>
@endsection