@extends('layouts.admin')
@section('content')
<div class="page-content">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <a class="text-black" href="{{route('settings.edit',401)}}">
                    <h3 class="page-title">SETTINGS</h3>
                </a>
            </div>
        </div>
    </div>
    <!-- Settings Menu -->
    <div class="settings-menu-links">
        <ul class="nav nav-tabs menu-tabs">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('settings.edit',401)}}">General Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('emailsettings.edit',401)}}">Email Settings</a>
            </li>
        </ul>
    </div>
    <!-- Settings Menu -->

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body pt-0">
                    <div class="card-header">
                        <h5 class="card-title">COMPANY ADDRESS DETAILS</h5>
                    </div>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <form class="needs-validation" novalidate action="{{ route('settings.update', 401) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="settings-form">
                            <div class="form-group">
                                <label>Company Name <span class="star-red">*</span></label>
                                <input type="text" value="{{ $setting[0]['CompanyName'] }}" name="CompanyName" class="form-control" id="validationTooltip01" placeholder="Enter Company Name" tabindex="1" Maxlength="70" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>Address Line 1 <span class="star-red">*</span></label>
                                <input type="text" value="{{ $setting[0]['Address1'] }}" name="Address1" class="form-control" id="validationTooltip02" placeholder="Enter Address Line 1" tabindex="2" Maxlength="100" required>
                            </div>
                            <div class="form-group">
                                <label>Address Line 2 <span class="star-red">*</span></label>
                                <input type="text" value="{{ $setting[0]['Address2'] }}" name="Address2" class="form-control" id="validationTooltip03" placeholder="Enter Address Line 2" tabindex="3" Maxlength="100" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country <span class="star-red">*</span></label>
                                        <select name="CountryID" class="select form-control" required>
                                            <option selected="selected">Select</option>
                                            @foreach ($country as $country)
                                            <option value="{{ $country->CountryID }}" {{ $setting[0]['CountryID'] == $country->CountryID ? 'selected': '' }}>{{ $country->CountryName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>State <span class="star-red">*</span></label>
                                        <select name="StateID" class="select form-control" required>
                                            <option selected="selected">Select</option>
                                            @foreach ($state as $state)
                                            <option value="{{ $state->StateID }}" {{ $setting[0]['StateID'] == $state->StateID ? 'selected': '' }}>{{ $state->StateName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>City <span class="star-red">*</span></label>
                                        <input value="{{ $setting[0]['CityName'] }}" name="CityName" type="text" class="form-control" id="validationTooltip04" placeholder="Enter City Name" tabindex="4" Maxlength="50" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Zip/Postal Code <span class="star-red">*</span></label>
                                        <input value="{{ $setting[0]['PostCode'] }}" name="PostCode" type="text" class="form-control" id="validationTooltip05" placeholder="Enter Zip/Postal Code" tabindex="5" Maxlength="10" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone <span class="star-red">*</span></label>
                                        <input value="{{ $setting[0]['Phone'] }}" name="Phone" type="text" class="form-control" id="validationTooltip06" placeholder="Enter Phone" tabindex="6" Maxlength="10" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email <span class="star-red">*</span></label>
                                        <input value="{{ $setting[0]['Email'] }}" name="Email" type="email" class="form-control" id="validationTooltip07" placeholder="Enter Email" tabindex="7" Maxlength="50" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pan Card <span class="star-red">*</span></label>
                                        <input value="{{ $setting[0]['PanCard'] }}" name="PanCard" type="text" class="form-control" id="validationTooltip08" placeholder="Enter Pan Card" tabindex="8" Maxlength="10" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>GST No <span class="star-red">*</span></label>
                                        <input value="{{ $setting[0]['GSTNo'] }}" name="GSTNo" type="text" class="form-control" id="validationTooltip09" placeholder="Enter GST No" tabindex="9" Maxlength="15" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>CIN <span class="star-red">*</span></label>
                                        <input value="{{ $setting[0]['CIN'] }}" name="CIN" type="text" class="form-control" id="validationTooltip10" placeholder="Enter CIN" tabindex="10" Maxlength="21" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>State Code <span class="star-red">*</span></label>
                                        <input value="{{ $setting[0]['StateCode'] }}" name="StateCode" type="text" class="form-control" id="validationTooltip11" placeholder="Enter State Code" tabindex="11" Maxlength="2" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>CGST %<span class="star-red">*</span></label>
                                        <input value="{{ $setting[0]['CGST'] }}" name="CGST" type="text" class="form-control" id="validationTooltip12" placeholder="Enter CGST % value" tabindex="12" Maxlength="2" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>SGST %<span class="star-red">*</span></label>
                                        <input name="SGST" value="{{ $setting[0]['SGST'] }}" type="text" class="form-control" id="validationTooltip13" placeholder="Enter SGST % value" tabindex="13" Maxlength="2" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>IGST %<span class="star-red">*</span></label>
                                        <input name="IGST" value="{{ $setting[0]['IGST'] }}" type="text" class="form-control" id="validationTooltip14" placeholder="Enter IGST % value" tabindex="14" Maxlength="2" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>HSN Code<span class="star-red">*</span></label>
                                        <input value="{{ $setting[0]['HSNCode'] }}" name="HSNCode" type="text" class="form-control" id="validationTooltip17" placeholder="Enter HSN Code" tabindex="15" Maxlength="2" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Courier Charges(Guj.)<span class="star-red">*</span></label>
                                        <input value="{{ $setting[0]['CourierChargeGuj'] }}" name="CourierChargeGuj" type="text" class="form-control" id="validationTooltip15" placeholder="Enter Courier Charges(Guj.)" tabindex="16" Maxlength="2" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Courier Charges(Outside Guj.)<span class="star-red">*</span></label>
                                        <input value="{{ $setting[0]['CourierChargeOut'] }}" name="CourierChargeOut" type="text" class="form-control" id="validationTooltip16" placeholder="Enter Courier Charges(Outside Guj.)" tabindex="17" Maxlength="2" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="settings-btns">
                                    <button type="submit" class="btn btn-orange" tabindex="18">UPDATE</button>
                                    <button type="button" onclick="window.history.go(-1); return false;" class="btn btn-grey" tabindex="19">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body pt-0">
                    <div class="card-header">
                        <h5 class="card-title">SOFTWARE BASIC DETAILS</h5>
                    </div>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <form class="needs-validation" novalidate action="{{ route('settings.update', 402) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="settings-form">
                            <div class="form-group">
                                <p class="settings-label">Logo <span class="star-red">*</span></p>
                                <div class="settings-btn">
                                    <input value="{{ $setting[0]['Logo'] }}" name="Logo" type="file" accept="image/*" name="image" id="file" class="hide-input" {{ ($setting[0]['Logo']) ? '' : required }}>
                                    <label for="file" class="upload">
                                        <i class="feather-upload"></i>
                                    </label>
                                </div>
                                <h6 class="settings-size">Recommended image size is <span>150px x 150px</span></h6>
                                @if ($setting[0]['Logo'])
                                <div class="upload-images">
                                    <img src="{{asset('uploads/settings')}}/dw-logo.png" alt="Image">
                                    <a href="javascript:void(0);" class="btn-icon logo-hide-btn">
                                        <i class="feather-x-circle"></i>
                                    </a>
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <p class="settings-label">Favicon <span class="star-red">*</span></p>
                                <div class="settings-btn">
                                    <input value="{{ $setting[0]['Favicon'] }}" name="Favicon" type="file" accept="image/*" name="image" id="file" class="hide-input" {{ ($setting[0]['Favicon']) ? '' : required }}>
                                    <label for="file" class="upload">
                                        <i class="feather-upload"></i>
                                    </label>
                                </div>
                                <h6 class="settings-size">
                                    Recommended image size is <span>16px x 16px or 32px x 32px</span>
                                </h6>
                                <h6 class="settings-size mt-1">Accepted formats: only png and ico</h6>
                                @if ($setting[0]['Favicon'])
                                <div class="upload-images upload-size">
                                    <img src="{{asset('uploads/settings')}}/favicon.png" alt="Image">
                                    <a href="javascript:void(0);" class="btn-icon logo-hide-btn">
                                        <i class="feather-x-circle"></i>
                                    </a>
                                </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-lg-5 col-md-6">
                                    <div class="form-group">
                                        <div class="status-toggle d-flex justify-content-between align-items-center">
                                            <p class="mb-0">RTL</p>
                                            <input {{ $setting[0]['RTL'] == 1 ? 'checked': '' }} name="RTL" type="checkbox" id="status_1" class="check">
                                            <label for="status_1" class="checktoggle">checkbox</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="settings-btns">
                                    <button type="submit" class="btn btn-orange">UPDATE</button>
                                    <button type="submit" class="btn btn-grey">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Settings -->
</div>
@endsection