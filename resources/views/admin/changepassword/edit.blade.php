@extends('layouts.admin')
@section('content')
<div class="content container-fluid content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="acc-wrap">
                <h6>Change Password</h6>
            </div>
            <div class="row">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <form class="needs-validation" novalidate action="{{ route('changepassword.update', $id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="col-md-4">
                        <div class="form-group form-focus">
                            <input name="currentpass" type="password" class="form-control floating" required>
                            <label class="focus-label">Current Password</label>
                        </div>
                        <div class="form-group form-focus">
                            <input name="password" id="pass" type="password" class="form-control floating" required>
                            <label class="focus-label">New Password</label>
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-focus">
                            <input name="password_confirmation" id="pass2" type="password" class="form-control floating" required>
                            <label class="focus-label">Verify Password</label>
                            <span id="errorpass"></span>
                            @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-auto">
                        <div class="col-md-12">
                            <div class="submit-sec">
                                <button type="submit" id="saveChange" class="btn btn-primary">Save Changes</button>
                                <button class="btn btn-secondary">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection