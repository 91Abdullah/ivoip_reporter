@extends('layouts.app')

@section('content')
<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Workcodes List</h1>
            <p>List of workcodes assigned to iVoIP Agent.</p>
            <p><a href="{{ route('create.workcodes') }}" class="btn btn-primary"><i class="fa fa-plus-square-o"></i> Create & Add Workcode</a></p>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Workcode</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                    <tbody>
                    @forelse($workcodes as $workcode)
                    <tr>
                        <td>{{ $workcode->ID }}</td>                                            
                        <td>{{ $workcode->WORKCODE }}</td>
                        <td class="text-center">
                            <a href="{{ route('edit.workcodes', ['workcode' => $workcode->ID]) }}" class="btn btn-success"><span class="fa fa-pencil-square-o"></span> Edit</a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['delete.workcodes', $workcode->ID], 'class' => 'form-inline']) !!}
                            <button type="submit" class="btn btn-danger"><span class="fa fa-trash-o"></span> Delete</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">No workcodes found.</td>
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