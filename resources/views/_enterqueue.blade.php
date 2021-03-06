@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-html5-1.3.1/b-print-1.3.1/r-2.1.1/datatables.css"/>
@endpush

@section('content')
<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Enter Queue Report</h1>
            <p>A call has entered the queue. URL (if specified) and Caller*ID are placed in the log.</p>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Queue</th>
                        <th>Caller ID</th>
                    </tr>
                </thead>
                    <tbody>
                    @forelse($reports as $report)
                    <tr>
                        <td>{{ Carbon\Carbon::parse($report->time)->toDayDateTimeString() }}</td>
                        <td>{{ $report->queuename }}</td>
                        <td>{{ $report->data2 }}</td>                                              
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">No records found.</td>
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