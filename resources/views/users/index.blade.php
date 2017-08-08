@extends('layouts.app')

@section('content')
<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Reporter User's List</h1>
            <p>List of users allowed to access iVoIP Reporter.</p>
            <p><a href="{{ route('form.user') }}" class="btn btn-primary"><i class="fa fa-plus-square-o"></i> Create & Add User</a></p>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                    <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>                                            
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center">
                            <a href="{{ route('edit.user', ['user' => $user->id]) }}" class="btn btn-success"><span class="fa fa-pencil-square-o"></span> Edit</a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['delete.user', $user->id], 'class' => 'form-inline']) !!}
                            <button type="submit" class="btn btn-danger"><span class="fa fa-trash-o"></span> Delete</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">No users found.</td>
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