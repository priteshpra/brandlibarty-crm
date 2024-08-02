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
                    <form class="needs-validation" novalidate action="{{ route('language.update', $language->LanguageID) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationTooltip01">Language Name</label>
                                    <input type="text" value="{{ $language->LanguageName }}" class="form-control" name="LanguageName" id="validationTooltip01" placeholder="Language name" tabindex="1" Maxlength="50" required autofocus>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="custom-control form-check mb-3">
                                        <input type="checkbox" name="Status" class="form-check-input" id="statuscheck" tabindex="5" required {{ $language->Status == 1 ? 'checked': '' }}>
                                        <label class="form-check-label" for="statuscheck">Status</label>
                                        <div class="invalid-feedback">Select Status value</div>
                                        <input type="hidden" name="ModifiedBy" value="{{ $ModifiedBy }}" />
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