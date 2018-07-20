@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-html5-1.3.1/b-print-1.3.1/r-2.1.1/datatables.css"/>
@endpush

@section('content')
<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-body">    
            <h1>Call Recordings</h1>
            <p>Allows to listen and download call recordings.</p>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Unique ID</th>
                        <th>Call Date</th>
                        <th>Caller ID</th>
                        <th>Source</th>
                        <th>Destination</th>
                        <th>Duration</th>
                        <th>Bill Secs</th>
                        <th>Disposition</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                    <tbody>
                    @forelse($recordings as $recording)
                    <tr>
                        <td>{{ $recording->uniqueid }}</td>
                        <td>{{ $recording->calldate }}</td>
                        <td>{{ $recording->clid }}</td>
                        <td>{{ $recording->src }}</td>                       
                        <td>{{ $recording->dst }}</td>                       
                        <td>{{ $recording->duration }}</td>                       
                        <td>{{ $recording->billsec }}</td>                    
                        <td>{{ $recording->disposition }}</td>   
                        <td>
                            {{-- <a data-file="{{ $recording->recordingfile }}" data-toggle="modal" data-target="#myModal" href="#" title="Play" class="btn btn-primary btn-xs"><i class="fa fa-play"></i></a> --}}
                            {!! Form::open(['route' => 'download.recordings', 'style' => 'display:inline']) !!}
                                {!! Form::hidden('file', $recording->recordingfile, ['id' => 'file']) !!}
                                <button type="submit" title="Download" class="btn btn-success btn-xs"><i class="fa fa-download"></i></button>
                            {!! Form::close() !!}
                        </td>                 
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">No records found.</td>
                    </tr>
                    @endforelse
                </tbody> 
            </table>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Playing File</h4>
            </div>
                <div class="modal-body">
                <audio src="{{ route('stream.recordings', ['file' => $recordings[0]->recordingfile]) }}" id="playFile"></audio>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

@push('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-html5-1.3.1/b-print-1.3.1/r-2.1.1/datatables.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
        
        let route = "{!! route('download.recordings') !!}";

        // $("#myModal").on("show.bs.modal", function(e) {
        //     let file = e.relatedTarget.dataset.file;
        //     console.log(file);
        //     $.ajax({
        //         url: route,
        //         data: {
        //             file: file,
        //             _token: $('meta[name="csrf-token"]').attr('content')
        //         },
        //         dataType: "Binary",
        //         type: "GET",
        //         success: function(result, status, xhr) {
        //             console.log(result);
        //         },
        //         error: function(xhr, status, error) {
        //             console.log(error);
        //         },
        //     });

        // });

    </script>
@endpush