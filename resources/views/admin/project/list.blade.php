@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/admin/css/projectlist.css') }}">
<div class="page-content">

    <!-- green and red light indicator -->
    <div class="status-indicator">
        <div class="indicator connected">
            <div class="square green"></div>
            <div class="text">Connected</div>
        </div>
        <div class="indicator not-connected">
            <div class="square red"></div>
            <div class="text">Not Connected</div>
        </div>
    </div>


    <!-- add new button list -->
    <div class="add-button-container">
        <button class="add-button" id="addProjectBtn">+ Add New Project</button>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <!-- table start here -->
    <div class="table-wrapper">
        <div class="table-container">
            <table id="projectTable" class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Domain Name</th>
                        <th>Activation Code</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>Prompt</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($project as $pr)
                    <tr>
                        <td>{{ $pr->projectName }}</td>
                        <td>{{ $pr->activationCode }}</td>
                        <td>{{ $pr->category }}</td>
                        <td>{{ $pr->subcategory }}</td>
                        <td>{{ isset($promptName[$pr->promptID]) ? $promptName[$pr->promptID]: '' }}</td>
                        <td style="display: none;">{{ $pr->id }}</td>
                        <?php $class = ($pr->isConnected == 0) ? 'issue' : 'connected'; ?>
                        <td><span class="connection-status status-<?php echo $class ?>"></span></td>
                        <td>
                            <button class="btn btn-sm btn-primary edit-btn"><i class="fas fa-pencil-alt"></i></button>
                            <form action="{{ route('project.destroy', $pr->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger delete-btn"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- modal for adding projects -->
    <div id="addProjectModal" class="modal">
        <div class="modal-content">
            <h2>Project</h2>

            <span id="PUTMethod"> @method('PUT')</span>
            <form id="addProjectForm" method="POST" action="{{ route('project.store') }}" enctype="multipart/form-data">
                @csrf
                <div id="PUT"></div>
                <div class="form-group">
                    <label for="projectName">Domain Name:</label>
                    <input type="text" id="projectName" name="projectName" value="" required>
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select class="form-control" id="category" name="category" required>
                        <option value="">Select Category</option>
                        <?php if ($category) {
                            foreach ($category as $key => $value) { ?>
                                <option value="<?php echo $value->categoryName ?>"><?php echo $value->categoryName ?></option>
                        <?php }
                        } ?>

                    </select>
                </div>
                <div class="form-group">
                    <label for="subcategory">Subcategory:</label>
                    <input type="text" id="subcategory" name="subcategory" value="" required>
                </div>
                <div class="form-group">
                    <label for="defaultPrompt">Default Prompt:</label>
                    <select class="form-control" id="defaultPrompt" name="promptID" required>
                        <option value="">Select Prompt</option>
                        @foreach($prompt as $prompt)
                        <option value="{{ $prompt->id }}">{{ $prompt->prompt }} - {{ $prompt->language }} - {{ $prompt->act_as }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="button-group">
                    <button type="button" class="cancel-btn">Cancel</button>
                    <button type="button" id="createProjectBtn" class="create-btn">Create New
                        Project</button>
                </div>
            </form>
        </div>
    </div>



    <!-- end of model -->

</div>


@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $("#projectName").on('keypress', function() {
            var the_domain = $(this).val();

            // strip off "http://" and/or "www."
            the_domain = the_domain.replace("http://", "");
            the_domain = the_domain.replace("www.", "");

            var reg = /^[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9]\.[a-zA-Z]{2,}$/;
            if (reg.test(the_domain) == false) {

                $('#projectName').focus();
                $('#projectName').addClass('error');
            } else {
                $('#projectName').removeClass('error');
            }
        });
        // Function to generate activation code
        const form = document.getElementById('addProjectForm');

        function generateActivationCode() {
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            let code = 'SC';
            for (let i = 0; i < 30; i++) {
                code += characters.charAt(Math.floor(Math.random() * characters.length));
            }
            return code;
        }

        // Function to get connection status
        function getConnectionStatus() {
            const statuses = ['connected', 'pending', 'issue'];
            return statuses[Math.floor(Math.random() * statuses.length)];
        }

        // Function to add a new project row
        function addProjectRow(projectName, activationCode, category, subcategory, defaultPrompt, connectionStatus) {
            var statusClass = getStatusClass(connectionStatus);

            var newRow = '<tr>' +
                '<td>' + projectName + '</td>' +
                '<td>' + activationCode + '</td>' +
                '<td>' + category + '</td>' +
                '<td>' + subcategory + '</td>' +
                '<td>' + defaultPrompt + '</td>' +
                '<td><span class="connection-status ' + statusClass + '"></span></td>' +
                '<td>' +
                '<button class="btn btn-sm btn-primary edit-btn"><i class="fas fa-pencil-alt"></i></button>' +
                '<button class="btn btn-sm btn-danger delete-btn"><i class="fas fa-trash-alt"></i></button>' +
                '</td>' +
                '</tr>';

            $('#projectTable tbody').append(newRow);
        }

        // Function to update a project row
        function updateProjectRow(row, projectName, category, subcategory, defaultPrompt, connectionStatus) {
            row.find('td:eq(0)').text(projectName);
            // activationCode should not be updated on edit
            row.find('td:eq(2)').text(category);
            row.find('td:eq(3)').text(subcategory);
            row.find('td:eq(4)').text(defaultPrompt);
            row.find('.connection-status').removeClass().addClass('connection-status').addClass(getStatusClass(connectionStatus));
        }

        // Handle click event on Create button (for adding new project or saving edits)
        $('#createProjectBtn').on('click', function(event) {
            event.preventDefault(); // Prevent default form submission

            var projectName = $('#projectName').val().trim();
            var category = $('#category').val();
            var subcategory = $('#subcategory').val().trim();
            var defaultPrompt = $('#defaultPrompt').val();
            var connectionStatus = getConnectionStatus();

            if ($(this).hasClass('edit-mode')) {
                // Update existing row if in edit mode
                var row = $('.edit-btn.active').closest('tr'); // Find the active edit button's row
                updateProjectRow(row, projectName, category, subcategory, defaultPrompt, connectionStatus);

                // Reset button text and mode
                $(this).removeClass('edit-mode').text('Create');
                $('.edit-btn.active').removeClass('active'); // Remove active class from edit button
            } else {
                // Add new project if not in edit mode
                isValid = true;
                var the_domain = $('#projectName').val();

                // strip off "http://" and/or "www."
                the_domain = the_domain.replace("http://", "");
                the_domain = the_domain.replace("www.", "");

                var reg = /^[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9]\.[a-zA-Z]{2,}$/;
                if (reg.test(the_domain) == false) {
                    isValid = false;
                    $('#projectName').focus();
                    $('#projectName').addClass('error');
                }

                if ($('#projectName').val() == '' || $('#projectName').val() == null) {
                    isValid = false;
                    $('#projectName').addClass('error');
                }
                if ($('#category').val() == '' || $('#category').val() == null) {
                    isValid = false;
                    $('#category').addClass('error');
                }
                if ($('#defaultPrompt').val() == '' || $('#defaultPrompt').val() == null) {
                    isValid = false;
                    $('#defaultPrompt').addClass('error');
                }
                if (isValid) {
                    $('#defaultPrompt, #activationCode, #projectName').removeClass('error');
                    var activationCode = generateActivationCode();
                    addProjectRow(projectName, activationCode, category, subcategory, defaultPrompt, connectionStatus);
                }
            }
            if (isValid) {
                form.submit();
                $('#addProjectForm')[0].reset();
                $('#addProjectModal').hide();
            }
        });

        // Handle click event on Edit button
        $(document).on('click', '.edit-btn', function() {
            // Remove active class from any previously active edit button
            $('.edit-btn.active').removeClass('active');

            // Add active class to the current edit button
            $(this).addClass('active');

            var row = $(this).closest('tr');
            rowId = row.find('td:eq(5)').text();
            $("#addProjectForm").attr('action', "{{ URl('project') }}/" + rowId + "");
            $("#PUTMethod").insertAfter("#PUT");

            var projectName = row.find('td:eq(0)').text();
            var category = row.find('td:eq(2)').text();
            var subcategory = row.find('td:eq(3)').text();
            var defaultPrompt = row.find('td:eq(4)').text();
            var connectionStatus = getStatusFromRow(row);

            // Populate modal fields with existing data
            $('#projectName').val(projectName);
            $('#category').val(category);
            $('#subcategory').val(subcategory);
            $('#defaultPrompt').val(defaultPrompt);

            // Change Create button text and mode to edit
            // $('#createProjectBtn').addClass('edit-mode').text('Save changes');

            // Open modal
            $('#addProjectModal').show();
        });

        // Modal functionality
        var modal = $('#addProjectModal');
        var btn = $('#addProjectBtn');
        var span = $('.close');
        var cancelBtn = $('.cancel-btn');

        btn.on('click', function() {
            modal.show();
        });

        span.on('click', function() {
            modal.hide();
        });

        cancelBtn.on('click', function() {
            modal.hide();
        });

        $(window).on('click', function(event) {
            if (event.target == modal[0]) {
                modal.hide();
            }
        });

        // Function to get status class based on connection status
        function getStatusClass(connectionStatus) {
            switch (connectionStatus) {
                case 'connected':
                    return 'status-connected';
                case 'pending':
                    return 'status-pending';
                case 'issue':
                default:
                    return 'status-issue';
            }
        }

        // Function to get connection status from row
        function getStatusFromRow(row) {
            if (row.find('.connection-status').hasClass('status-connected')) {
                return 'connected';
            } else if (row.find('.connection-status').hasClass('status-pending')) {
                return 'pending';
            } else {
                return 'issue';
            }
        }
    });
</script>