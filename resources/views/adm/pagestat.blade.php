@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <a class="navbar-brand text-primary" href="{{ route('getFullStat') }}">Statistic</a> ->
                {{ Request::route('page') }}
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif       
            </div>

            <div class="mb-3">
                <a class="btn btn-primary" href="javascript:delInstance('{{ route('delPageStat', ['page' => Request::route('page')]) }}', 'Statistic for {{ Request::route('page') }}?', '')">Clear statistic</a>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="col-1 text-center">#</th>
                        <th class="text-center">IP</th>
                        <th class="col-1 text-center">Country</th>
                        <th class="col-1 text-center">Region</th>
                        <th class="col-1 text-center">City</th>
                        <th class="col-1 text-center">DateTime</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($stat); $i++)
                        <tr>
                            <td class="col-1 text-center align-middle">{{ $i + 1 }}</td>
                            <td class="col-1 text-center align-middle">{{ $stat[$i]['ip']}}</td>
                            <td class="col-1 text-center align-middle">{{ $stat[$i]['country'] }}</td>
                            <td class="col-1 text-center align-middle">{{$stat[$i]['region']}}</td>
                            <td class="col-1 text-center align-middle">{{$stat[$i]['city']}}</td>
                            <td class="col-1 text-center align-middle">{{$stat[$i]['dt']}}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>

            <div class="mb-3">
                {{ $stat->links() }}  
            </div>

            <div class="mb-3">
                <a class="btn btn-primary" href="javascript:delInstance('{{ route('delPageStat', ['page' => Request::route('page')]) }}', 'Statistic for {{ Request::route('page') }}?', '')">Clear statistic</a>
            </div>
        </div>
    </div>
    
</div>

@endsection

@push('scripts')
    <script src="{{asset('js/alertify.js')}}" type="application/javascript"></script>
    <script src="{{asset('js/del_processing.js')}}" type="application/javascript"></script>   
@endpush