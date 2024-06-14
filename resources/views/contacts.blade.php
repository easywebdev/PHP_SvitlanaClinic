@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="flex-grid">
            <div class="flex-grid__item mb-1">
                <div class="contact-image-wrapper">
                    <img src="{{ asset("images/home/contacts/$page->image") }}" alt="Contact profile image">
                </div>
            </div>

            <div class="flex-grid__item_content-middle">
                <ul class="list-none">
                    <li><span class="text-label">Email: </span><span>{{ $page->email }}</span></li>
                    <li><span class="text-label">Phone: </span><span>{{ $page->phone }}</span></li>
                    <li><span class="text-label">Address: </span><span>{{ $page->address }}</span></li>
                    <li><span class="text-label">Facebook: </span><span>{{ $page->facebook }}</span></li>
                </ul>
            </div>
        </div>

        <div class="">
            {!! $page->geolocation !!}
        </div>
    </div>
@endsection