@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Add New Permission</h5>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('permissions.store') }}">
            @csrf
            <div class="form-group row">
                <label for="name" class="required col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-8">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <div class="text-end settings-btns">
                        <button type="submit" class="btn btn-orange" tabindex="14">SUBMIT</button>
                        <button type="button" onclick="window.history.go(-1); return false;" class="btn btn-grey" tabindex="15">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection