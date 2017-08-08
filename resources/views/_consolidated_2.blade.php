@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-html5-1.3.1/b-print-1.3.1/r-2.1.1/datatables.css"/>
@endpush

@section('content')
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Consolidated Report # 2</h1>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Extension</th>
                        <th>Login Time</th>
                        <th>Total Calls Dialed</th>
                        <th>Total Calls Recieved</th>
                        <th>Total Calls Answered</th>
                        <th>Personal Service Level</th>
                        <th>Group Service Level</th>
                        <th>Avg. Answering Speed</th>
                        <th>Avg. Handling Time</th>
                        <th>Avg. Talk Time</th>
                        <th>Total Login Duration</th>
                        <th>Total Talk Time</th>
                        <th>Total Hold Time</th>
                        <th>Total NotReady Time</th>
                        <th>Total ACW Time</th>
                    </tr>
                </thead>
                    <tbody>
                    @forelse($reports as $report)
                    <tr>
                        <td>{{ $report->Name }}</td>
                        <td>{{ $report->Exten }}</td>
                        <td>{{ Carbon\Carbon::parse($report->LoginTime)->toDayDateTimeString() }}</td>
                        <td>{{ $report->totDialCalls }}</td>
                        <td>{{ $report->totRcvCalls }}</td>                               
                        <td>{{ $report->totAnsCalls }}</td>           
                        <td>{{ $report->PSL }}</td>           
                        <td>{{ $report->GSL }}</td>           
                        <td>{{ Carbon\Carbon::parse($report->avgAnsSpeed)->second }}</td>           
                        <td>{{ Carbon\Carbon::parse($report->avgHandTime)->second }}</td>           
                        <td>{{ Carbon\Carbon::parse($report->avgTalkTime)->second }}</td>           
                        <td>{{ Carbon\Carbon::parse($report->totLoginDur)->format('H:i:s') }}</td>           
                        <td>{{ Carbon\Carbon::parse($report->totTalkTime)->format('H:i:s') }}</td>           
                        <td>{{ Carbon\Carbon::parse($report->totHoldTime)->format('H:i:s') }}</td>           
                        <td>{{ Carbon\Carbon::parse($report->totNrdyTime)->format('H:i:s') }}</td>           
                        <td>{{ Carbon\Carbon::parse($report->totACWTime)->format('H:i:s') }}</td>           
                    </tr>
                    @empty
                    <tr>
                        <td colspan="16">No records found.</td>
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