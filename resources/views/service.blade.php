@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="text-content">
            {{ $page->text }}
        </div>
        
        <div>
            <ul>
                @foreach ($galleries as $gallery)
                    <li>
                        <div>
                            <img src="{{ asset("images/home/galleries/$gallery->image") }}">
                        </div>
                        <div>
                            {{ $gallery->text }}
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection