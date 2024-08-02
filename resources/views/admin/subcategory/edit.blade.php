@extends('layouts.admin')
@section('content')
<div class="page-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="route('subcategory.index') }}">
                        <h4 class="card-title">SUB CATEGORY</h4>
                    </a>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate action="{{ route('subcategory.update', $state->StateID) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sub Category Name <span class="star-red">*</span></label>
                                    <input type="text" name="SubCategoryName" class="form-control" id="validationTooltip01" placeholder="Sub Category name" tabindex="1" Maxlength="50" required autofocus>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Category <span class="star-red">*</span></label>
                                    <select class="form-select" required name="CategoryID">
                                        <option value="">Select Category Name</option>
                                        @foreach ($category as $category)
                                        <option value="{{ $category->CategoryID }}" {{ $category->CategoryID == $subcategory->CategoryID ? 'selected': '' }}>{{ $category->CategoryName }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Select Category Name</div>
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