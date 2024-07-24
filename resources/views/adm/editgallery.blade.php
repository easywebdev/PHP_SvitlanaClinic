@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <a class="navbar-brand text-primary" href="{{ route('getService', ['id' => $service['id']]) }}">{{ $service['name'] }}</a> ->     
                Gallery
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="text-left mb-3">
                    <a class="btn btn-primary" href="{{ route('newGalleryImage', ['service_id' => $service['id']]) }}">Add image</a>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="col-1 text-center">Move</th>
                            <th class="col-1 text-center">#</th>
                            <th class="col-1 text-center">Image</th>
                            <th class="text-center">Title</th>
                            <th class="col-2 text-center">Manage</th>
                        </tr>    
                    </thead>
                    <tbody>
                        @foreach ($images as $image)
                            <tr>
                                <td class="align-middle">
                                    @if($image->position > 1 && $image->position < count($images))
                                        <a class="" href="javascript:movePosition('{{$image->id}}', '{{$image->position - 1}}', '{{ csrf_token() }}', 'galleries', '{{ $service['id'] }}')">
                                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-square" fill="currentColor">
                                                <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                <path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z"/>
                                            </svg>
                                        </a>
                                        <a class="" href="javascript:movePosition('{{$image->id}}', '{{$image->position + 1}}', '{{ csrf_token() }}', 'galleries', '{{ $service['id'] }}')">
                                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-square" fill="currentColor">
                                                <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z"/>
                                            </svg>
                                        </a>
                                    @elseif($image->position == 1 && count($images) > 1)
                                        <svg width="2em" height="2em"></svg>
                                        <a href="javascript:movePosition('{{$image->id}}', '{{$image->position + 1}}', '{{ csrf_token() }}', 'galleries', '{{ $service['id'] }}')">
                                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-square" fill="currentColor">
                                                <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z"/>
                                            </svg>
                                        </a>
                                    @elseif($image->position == count($images) && count($images) > 1)
                                        <a href="javascript:movePosition('{{$image->id}}', '{{$image->position - 1}}', '{{ csrf_token() }}', 'galleries', '{{ $service['id'] }}')">
                                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-square" fill="currentColor">
                                                <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                <path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z"/>
                                            </svg>
                                        </a>
                                    @endif
                                </td>
                                <td class="text-center align-middle">{{ $image->position }}</td>
                                <td><a href="{{ route('getGalleryImage', [$image->id]) }}"><img height="100" src="{{ asset("images/home/galleries/thumbnails/$image->image") }}" alt="{{ $image->image }}"></a></td>
                                <td class="align-middle">{{ $image->text }}</td>
                                <td class="text-center align-middle">
                                    <a class="btn btn-primary" href="{{ route('getGalleryImage', [$image->id]) }}">Edit</a>
                                    <a class="btn btn-danger" href="javascript:delInstance('{{ route('delGalleryImage', ['id' => $image->id]) }}', 'Gallery image', '{{ $image->text }}')">Del</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="text-left">
                    <a class="btn btn-primary" href="{{ route('newGalleryImage', ['service_id' => $service['id']]) }}">Add image</a>
                </div>

            </div>
        </div>
    </div>
    
</div>
@endsection

@push('scripts')
    <script src="{{asset('js/position_processing.js')}}" type="application/javascript"></script>
    <script src="{{asset('js/alertify.js')}}" type="application/javascript"></script>
    <script src="{{asset('js/del_processing.js')}}" type="application/javascript"></script>   
@endpush

