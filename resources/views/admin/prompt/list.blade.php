@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/admin/css/promptlist.css') }}">
<div class="page-content">
    <!-- button div -->
    <div class="add-prompt-container">
        <button class="add-prompt-button" data-bs-toggle="modal" data-bs-target="#addProjectModal">+ Add New
            Prompt</button>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <!-- main prompt table-->

    <div class="table-wrapper">
        <table class="table" id="projectTable">
            <thead>
                <tr>
                    <th>Prompt Name</th>
                    <th>Language</th>
                    <th>Tone of Voice</th>
                    <th>Acts As</th>
                    <th>Character</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Table rows (add your data dynamically or statically) -->
                @foreach($prompt as $pr)
                <tr>
                    <td>{{ $pr->prompt }}</td>
                    <td>{{ $pr->language }}</td>
                    <td>{{ $pr->tone_of_voice }}</td>
                    <td>{{ $pr->act_as }}</td>
                    <td>{{ $pr->character }}</td>
                    <td style="display: none;">{{ $pr->id }}</td>
                    <td>
                        <button class="btn btn-sm btn-primary edit-btn" data-id="{{ $pr->id }}"><i class="fas fa-pencil-alt"></i></button>
                        <form action="{{ route('prompt.destroy', $pr->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger delete-btn"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addProjectModal" tabindex="-1" role="dialog" aria-labelledby="addProjectModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProjectModalLabel">Add New Prompt</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <span id="PUTMethod"> @method('PUT')</span>
                <form id="projectForm" name="projectForm" method="POST" action="{{ route('prompt.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div id="PUT"></div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="prompt" class="form-label">Prompt Name</label>
                            <input type="text" class="form-control" id="prompt" name="prompt" placeholder="Enter Prompt Name">
                        </div>
                        <div class="mb-3">
                            <label for="language" class="form-label">Language</label>
                            <select class="form-select" id="language" name="language">
                                <!-- Language options -->
                                <option value="Bengali">Bengali</option>
                                <option value="Chinese (Simplified)">Chinese (Simplified)</option>
                                <option value="Chinese (Traditional)">Chinese (Traditional)</option>
                                <option value="Dutch">Dutch</option>
                                <option value="Danish">Danish</option>
                                <option value="English" selected>English</option>
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
                        <div class="mb-3">
                            <label for="tone_of_voice" class="form-label">Tone of Voice</label>
                            <select class="form-select" id="tone_of_voice" name="tone_of_voice">
                                <!-- Tone of Voice options -->
                                <option value="Accusatory">Accusatory</option>
                                <option value="Casual">Casual</option>
                                <option value="Absurd">Absurd</option>
                                <option value="Amused">Amused</option>
                                <option value="Apathy">Apathy</option>
                                <option value="Information">Information</option>
                                <option value="Admiring">Admiring</option>
                                <option value="Aggression">Aggression</option>
                                <option value="Cheerful">Cheerful</option>
                                <option value="Conversational">Conversational</option>
                                <option value="Humorous">Humorous</option>
                                <option value="Irreverent">Irreverent</option>
                                <option value="Ambivalence">Ambivalence</option>
                                <option value="Appreciative">Appreciative</option>
                                <option value="Formal">Formal</option>
                                <option value="Friendly">Friendly</option>
                                <option value="Animated">Animated</option>
                                <option value="Acerbic">Acerbic</option>
                                <option value="Anger">Anger</option>
                                <option value="Edgy">Edgy</option>
                                <option value="Optimistic">Optimistic</option>
                                <option value="Arrogant">Arrogant</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="act_as" class="form-label">Act As</label>
                            <input type="text" class="form-control" id="act_as" name="act_as" placeholder="e.g. Creator">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Character</label>
                            <input type="number" min="4" name="character" id="character" class="form-control" placeholder="Character" value="1500" max="5000" required>
                        </div>
                    </div>
                    <div style="display: none;" id="getEditdata">
                        <p>Prompt: Write an article on [Keyword]</p>
                        <p>Instructions:</p>
                        <p>Act as a: <span id="ActVal">[Expert/Professional/Enthusiast/Journalist]</span><br />

                            Language: <span id="langVal">[English/Spanish/French/etc.]</span><br />

                            Tone of voice: <span id="toneVal">[Friendly/Professional/Casual/Formal/Inspirational]</span>
                            <br />
                            Target audience: <span id="audioVal">[Beginners/Intermediate/Advanced/General Audience]</span>
                            <br />
                            Word count: <span id="replceVal">[500/1000/1500/etc.]</span>
                            <br />
                            <br />

                            Article structure:
                            <br />
                            Introduction:
                            Start with a compelling hook related to [Keyword].
                            Provide an overview of what the article will cover.
                            <br />
                            <br />
                            Main Body:<br />
                            <br />
                            Section 1: Overview of [Keyword]
                            Explain what [Keyword] is and its importance.
                            Include any relevant history or background information.
                            <br />
                            <br />
                            Section 2: Key Aspects of [Keyword]
                            Discuss the main features, benefits, or components of [Keyword].
                            Use bullet points or subheadings for clarity.
                            <br />
                            <br />
                            Section 3: Practical Applications/Tips
                            Provide practical advice, tips, or examples on how to use or implement [Keyword].
                            Include real-life examples or case studies if possible.
                            <br />
                            <br />
                            Conclusion:
                            Summarize the key points discussed in the article.
                            Encourage readers to take action or learn more about [Keyword].
                            End with a call to action, such as subscribing to a newsletter, visiting a website, or trying out a product/service.
                        </p>
                        <p>Additional Elements:</p>
                        <p>Images: Include relevant images or infographics to enhance the content.
                            Links: Add links to reputable sources for further reading or references.
                            <br />
                            <br />
                            SEO Considerations:<br />

                            Meta Description: Write a concise and engaging meta description summarizing the article.
                            <br />
                            Keywords: Use [Keyword] and related terms naturally throughout the article.
                        </p>
                    </div>
                    <textarea name="content" class="editor" id="editor">
                    <p>Prompt: Write an article on [Keyword]</p>
                        <p>Instructions:</p>
                        <p>Act as a: [Expert/Professional/Enthusiast/Journalist]<br/>
                            Language: [English/Spanish/French/etc.]<br/>
                            Tone of voice: [Friendly/Professional/Casual/Formal/Inspirational]<br/>
                            Target audience: [Beginners/Intermediate/Advanced/General Audience]<br/>
                            Word count: [500/1000/1500/etc.]<br/>

                            Article structure:<br/>
                            Introduction:<br/>

                            Start with a compelling hook related to [Keyword].
                            Provide an overview of what the article will cover.

                            Main Body:<br/>
                            <br/>
                            Section 1: Overview of [Keyword]
                            Explain what [Keyword] is and its importance.
                            Include any relevant history or background information.<br/>
                            <br/>
                            Section 2: Key Aspects of [Keyword]
                            Discuss the main features, benefits, or components of [Keyword].
                            Use bullet points or subheadings for clarity.<br/>
                            <br/>
                            Section 3: Practical Applications/Tips
                            Provide practical advice, tips, or examples on how to use or implement [Keyword].
                            Include real-life examples or case studies if possible.
                            Conclusion:<br/>
                            <br/>
                            Summarize the key points discussed in the article.
                            Encourage readers to take action or learn more about [Keyword].
                            End with a call to action, such as subscribing to a newsletter, visiting a website, or trying out a product/service.</p>

                        <p>Additional Elements:</p>
                        <p>Images: Include relevant images or infographics to enhance the content.
                            Links: Add links to reputable sources for further reading or references.
                            <br/>
                            <br/>
                            SEO Considerations:<br/>

                            Meta Description: Write a concise and engaging meta description summarizing the article.
                            <br/>
                            Keywords: Use [Keyword] and related terms naturally throughout the article.</p>
                    </textarea>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close">Close</button>
                        <button type="button" class="btn btn-primary" id="submit-btn">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap Bundle with Popper -->
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('body').on('click', '.edit-btn', function() {
            var prId = $(this).attr("data-id");
            $.ajax({
                url: 'getPromptData',
                type: 'GET',
                data: {
                    promptID: prId
                },
                success: function(response) {
                    if (response.description) {
                        var getEditorDAta = response.description;
                        editor.setData(getEditorDAta);
                    }
                    console.log(response);
                }
            });
        });
    });
    $(document).ready(function(event) {

        $('#character').keyup(function() {
            var dInput = this.value;
            var ckVal = $("#replceVal").html();
            var ActVal = $("#ActVal").html();
            $("#replceVal").html(dInput);
            $("#ActVal").html($("#act_as").val());
            var finalVal = $("#replceVal").html();
            var finaltoneVal = $("#tone_of_voice").val();
            var finallangVal = $("#language").val();
            $("#replceVal").html(finalVal);
            $("#toneVal").html(finaltoneVal);
            $("#langVal").html(finallangVal);
            var getEditorDAta = $('#getEditdata').html();
            editor.setData(getEditorDAta);
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        let isEditMode = false;
        let currentEditRow;
        const modal = new bootstrap.Modal(document.getElementById('addProjectModal'));

        const form = document.getElementById('projectForm');
        const submitBtn = document.getElementById('submit-btn');

        submitBtn.addEventListener('click', function() {
            const prompt = document.getElementById('prompt').value.trim();
            const language = document.getElementById('language').value.trim();
            const toneOfVoice = document.getElementById('tone_of_voice').value.trim();
            const actAs = document.getElementById('act_as').value.trim();
            const characterCount = document.getElementById('character').value.trim(); // Fetch character count

            if (prompt && language && toneOfVoice && actAs && characterCount) {
                if (isEditMode) {
                    // Update existing row
                    currentEditRow.cells[0].textContent = prompt;
                    currentEditRow.cells[1].textContent = language;
                    currentEditRow.cells[2].textContent = toneOfVoice;
                    currentEditRow.cells[3].textContent = actAs;
                    currentEditRow.cells[4].textContent = characterCount; // Update character count cell
                    isEditMode = false;
                    currentEditRow = null;
                } else {
                    // Add new row
                    // const table = document.getElementById('projectTable').getElementsByTagName('tbody')[0];
                    // const newRow = table.insertRow();
                    // newRow.innerHTML = `
                    //         <td>${prompt}</td>
                    //         <td>${language}</td>
                    //         <td>${toneOfVoice}</td>
                    //         <td>${actAs}</td>
                    //         <td>${characterCount}</td>
                    //         <td>
                    //             <button class="btn btn-sm btn-primary edit-btn">Edit</button>
                    //             <button class="btn btn-sm btn-danger delete-btn">Delete</button>
                    //         </td>
                    //     `;
                    // attachRowEvents(newRow);
                }

                // Close modal and remove backdrop
                modal.hide();
                const backdrop = document.querySelector('.modal-backdrop');
                if (backdrop) {
                    backdrop.remove();
                }
                form.submit();

            } else {
                $('#prompt, #act_as').addClass('error');
                console.error('Please fill in all fields.');
            }
        });

        function attachRowEvents(row) {
            row.querySelector('.edit-btn').addEventListener('click', function() {
                rowId = row.cells[5].textContent
                $("#projectForm").attr('action', "{{ URl('prompt') }}/" + rowId + "");
                $("#PUTMethod").insertAfter("#PUT");
                const cells = row.cells;
                document.getElementById('prompt').value = cells[0].textContent;
                document.getElementById('language').value = cells[1].textContent;
                document.getElementById('tone_of_voice').value = cells[2].textContent;
                document.getElementById('act_as').value = cells[3].textContent;
                document.getElementById('character').value = cells[4].textContent;
                isEditMode = true;
                currentEditRow = row;
                modal.show();
            });

        }

        document.querySelectorAll('.edit-btn').forEach(button => {
            attachRowEvents(button.closest('tr'));
        });

    });
    $('body').on('click', '.btn-close', function() {
        $("#addProjectModal").model('hide');
    })
</script>