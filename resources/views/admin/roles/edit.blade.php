@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Edit Role</h5>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('roles.update', $role->RoleID) }}">
            @csrf
            @method('PUT')


            <div class="form-group row">
                <label for="title" class="required col-md-4 col-form-label text-md-right">{{ __('Role Name') }}</label>

                <div class="col-md-6">
                    <input id="text" type="RoleName" class="form-control @error('RoleName') is-invalid @enderror" name="RoleName" value="{{ old('RoleName', $role->RoleName) }}" required autocomplete="RoleName">

                    @error('RoleName')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                <label for="short_code" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                <div class="col-md-6">
                    <input id="text" type="Description" class="form-control @error('Description') is-invalid @enderror" name="Description" value="{{ old('Description', $role->Description) }}" autocomplete="Description">

                    @error('Description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="permissions" class="col-md-4 col-form-label text-md-right">{{ __('Permissions') }}</label>

                <div class="col-md-6" id="permissions-select">
                    <select name="permissions[]" id="permissions" class="@error('permissions') is-invalid @enderror" multiple>
                        @foreach ($permissions as $id => $permission)
                        <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permission }}</option>
                        @endforeach
                    </select>
                    <a href="#" id="permission-select-all" class="btn btn-link">select all</a>
                    <a href="#" id="permission-deselect-all" class="btn btn-link">deselect all</a>

                    @error('permissions')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
            </div>


            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <div class="text-end settings-btns">
                        <button type="submit" class="btn btn-orange">Update</button>
                        <button type="button" onclick="window.history.go(-1); return false;" class="btn btn-grey" tabindex="15">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection