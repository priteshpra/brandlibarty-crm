@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/admin/css/research.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/css/projectlist.css') }}">

<style>
    h3 {
        padding-left: 20px;
        text-transform: uppercase;
    }

    .box {
        position: relative;
        /* margin: 20px; */
        padding: 15px 7px 5px;
        width: 400px;
        min-height: 65px;
        border: 1px solid grey;
        border-radius: 3px;
        background: #fff;
    }

    .editable {
        border-color: #bd0f18;
        box-shadow: inset 0 0 10px #555;
        background: #f2f2f2;
    }

    .text {
        outline: none;
    }

    .edit,
    .save {
        width: 45px;
        display: block;
        position: absolute;
        top: 0px;
        right: 0px;
        padding: 4px 10px;
        border-top-right-radius: 2px;
        border-bottom-left-radius: 10px;
        text-align: center;
        cursor: pointer;
        box-shadow: -1px 1px 4px rgba(0, 0, 0, 0.5);
    }

    .edit {
        background: #557a11;
        color: #f0f0f0;
        opacity: 0;
        transition: opacity .2s ease-in-out;
    }

    .save {
        display: none;
        background: #bd0f18;
        color: #f0f0f0;
    }

    .box:hover .edit {
        opacity: 1;
    }
</style>
<div class="page-content">

    <!-- main page div start here  -->
    <div class="button-container">
        <button class="add-button" id="addProjectBtn">Add New</button>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="tables-container">
        <!-- First Table -->
        <div>
            <form name="keyword" method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                @csrf
                <table>
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Keyword</th>
                            <th>Title</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $cnt = 1;
                        foreach ($Keywords as $key => $value) { ?>
                            <tr>
                                <td><?php echo $cnt++; ?></td>
                                <td><label><input name='keyword[]' type="checkbox" value="<?php echo $value->keywordName ?>"> <?php echo $value->keywordName ?></label></td>
                                <td>
                                    <div class="box b_<?php echo $value->id ?>">
                                        <span class="edit e_<?php echo $value->id ?>" data-id='<?php echo $value->id ?>'>edit</span>
                                        <span class="save s_<?php echo $value->id ?>">save</span>
                                        <div class="text t_<?php echo $value->id ?>">
                                            <?php echo $value->title ?>
                                        </div>
                                        <input type="hidden" id="title_<?php echo $value->id ?>" name="title[<?php echo $value->keywordName ?>]" value="<?php echo $value->title ?>" />
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
                <div class="button-container">
                    <button class="send-button" onclick="sendData()">Send</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Page-content -->
    <!-- modal for adding projects -->
    <div id="addProjectModal" class="modal">
        <div class="modal-content">
            <h2>Keyword</h2>

            <span id="PUTMethod"> @method('PUT')</span>
            <form id="addProjectForm" method="POST" action="{{ route('keyword.store') }}" enctype="multipart/form-data">
                @csrf
                <div id="PUT"></div>
                <div class="form-group">
                    <label for="projectName">Keyword Name:</label>
                    <input type="text" id="KeywordName" name="KeywordName" value="" required>
                </div>
                <div class="form-group">
                    <label for="projectName">Title:</label>
                    <input type="text" id="keyTitle" name="keyTitle" value="" required>
                </div>

                <div class="button-group">
                    <button type="button" class="cancel-btn">Cancel</button>
                    <button type="button" id="createProjectBtn" class="create-btn">Create New
                        Keyword</button>
                </div>
            </form>
        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">

                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $('.edit').click(function() {
        $(this).hide();
        rowId = $(this).attr('data-id');
        $('.b_' + rowId).addClass('editable');
        $('.t_' + rowId).attr('contenteditable', 'true');
        $('.s_' + rowId).show();
        $(this).addClass('editable');

    });

    $('.save').click(function() {
        $(this).hide();
        $('.b_' + rowId).removeClass('editable');
        $('.t_' + rowId).removeAttr('contenteditable');
        $('.e_' + rowId).show();
        textVal = $.trim($('.t_' + rowId).html());
        $("title_" + rowId).val(textVal);
        $.ajax({
            url: 'savekeywordTitle',
            type: 'GET',
            data: {
                Title: textVal,
                id: rowId
            },
            success: function(response) {}
        });
    });
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
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

        // Function to add a new project row
        function addProjectRow(projectName, category) {

            var newRow = '<tr>' +
                '<td>' + projectName + '</td>' +
                '<td>' + category + '</td>' +
                '<td>' +
                '<button class="btn btn-sm btn-primary edit-btn"><i class="fas fa-pencil-alt"></i></button>' +
                '<button class="btn btn-sm btn-danger delete-btn"><i class="fas fa-trash-alt"></i></button>' +
                '</td>' +
                '</tr>';

            $('#projectTable tbody').append(newRow);
        }

        // Function to update a project row
        function updateProjectRow(row, projectName, category) {
            row.find('td:eq(0)').text(projectName);
            // activationCode should not be updated on edit
            row.find('td:eq(2)').text(category);
        }

        // Handle click event on Create button (for adding new project or saving edits)
        $('#createProjectBtn').on('click', function(event) {
            event.preventDefault(); // Prevent default form submission

            var projectName = $('#KeywordName').val().trim();
            var category = $('#keyTitle').val();

            if ($(this).hasClass('edit-mode')) {
                // Update existing row if in edit mode
                var row = $('.edit-btn.active').closest('tr'); // Find the active edit button's row
                updateProjectRow(row, projectName, category);

                // Reset button text and mode
                $(this).removeClass('edit-mode').text('Create');
                $('.edit-btn.active').removeClass('active'); // Remove active class from edit button
            } else {
                // Add new project if not in edit mode
                isValid = true;
                if ($('#KeywordName').val() == '' || $('#KeywordName').val() == null) {
                    isValid = false;
                    $('#KeywordName').addClass('error');
                }
                if ($('#keyTitle').val() == '' || $('#keyTitle').val() == null) {
                    isValid = false;
                    $('#keyTitle').addClass('error');
                }

                if (isValid) {
                    $('#keyTitle, #KeywordName').removeClass('error');
                    addProjectRow(projectName, category);
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

            // Populate modal fields with existing data
            $('#KeywordName').val(projectName);
            $('#keyTitle').val(category);

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
@endsection