@extends('layouts.admin')
@section('content')
<div class="page-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('cms.index') }}">CONTENT MANAGEMENT SYSTEM</a>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate action="{{ route('cms.update', $cm->CMSID) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Page <span class="star-red">*</span></label>
                                    <select class="select form-control" name="PageID" tabindex="1" required>
                                        <option selected="selected">Select</option>
                                        <option value="1" {{ $cm->CMSID == "1" ? 'selected': '' }}>About Us</option>
                                        <option value="2" {{ $cm->CMSID == "2" ? 'selected': '' }}>Privacy Policy</option>
                                        <option value="3" {{ $cm->CMSID == "3" ? 'selected': '' }}>Terms and Conditions</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea id="summernote" rows="5" cols="5" class="form-control summernote" name="Content" placeholder="Enter Content" tabindex="2" required>{{ $cm->Content }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="custom-control form-check mb-3">
                                    <input type="checkbox" class="form-check-input" name="Status" {{ $cm->Status == 1 ? 'checked': '' }} id="statuscheck" tabindex="3" required>
                                    <label class="form-check-label" for="statuscheck">Status</label>
                                    <div class="invalid-feedback">Select Status value</div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="text-end settings-btns">
                                <button type="submit" class="btn btn-orange" tabindex="4">SUBMIT</button>
                                <button type="button" onclick="window.history.go(-1); return false;" class="btn btn-grey" tabindex="15">Cancel</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('/assets/admin/editor/jquery-3.4.1.slim.min.js') }}"></script>
<link href="{{ asset('/assets/admin/editor/summernote-lite.min.css') }}" rel="stylesheet">
<script src="{{ asset('/assets/admin/editor/summernote-lite.min.js') }}"></script>
<script>
    $('.summernote').summernote({
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],
        ],
        tabsize: 2,
        height: 450,
        width: 1000
    });
</script>
@endsection