@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">{{ __('Add New Role') }}</div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.roles.store') }}">
            @csrf


            <div class="form-group row">
                <label for="title" class="required col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                <div class="col-md-6">
                    <input id="RoleName" type="text" class="form-control @error('RoleName') is-invalid @enderror" name="RoleName" value="{{ old('RoleName') }}" required autocomplete="RoleName">

                    @error('RoleName')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="short_code" class="col-md-4 col-form-label text-md-right">{{ __('Short Code') }}</label>

                <div class="col-md-6">
                    <input id="Description" type="text" class="form-control @error('Description') is-invalid @enderror" name="Description" value="{{ old('short_code') }}" autocomplete="short_code">

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
                        <option value="{{ $id }}" {{ (in_array($id, old('permissions', []))) ? 'selected' : '' }}>{{ $permission }}</option>
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
                    <button type="submit" class="btn btn-primary">
                        {{ __('Create') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<link rel="stylesheet" href="{{ asset('admin_assets/plugins/slim-select/slimselect.min.css') }}">
<script src="{{ asset('admin_assets/plugins/jquery/dist/jquery.min.js') }}"></script>
<!-- slim-select -->
<script src="{{ asset('admin_assets/plugins/slim-select/slimselect.min.js') }}"></script>


<script>
    var permission_select = new SlimSelect({
        select: '#permissions-select select',
        //showSearch: false,
        placeholder: 'Select Permissions',
        deselectLabel: '<span>&times;</span>',
        hideSelectedOption: true,
    })

    $('#permissions-select #permission-select-all').click(function() {
        var options = [];
        $('#permissions-select select option').each(function() {
            options.push($(this).attr('value'));
        });

        permission_select.set(options);
    })

    $('#permissions-select #permission-deselect-all').click(function() {
        permission_select.set([]);
    })
</script>
@endsection