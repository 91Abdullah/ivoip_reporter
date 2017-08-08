@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-html5-1.3.1/b-print-1.3.1/r-2.1.1/datatables.css"/>
@endpush

@section('content')
<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Call Detail Records</h1>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Source</th>
                        <th>Destination</th>
                        <th>Type</th>
                        <th>Start</th>
                        <th>Answer</th>
                        <th>End</th>
                        <th>Duration</th>
                        <th>Disposition</th>
                        <th>Workcode</th>
                    </tr>
                </thead>
                    <tbody>
                    @forelse($cdrs as $cdr)
                    <tr>
                        <td>{{ $cdr->source }}</td>
                        <td>{{ $cdr->destination }}</td>
                        <td>{{ $cdr->type }}</td>
                        <td>{{ Carbon\Carbon::parse($cdr->start)->toDayDateTimeString() }}</td>
                        <td>{{ Carbon\Carbon::parse($cdr->answer)->toDayDateTimeString() }}</td>
                        <td>{{ Carbon\Carbon::parse($cdr->endtime)->toDayDateTimeString() }}</td>
                        <td>{{ $cdr->duration }}</td>
                        <td>{{ $cdr->disposition }}</td>                            
                        <td>{{ $cdr->workcode }}</td>                            
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9">No records found.</td>
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