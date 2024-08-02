@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Role List</h5>
    </div>

    <div class="card-body">
        @can('role_create')
        <a href="{{ route('roles.create') }}" class="btn btn-success">Add New Role</a>
        @endcan

        <br /><br />

        <table class="table table-borderless table-hover">
            <tr class="bg-info text-light">
                <th class="text-center">ID</th>
                <th>Role Name</th>
                <th>Description</th>
                <th>
                    &nbsp;
                </th>
            </tr>
            @forelse ($roles as $role)
            <tr>
                <td class="text-center">{{$role->RoleID}}</td>
                <td>{{$role->RoleName}}</td>
                <td>{{$role->Description ?? '--'}}</td>
                <td>
                    @can('role_show')
                    <a href="{{ route('roles.show', $role->RoleID) }}" class="btn btn-sm btn-success">View</a>
                    @endcan
                    @can('role_edit')
                    <a href="{{ route('roles.edit', $role->RoleID) }}" class="btn btn-sm btn-warning">Edit</a>
                    @endcan
                    @can('role_delete')
                    <form action="{{ route('roles.destroy', $role->RoleID) }}" class="d-inline-block" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                    @endcan
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="100%" class="text-center text-muted py-3">No Roles Found</td>
            </tr>
            @endforelse
        </table>




        @if($roles->total() > $roles->perPage())
        <br><br>
        {{$roles->links()}}
        @endif

    </div>
</div>

@endsection