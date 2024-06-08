@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="flex-grid">
            <div class="flex-grid__item">
                <div class="contact-image-wrapper">
                    <img src="{{ asset("images/home/contacts/$page->image") }}" alt="Contact profile image">
                </div>
            </div>

            <div class="flex-grid__item">
                <ul>
                    <li><span>Email</span><span>{{ $page->email }}</span></li>
                    <li><span>Phone</span><span>{{ $page->phone }}</span></li>
                    <li><span>Address</span><span>{{ $page->address }}</span></li>
                    <li><span>Facebook</span><span>{{ $page->facebook }}</span></li>
                </ul>
            </div>
        </div>

        <div class="">
            {!! $page->geolocation !!}
        </div>
    </div>
@endsection