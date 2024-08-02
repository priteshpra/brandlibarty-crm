@extends('layouts.admin')
@section('content')
<div class="page-content">
    <div class="container" style="margin-right: -80px;">
        <div class="row">
            <div class="col-12 mb-3">
                <label class="label-text-title color-heading font-medium mb-2">Ai Assistant</label>
                <div class="my-custom-select-box">
                    <!-- Dropdown and select code here -->
                    <select class="form-control selectpicker" title="Select" name="sub_category_id">
                        <option value="">Select</option>
                        <optgroup label="Writer">
                            <option value="1" selected>Description</option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="col-12 mb-3">
                <label class="label-text-title color-heading font-medium mb-2">Ai Assistant</label>
                <div class="my-custom-select-box">
                    <!-- Dropdown and select code here -->
                    <select class="form-control selectpicker" title="Select" name="sub_category_id">
                        <option value="">Select</option>
                        <optgroup label="Writer">
                            <option value="1" selected>Description</option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="col-12 mb-3">
                <label class="label-text-title color-heading font-medium mb-2">Prampot</label>
                <textarea class="form-control" name="description" placeholder="Headline"></textarea>
            </div>
            <div class="col-12 mb-3">
                <label class="label-text-title color-heading font-medium mb-2">Act As</label>
                <input type="text" class="form-control" name="product_service" placeholder="eg. Creator">
            </div>
            <!-- Separate div for Nastavenie section -->
            <div class="col-12 mb-3 custom-accordion">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header pb-2" id="headingTwo">
                            <button class="accordion-button label-text-title color-heading font-medium bg-transparent p-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                Setup
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body px-0 pt-0">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="label-text-title color-heading font-medium mb-2">Creativity</label>
                                        <select name="creativity_level" id="creativity_level" class="form-control">
                                            <option value="0.0">None</option>
                                            <option value="0.2">Low</option>
                                            <option value="0.35">Optimal</option>
                                            <option value="0.5">Medium</option>
                                            <option value="0.8">High</option>
                                            <option value="1.0">Max</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="label-text-title color-heading font-medium mb-2">Outputs</label>
                                        <select name="output" id="output" class="form-control">
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="label-text-title color-heading font-medium mb-2">Character</label>
                                        <input type="number" min="4" name="character" id="character" class="form-control" placeholder="Character" value="1500" max="5000" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="label-text-title color-heading font-medium mb-2">Tone of
                                            voice</label>
                                        <select name="tone_of_voice" id="tone_of_voice" class="form-control">
                                            <option value="Formal">Assertive</option>
                                            <option value="Informative">Authoritative</option>
                                            <option value="Friendly">Accusatory</option>
                                            <option value="Playful">Casual</option>
                                            <option value="Authoritative">Absurd</option>
                                            <option value="Empathetic">Amused</option>
                                            <option value="Empathetic">Apathy</option>
                                            <option value="Empathetic">Information</option>
                                            <option value="Empathetic">Admiring</option>
                                            <option value="Empathetic">Aggression</option>
                                            <option value="Empathetic">Cheerful</option>
                                            <option value="Empathetic">Conversational</option>
                                            <option value="Empathetic">Humorous</option>
                                            <option value="Empathetic">Irreverent</option>
                                            <option value="Empathetic">Ambivalence</option>
                                            <option value="Empathetic">Appreciative</option>
                                            <option value="Empathetic">Formal</option>
                                            <option value="Empathetic">Friendly</option>
                                            <option value="Empathetic">Animated</option>
                                            <option value="Empathetic">Acerbic</option>
                                            <option value="Empathetic">Anger</option>
                                            <option value="Empathetic">Edgy</option>
                                            <option value="Empathetic">Optimistic</option>
                                            <option value="Empathetic">Arrogant</option>



                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="label-text-title color-heading font-medium mb-2">Target
                                            Audience</label>
                                        <input type="text" class="form-control" name="target_action" placeholder="e.g. a six year old child">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="label-text-title color-heading font-medium mb-2">Language</label>
                                        <select name="language" id="language" class="form-control">
                                            <option value="Bengali">Bengali</option>
                                            <option value="Chinese (Simplified)">Chinese (Simplified)</option>
                                            <option value="Chinese (Traditional)">Chinese (Traditional)</option>
                                            <option value="Dutch">Dutch</option>
                                            <option value="Danish">Danish</option>
                                            <option value="English" selected="">English</option>
                                            <option value="French">French</option>
                                            <option value="German">German</option>
                                            <option value="Hebrew">Hebrew</option>
                                            <option value="Hindi">Hindi</option>
                                            <option value="Indonesian">Indonesian</option>
                                            <option value="Italian">Italian</option>
                                            <option value="Japanese">Japanese</option>
                                            <option value="Korean">Korean</option>
                                            <option value="Malay">Malay</option>
                                            <option value="Norwegian">Norwegian</option>
                                            <option value="Persian (Farsi)">Persian (Farsi)</option>
                                            <option value="Polish">Polish</option>
                                            <option value="Portuguese">Portuguese</option>
                                            <option value="Punjabi">Punjabi</option>
                                            <option value="Romanian">Romanian</option>
                                            <option value="Russian">Russian</option>
                                            <option value="Spanish">Spanish</option>
                                            <option value="Swedish">Swedish</option>
                                            <option value="Tamil">Tamil</option>
                                            <option value="Telugu">Telugu</option>
                                            <option value="Thai">Thai</option>
                                            <option value="Turkish">Turkish</option>
                                            <option value="Ukrainian">Ukrainian</option>
                                            <option value="Urdu">Urdu</option>
                                            <option value="Vietnamese">Vietnamese</option>
                                            <option value="Serbian">Serbian</option>
                                            <option value="Croatian">Croatian</option>
                                            <option value="Albanian">Albanian</option>
                                            <option value="Macedonian">Macedonian</option>
                                            <option value="Marathi">Marathi</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Button Section -->
            <div class="col-12 mb-25">
                <button class="btn btn-primary" id="submit-btn" type="submit">
                    <span class="spinner-border spinner-border-sm me-2 d-none" role="status" aria-hidden="true"></span>
                    Create
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--material-symbols font-20 ms-2" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24" data-icon="material-symbols:arrow-right-alt-rounded">
                        <path fill="currentColor" d="M16.15 13H5q-.425 0-.712-.288T4 12t.288-.712T5 11h11.15L13.3 8.15q-.3-.3-.288-.7t.288-.7q.3-.3.713-.312t.712.287L19.3 11.3q.15.15.213.325t.062.375t-.062.375t-.213.325l-4.575 4.575q-.3.3-.712.288t-.713-.313q-.275-.3-.288-.7t.288-.7z">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="container" style="margin-right: -90px;">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-8 col-xxl-8">
                <div id="appendOutput">
                    <div class="ai-assistant-rightside bg-white radius-10 h-100 border-4 p-20 output-block">
                        <div class="ai-assistant-editor-wrap theme-border radius-10">
                            <textarea name="content" class="editor" style="display: none;"></textarea>
                            <div id="editor" class="ck ck-reset ck-editor ck-rounded-corners" role="application" dir="ltr" lang="en">
                                <!-- Editor toolbar -->
                                <div class="ck ck-toolbar">
                                    <!-- Heading dropdown -->
                                    <div class="ck ck-dropdown ck-heading-dropdown">
                                        <button class="ck ck-button ck-off ck-button_with-text ck-dropdown__button" type="button" tabindex="-1">
                                            <svg class="ck ck-icon ck-dropdown__arrow" viewBox="0 0 10 10">
                                                <path d="M.941 4.523a.75.75 0 1 1 1.06-1.06l3.006 3.005 3.005-3.005a.75.75 0 1 1 1.06 1.06l-3.549 3.55a.75.75 0 0 1-1.168-.136L.941 4.523z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    <!-- Other toolbar buttons -->
                                    <button class="ck ck-button ck-off" type="button" tabindex="-1">
                                        <i class="bi bi-type-bold"></i>
                                    </button>
                                    <button class="ck ck-button ck-off" type="button" tabindex="-1">
                                        <i class="bi bi-type-italic"></i>
                                    </button>
                                    <button class="ck ck-button ck-off" type="button" tabindex="-1">
                                        <i class="bi bi-link"></i>
                                    </button>
                                    <button class="ck ck-button ck-off" type="button" tabindex="-1">
                                        <i class="bi bi-list-ul"></i>
                                    </button>
                                    <button class="ck ck-button ck-off" type="button" tabindex="-1">
                                        <i class="bi bi-list-ol"></i>
                                    </button>
                                    <button class="ck ck-button ck-off" type="button" tabindex="-1">
                                        <i class="bi bi-image"></i>
                                    </button>
                                    <button class="ck ck-button ck-off" type="button" tabindex="-1">
                                        <i class="bi bi-blockquote-left"></i>
                                    </button>
                                    <button class="ck ck-button ck-off" type="button" tabindex="-1">
                                        <i class="bi bi-table"></i>
                                    </button>
                                    <button class="ck ck-button ck-off" type="button" tabindex="-1">
                                        <i class="bi bi-camera"></i>
                                    </button>
                                    <button class="ck ck-button ck-off" type="button" tabindex="-1">
                                        <i class="bi bi-chat-left-text"></i>
                                    </button>
                                </div>
                                <!-- Editor content -->
                                <div class="ck ck-editor__main">
                                    <div class="ck ck-editor__editable ck-rounded-corners ck-editor__editable_inline" role="textbox" aria-multiline="true" contenteditable="true">
                                        <p>This is where your rich text editor content will appear.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@ckeditor/ckeditor5-build-classic@31.1.0/build/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <!-- END layout-wrapper -->
</div>

@endsection