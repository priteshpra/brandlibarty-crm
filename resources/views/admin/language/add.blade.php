@extends('layouts.admin')
@section('content')
<div class="page-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="language.html">
                        <h4 class="card-title">LANGUAGE</h4>
                    </a>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate action="{{route('language.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationTooltip01">Language Name</label>
                                    <input type="text" class="form-control" name="LanguageName" id="validationTooltip01" placeholder="Language name" tabindex="1" Maxlength="50" required autofocus>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="custom-control form-check mb-3">
                                        <input type="checkbox" class="form-check-input" name="Status" id="statuscheck" tabindex="5" required>
                                        <label class="form-check-label" for="statuscheck">Status</label>
                                        <div class="invalid-feedback">Select Status value</div>
                                        <input type="hidden" name="CreatedBy" value="{{ $ModifiedBy }}" />
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