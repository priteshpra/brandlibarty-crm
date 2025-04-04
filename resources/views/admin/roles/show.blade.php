@extends('layouts.admin')

@section('content')
<style>
    .badge.badge-info {
        color: #000;
    }
</style>
<div class="card">
    <div class="card-header">{{ __('View Role') }}</div>

    <div class="card-body">

        <a href="{{ route('roles.index') }}" class="btn btn-light">Back to List</a>

        <br /><br />
        <table class="table table-borderless">

            <tr>
                <th width="25%">ID</th>
                <td>{{ $role->RoleID }}</td>
            </tr>
            <tr>
                <th width="25%">Role Name</th>
                <td>{{ $role->RoleName }}</td>
            </tr>
            <tr>
                <th width="25%">Description</th>
                <td>{{ $role->Description ?? "--" }}</td>
            </tr>
            <tr>
                <th width="25%">Permissions</th>
                <td>
                    @forelse ($role->permissions as $permission)
                    <div class="badge badge-info">{{ $permission->name }}</div>
                    @empty
                    No Permissions
                    @endforelse
                </td>
            </tr>

        </table>




    </div>
</div>

@endsection