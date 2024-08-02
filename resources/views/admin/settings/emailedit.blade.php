@extends('layouts.admin')
@section('content')
<div class="page-content">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="page-title">Settings</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('settings.edit',401)}}">Settings</a></li>
                    <li class="breadcrumb-item active">Email Settings</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <!-- Settings Menu -->
            <div class="settings-menu-links">
                <ul class="nav nav-tabs menu-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('settings.edit',401)}}">General Settings</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('emailsettings.edit',402)}}">Email Settings</a>
                    </li>
                </ul>
            </div>
            <!-- Settings Menu -->

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body pt-0">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title">PHP Mail</h5>
                                <div class="status-toggle d-flex justify-content-between align-items-center">
                                    <input {{ $setting[0]['PhpMail'] == 1 ? 'checked': '' }} name="PhpMail" type="checkbox" id="status_1" class="check">
                                    <label for="status_1" class="checktoggle">checkbox</label>
                                </div>
                            </div>
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <form class="needs-validation" novalidate action="{{ route('emailsettings.update', 401) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="settings-form">
                                    <div class="form-group form-placeholder">
                                        <label>Email From Address <span class="star-red">*</span></label>
                                        <input value="{{ $setting[0]['EmailFrom'] }}" name="EmailFrom" type="text" class="form-control">
                                    </div>
                                    <div class="form-group form-placeholder">
                                        <label>Email Password <span class="star-red">*</span></label>
                                        <input value="{{ $setting[0]['EmailPassword'] }}" name="EmailPassword" type="text" class="form-control">
                                    </div>
                                    <div class="form-group form-placeholder">
                                        <label>Emails From Name <span class="star-red">*</span></label>
                                        <input value="{{ $setting[0]['EmailFromName'] }}" name="EmailFromName" type="text" class="form-control">
                                    </div>
                                    <div class="form-group mb-0">
                                        <div class="settings-btns">
                                            <button type="submit" class="btn btn-orange">Submit</button>
                                            <button type="submit" class="btn btn-grey">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="display: none;">
                    <div class="card">
                        <div class="card-body pt-0">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title">SMTP</h5>
                                <div class="status-toggle d-flex justify-content-between align-items-center">
                                    <input type="checkbox" id="status_2" class="check">
                                    <label for="status_2" class="checktoggle">checkbox</label>
                                </div>
                            </div>
                            <form>
                                <div class="settings-form">
                                    <div class="form-group form-placeholder">
                                        <label>Email From Address <span class="star-red">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group form-placeholder">
                                        <label>Email Password <span class="star-red">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group form-placeholder">
                                        <label>Email Host <span class="star-red">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group form-placeholder">
                                        <label>Email Port <span class="star-red">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group mb-0">
                                        <div class="settings-btns">
                                            <button type="submit" class="btn btn-orange">Submit</button>
                                            <button type="submit" class="btn btn-grey">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection