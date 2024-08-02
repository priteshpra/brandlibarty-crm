@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/admin/css/custom seeting.css') }}">

<div class="page-content">

    <!-- main div start here -->
    <div><span class="dark-color">API Setting</span></div>

    <!-- button right side  -->
    <div class="custom-button-container">
        <button id="addNewEmail">+ Add New API</button>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <!-- Modal code -->
    <div id="apiModal" class="modal">
        <span id="PUTMethod"> @method('PUT')</span>
        <form id="apiSetting" name="apiSetting" method="POST" action="{{ route('settings.store') }}" enctype="multipart/form-data">
            @csrf
            <div id="PUT"></div>
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Add New API</h2>
                    <span class="close">&times;</span>
                </div>
                <div class="modal-body">
                    <input type="text" id="apiTitle" name="apiTitle" placeholder="API Title" required><br>
                    <input type="text" id="apiKey" name="apiKey" placeholder="API Key" required><br>
                    <input type="text" id="secretKey" name="secretKey" placeholder="Secret Key" required><br>
                    <input type="text" id="apiDocLink" name="apiDocLink" placeholder="API Documentation Link" required><br>
                    <input type="text" id="billingLink" name="billingLink" placeholder="Billing Link" required><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cancelButton" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="actionButton">Save</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Table content -->
    <table id="apiTable">
        <thead>
            <tr>
                <th>API Title</th>
                <th class="api-key">API Key</th>
                <th class="api-key">Secret Key</th>
                <th class="billing-link">Billing Link</th>
                <th class="api-documentation">API Documentation Link</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($apiList as $pr)
            <tr>
                <td>{{ $pr->apiTitle }}</td>
                <td>{{ substr($pr->apikey, 0, 20) }}</td>
                <td>{{ substr($pr->secretKey, 0, 20) }}</td>
                <td>{{ substr($pr->billingLink, 0, 20) }}</td>
                <td>{{ substr($pr->apiDocLink, 0, 20) }}</td>
                <td style="display: none;">{{ $pr->SettingID }}</td>
                <td>
                    <button class="action-btn edit-btn" data-id="{{ $pr->SettingID }}"><i class="fas fa-edit"></i></button>
                    <form action="{{ route('settings.destroy', $pr->SettingID) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-btn delete-btn"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>



    <!-- End Page-content -->


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

@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('body').on('click', '.edit-btn', function() {
            var apiId = $(this).attr("data-id");
            $.ajax({
                url: 'getSettingsData',
                type: 'GET',
                data: {
                    apiID: apiId
                },
                success: function(response) {
                    if (response.SettingID) {
                        $('#apiKey').val(response.apikey);
                        $('#secretKey').val(response.secretKey);
                        $('#apiDocLink').val(response.apiDocLink);
                        $('#billingLink').val(response.billingLink);
                    }
                }
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        var modal = document.getElementById('apiModal');
        var btn = document.getElementById("addNewEmail");
        var span = document.getElementsByClassName("close")[0];
        var cancelButton = document.getElementById("cancelButton");
        var actionButton = document.getElementById("actionButton");
        var apiTable = document.getElementById("apiTable").getElementsByTagName('tbody')[0];
        const form = document.getElementById('apiSetting');
        var currentRow = null;

        function clearModalFields() {
            document.getElementById('apiTitle').value = "";
            document.getElementById('apiKey').value = "";
            document.getElementById('secretKey').value = "";
            document.getElementById('apiDocLink').value = "";
            document.getElementById('billingLink').value = "";
        }

        function isValidURL(url) {
            try {
                new URL(url);
                return true;
            } catch (_) {
                return false;
            }
        }

        btn.onclick = function() {
            modal.style.display = "block";
            actionButton.textContent = "Save";
            currentRow = null;
        }

        span.onclick = function() {
            modal.style.display = "none";
            clearModalFields();
            currentRow = null;
        }

        cancelButton.onclick = function() {
            modal.style.display = "none";
            clearModalFields();
            currentRow = null;
        }

        apiTable.addEventListener('click', function(event) {
            var target = event.target;
            if (target.classList.contains('edit-btn') || target.closest('.edit-btn')) {
                var row = target.closest('tr');
                rowId = row.cells[5].textContent
                $("#apiSetting").attr('action', "{{ URl('settings') }}/" + rowId + "");
                $("#PUTMethod").insertAfter("#PUT");
                currentRow = row;

                document.getElementById('apiTitle').value = row.cells[0].textContent;
                document.getElementById('apiKey').value = row.cells[1].textContent;
                document.getElementById('secretKey').value = row.cells[2].textContent;
                document.getElementById('billingLink').value = row.cells[3].textContent;
                document.getElementById('apiDocLink').value = row.cells[4].textContent;

                actionButton.textContent = "Update";
                modal.style.display = "block";
            }
        });

        actionButton.onclick = function() {
            var apiTitle = document.getElementById('apiTitle').value.trim();
            var apiKey = document.getElementById('apiKey').value.trim();
            var secretKey = document.getElementById('secretKey').value.trim();
            var apiDocLink = document.getElementById('apiDocLink').value.trim();
            var billingLink = document.getElementById('billingLink').value.trim();
            isValid = true;
            if (!apiTitle) {
                $('#apiTitle').addClass('error');
                isValid = false;
            }
            if (!apiKey) {
                $('#apiKey').addClass('error');
                isValid = false;
            }
            if (!secretKey) {
                $('#secretKey').addClass('error');
                isValid = false;
            }
            if (!apiDocLink) {
                $('#apiDocLink').addClass('error');
                isValid = false;
            }

            // if (!apiTitle || !apiKey || !secretKey || !apiDocLink || !billingLink) {
            //     alert("Please fill all required fields.");
            //     return;
            // }

            if (currentRow) {
                currentRow.cells[0].textContent = apiTitle;
                currentRow.cells[1].textContent = apiKey;
                currentRow.cells[2].textContent = billingLink;
                currentRow.cells[3].textContent = apiDocLink;
            } else {
                var newRow = apiTable.insertRow();
                newRow.innerHTML = `
                    <td>${apiTitle}</td>
                    <td class="api-key">${apiKey}</td>
                    <td class="billing-link">${billingLink}</td>
                    <td class="api-documentation">${apiDocLink}</td>
                    <td>
                        <button class="action-btn edit-btn"><i class="fas fa-edit"></i></button>
                        <button class="action-btn delete-btn"><i class="fas fa-trash-alt"></i></button>
                    </td>
                `;
            }
            if (isValid) {
                modal.style.display = "none";
                form.submit();
                currentRow = null;
            }
        };

        apiTable.addEventListener('click', function(event) {
            var target = event.target;
        });

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
                clearModalFields();
                currentRow = null;
            }
        }
    });
</script>