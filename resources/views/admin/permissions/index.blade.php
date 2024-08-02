@extends('layouts.admin')
@section('content')
<div class="page-content">
    <!-- Doctor List -->
    <div class="row">
        <div class="col-sm-12">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <a class="text-black" href="{{ url('permissions') }}">
                                <h5 class="card-title">Permissions List</h5>
                            </a>
                        </div>
                        <div class="col-auto d-flex flex-wrap">
                            <div class="form-custom me-2">
                                <div id="tableSearch" class="dataTables_wrapper"></div>
                            </div>
                            <div>
                                <div class="button-block">
                                    @can('permission_create')
                                    <a href="{{ route('permissions.create') }}" class="btn btn-success">Add New Permission</a>
                                    @endcan
                                    <a href="#" class="btn btn-light btn-add">EXPORT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="datatable table table-borderless hover-table" id="data-table">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                <tr>
                                    <td class="text-center">{{$permission->id}}</td>
                                    <td>{{$permission->name}}</td>
                                    <td>
                                        @can('permission_edit')
                                        <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        @endcan
                                        @can('permission_delete')
                                        <form action="{{ route('permissions.destroy', $permission->id) }}" class="d-inline-block" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="tablepagination" class="dataTables_wrapper"></div>
        </div>
    </div>
    <!-- /Doctor List -->
</div>
@endsection