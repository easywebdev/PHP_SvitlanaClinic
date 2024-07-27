@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">Statistic</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif       
            </div>

            <div class="mb-3">
                <a class="btn btn-primary" href="javascript:delInstance('{{ route('delFullStat') }}', 'All statistic?', '')">Clear statistic</a>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="col-1 text-center">#</th>
                        <th class="text-center">Page</th>
                        <th class="col-1 text-center">Visit count</th>
                        <th class="col-1 text-center">Details</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($stat); $i++)
                        <tr>
                            <td class="col-1 text-center align-middle">{{ $i + 1 }}</td>
                            <td class="align-middle">{{ $stat[$i]->name }}</td>
                            <td class="col-1 text-center align-middle">{{ $stat[$i]->count }}</td>
                            <td class="col-1 text-center align-middle"><a class="btn btn-primary" href="{{ route('getPageStat', ['page' => $stat[$i]->name]) }}">...</a></td>
                        </tr>
                    @endfor
                </tbody>
            </table>

            <div class="mb-3">
                <a class="btn btn-primary" href="javascript:delInstance('{{ route('delFullStat') }}', 'All statistic?', '')">Clear statistic</a>
            </div>
        </div>
    </div>
    
</div>

@endsection

@push('scripts')
    <script src="{{asset('js/alertify.js')}}" type="application/javascript"></script>
    <script src="{{asset('js/del_processing.js')}}" type="application/javascript"></script> 
@endpush