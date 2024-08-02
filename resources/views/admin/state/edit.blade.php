@extends('layouts.admin')
@section('content')
<div class="page-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="route('state.index') }}">
                        <h4 class="card-title">STATE</h4>
                    </a>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate action="{{ route('state.update', $state->StateID) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State Name <span class="star-red">*</span></label>
                                    <input type="text" class="form-control" value="{{ $state->StateName }}" name="StateName" id="validationTooltip01" placeholder="State name" tabindex="1" Maxlength="50" required autofocus>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country <span class="star-red">*</span></label>
                                    <select class="form-select" required name="CounutryID">
                                        <option value="">Select Country Name</option>
                                        @foreach ($country as $country)
                                        <option value="{{ $country->CountryID }}" {{ $state->CountryID == $country->CountryID ? 'selected': '' }}>{{ $country->CountryName }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Select Country Name</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="custom-control form-check mb-3">
                                    <input type="checkbox" class="form-check-input" name="Status" id="statuscheck" tabindex="2" required {{ $state->Status == 1 ? 'checked': '' }}>
                                    <label class="form-check-label" for="statuscheck">Status</label>
                                    <div class="invalid-feedback">Select Status value</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-end settings-btns">
                                <button type="submit" class="btn btn-orange" tabindex="3">SUBMIT</button>
                                <button type="button" onclick="window.history.go(-1); return false;" class="btn btn-grey" tabindex="15">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection