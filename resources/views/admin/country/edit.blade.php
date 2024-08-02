@extends('layouts.admin')
@section('content')
<div class="page-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="country.html">
                        <h4 class="card-title">COUNTRY</h4>
                    </a>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate action="{{ route('country.update', $country->CountryID) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationTooltip01">Country Name</label>
                                    <input type="text" class="form-control" name="CountryName" id="validationTooltip01" placeholder="Country name" value="{{ $country->CountryName }}" tabindex="1" Maxlength="50" required autofocus>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="custom-control form-check mb-3">
                                        <input type="checkbox" class="form-check-input" name="Status" id="statuscheck" tabindex="5" required {{ $country->Status == 1 ? 'checked': '' }}>
                                        <label class="form-check-label" for="statuscheck">Status</label>
                                        <div class="invalid-feedback">Select Status value</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="text-end settings-btns">
                                <button type="submit" class="btn btn-orange" tabindex="6">SUBMIT</button>
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