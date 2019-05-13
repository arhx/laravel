@extends('layouts.admin')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">@lang('Admin Panel')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('Users')</li>
        </ol>
    </nav>
    <div class="form-group">
        <a href="{{ route('admin-user-create') }}" class="btn btn-success ajax-modal">
            <i class="fa fa-plus"></i>
            @lang('Create new user')
        </a>
    </div>
    <table class="table table-sm table-hover table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Created</th>
            <th>Options</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ optional($user->role)->title }}</td>
                <td>{{ $user->created_at->format('d.m.Y') }}</td>
                <td>
                    <a href="{{ route('admin-user-edit',$user->id) }}" class="btn btn-sm btn-warning ajax-modal">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="{{ route('admin-user-delete',$user->id) }}" class="btn btn-sm btn-danger"
                       data-confirm="Confirm user deletion?">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $users->links() !!}
@endsection