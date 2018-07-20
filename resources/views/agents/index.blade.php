@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-html5-1.3.1/b-print-1.3.1/r-2.1.1/datatables.css"/>
@endpush

@section('content')
<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Agent</h1>
            <p>List of all the agents registered in the queue.</p>
            <p><a href="{{ route('create.agent') }}" class="btn btn-primary"><i class="fa fa-plus-square-o"></i> Create & Add Agent</a></p>
        </div>

        <div class="panel-body table-responsive">

            @include('component.alert')

            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Extension</th>
                        <th>Secret</th>
                        <th>System Type</th>
                        <th>System Rights</th>
                        {{-- <th>Actions</th> --}}
                    </tr>
                </thead>
                    <tbody>
                    @forelse($agents as $agent)
                    <tr>
                        <td>{{ $agent->ID }}</td>
                        <td>{{ $agent->Name }}</td>
                        <td>{{ $agent->Extension }}</td>                       
                        <td>{{ $agent->Secret }}</td>                       
                        <td>
                            @if($agent->SystemType == "ib")
                                {{ "Inbound Only" }}
                            @elseif($agent->SystemType == "ob")
                                {{ "Outbound Only" }}
                            @elseif($agent->SystemType == "io")
                                {{ "Inbound/Outbound" }}
                            @else
                                {{ "Unknown" }}
                            @endif
                        </td>                       
                        <td>{{ $agent->SystemRights == 'S' ? 'Supervisor' : 'Agent' }}</td>
                        {{-- <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['delete.agent', $agent->ID], 'class' => 'form-inline']) !!}
                            <button type="submit" title="Delete" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></button>
                            {!! Form::close() !!}
                            <a href="{{ route('show.update', ['agent' => $agent->ID]) }}" title="Edit" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                        </td>                       --}}
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">No records found.</td>
                    </tr>
                    @endforelse
                </tbody> 
            </table>
        </div>

        {{--  <div class="panel-footer text-center">
            {!! $cdrs->links() !!}
        </div>  --}}
    </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-html5-1.3.1/b-print-1.3.1/r-2.1.1/datatables.js"></script>
    <script>
        $(document).ready(function() {
            $('.table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        })
    </script>
@endpush