@extends('layouts.admin')
@section('content')
<div class="page-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('category.index') }}">
                        <h4 class="card-title">CATEGORY</h4>
                    </a>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate action="{{ route('category.update',$category->CategoryID) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationTooltip01">Category Name</label>
                                    <input type="text" class="form-control" value="{{ $category->CategoryName }}" name="CategoryName" id="validationTooltip01" placeholder="Category name" tabindex="1" Maxlength="50" required autofocus>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="d-block">Business Category</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" {{ $category->BusinessCategory == 1 ? 'checked': '' }} type="radio" name="BusinessCategory" id="businesscategory_legal" value="1" checked="checked" tabindex="2">
                                        <label class="form-check-label" for="businesscategory_legal">Legal</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" {{ $category->BusinessCategory == 2 ? 'checked': '' }} type="radio" name="BusinessCategory" id="businesscategory_accounting" value="2" tabindex="3">
                                        <label class="form-check-label" for="businesscategory_accounting">Accounting</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" {{ $category->BusinessCategory == 3 ? 'checked': '' }} type="radio" name="BusinessCategory" id="businesscategory_hr" value="3" tabindex="4">
                                        <label class="form-check-label" for="businesscategory_hr">HR</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationTooltip01">Meta Title</label>
                                    <input type="text" class="form-control" value="{{ $category->MetaTitle }}" name="MetaTitle" id="validationTooltip01" placeholder="Meta Title" tabindex="3" Maxlength="60">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationTooltip01">Meta Keyword</label>
                                    <input type="text" class="form-control" name="MetaKeywords" value="{{ $category->MetaKeywords }}" id="validationTooltip02" placeholder="Category name" tabindex="4" Maxlength="200">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationTooltip01">Meta Description</label>
                                    <input type="text" class="form-control" value="{{ $category->MetaDescription }}" name="MetaDescription" id="validationTooltip03" placeholder="Category name" tabindex="5" Maxlength="1000">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="custom-control form-check mb-3">
                                    <input type="checkbox" {{ $category->Status == 1 ? 'checked': '' }} class="form-check-input" name="Status" id="statuscheck" tabindex="6" required>
                                    <label class="form-check-label" for="statuscheck">Status</label>
                                    <div class="invalid-feedback">Select Status value</div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="text-end settings-btns">
                                <button type="submit" class="btn btn-orange" tabindex="7">SUBMIT</button>
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