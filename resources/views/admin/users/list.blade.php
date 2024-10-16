@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/admin/css/user.css') }}">
<div class="page-content">
    <!-- button div -->
    <!-- Existing HTML structure remains unchanged -->
    <div class="text-end mb-3">
        <button type="button" class="btn btn-primary" id="addUserBtn">
            Add New User
        </button>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="PUTMethod"> @method('PUT')</span>
                    <form id="userForm" name="userForm" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div id="PUT"></div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="FirstName" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="LastName" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="EmailID" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="phoneNo">Phone No</label>
                                <input type="text" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" class="form-control" maxlength="12" minlength="12" id="phoneNo" name="MobileNo" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="state">State</label>
                                <input type="text" class="form-control" id="state" name="State" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="state">City</label>
                                <input type="text" class="form-control" id="city" name="City" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="d-block text-center">User Role</label>
                            <div class="row" id="userRolePermissions">
                                @foreach($roleData as $role)
                                <div class="col-md-6">
                                    <label><input type="radio" name="RoleID" value="{{ $role->RoleID }}"> {{ $role->RoleName }}</label><br>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="d-block text-center">User Permissions</label>
                            <div class="row" id="userPermissions">
                                <div class="col-md-6">
                                    <label><input type="checkbox" value="Dashboard"> Dashboard</label><br>
                                    <label><input type="checkbox" value="Calendar"> Calendar</label><br>
                                    <label><input type="checkbox" value="Keyword Research"> Keyword Research</label><br>
                                    <label><input type="checkbox" value="Blog Writing"> Blog Writing</label><br>
                                    <label><input type="checkbox" value="Media"> Media</label><br>
                                    <label><input type="checkbox" value="Email"> Email</label><br>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" value="SMS Configuration"> SMS Configuration</label><br>
                                    <label><input type="checkbox" value="Affiliate"> Affiliate</label><br>
                                    <label><input type="checkbox" value="Prompt"> Prompt</label><br>
                                    <label><input type="checkbox" value="Ads Block Section"> Ads Block Section</label><br>
                                    <label><input type="checkbox" value="User"> User</label><br>
                                    <label><input type="checkbox" value="Custom Setting"> Custom Setting</label><br>
                                </div>
                            </div>
                        </div> -->
                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" id="createUserBtn">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table id="userTable" class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email ID</th>
                    <th>Phone No</th>
                    <th>State</th>
                    <th>City</th>
                    <th>User Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $pr)
                <tr>
                    <td>{{ $pr->FirstName }}</td>
                    <td>{{ $pr->LastName }}</td>
                    <td>{{ $pr->EmailID }}</td>
                    <td>{{ $pr->MobileNo }}</td>
                    <td>{{ $pr->State }}</td>
                    <td>{{ $pr->City }}</td>
                    <td>{{ $roles[$pr->RoleID] }}</td>
                    <td style="display: none;">{{ $pr->Id }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary edit-btn" data-id="{{ $pr->Id }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="{{ route('users.destroy', $pr->Id) }}" method="post">
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
    <!-- end of model -->
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('body').on('click', '.edit-btn', function() {
            var userId = $(this).attr("data-id");
            $.ajax({
                url: 'getUserData',
                type: 'GET',
                data: {
                    userID: userId
                },
                success: function(response) {
                    if (response.RoleID) {
                        $('#userRolePermissions input[type="radio"][value="' + response.RoleID + '"]').prop("checked", true);
                    }
                    console.log(response);
                }
            });
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const addUserBtn = document.getElementById('addUserBtn');
        const userModal = new bootstrap.Modal(document.getElementById('userModal'));
        const userForm = document.getElementById('userForm');
        const userTableBody = document.querySelector('#userTable tbody');
        const createUserBtn = document.getElementById('createUserBtn');
        const cancelBtn = document.querySelector('#userModal .btn-secondary'); // Close button in modal

        let isEditMode = false;
        let currentEditRow = null;

        // Event listener for Add User button
        addUserBtn.addEventListener('click', function() {
            resetForm();
            isEditMode = false;
            currentEditRow = null;
            userModal.show();
        });

        // Event listener for Save Changes button in modal
        createUserBtn.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent form submission

            if (validateForm()) {
                if (isEditMode && currentEditRow) {
                    updateTableRow(currentEditRow);
                } else {
                    userForm.submit();
                    addNewTableRow();
                }

                userModal.hide();
                resetForm();
            }
        });

        // Event listener for Close button in modal
        cancelBtn.addEventListener('click', function() {
            userModal.hide();
            resetForm();
        });

        // Function to validate form fields
        function validateForm() {
            const firstName = document.getElementById('firstName').value.trim();
            const lastName = document.getElementById('lastName').value.trim();
            const phoneNo = document.getElementById('phoneNo').value.trim();
            const state = document.getElementById('state').value.trim();
            const email = document.getElementById('email').value.trim();
            const city = document.getElementById('city').value.trim();
            const userRoles = getUserRoles();
            const userPermissions = getUserPermissions();
            isValid = true;
            if (!firstName) {
                isValid = false;
                $('#firstName').addClass('error');
            }
            if (!lastName) {
                isValid = false;
                $('#lastName').addClass('error');
            }
            if (!email) {
                isValid = false;
                $('#email').addClass('error');
            }
            if (IsEmail(email) === false) {
                $('#email').addClass('error');
                isValid = false;
            }
            if (!city) {
                isValid = false;
                $('#city').addClass('error');
            }
            if (!state) {
                isValid = false;
                $('#state, #country').addClass('error');
            }
            if (isValid) {
                userForm.submit();
                return true;
            } else {
                return false;
            }
        }

        function IsEmail(email) {
            const regex =
                /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!regex.test(email)) {
                return false;
            } else {
                return true;
            }
        }

        // Function to reset form fields and checkboxes
        function resetForm() {
            userForm.reset();
            clearCheckboxes('#userRolePermissions input[type="radio"]');
            clearCheckboxes('#userPermissions input[type="checkbox"]');
        }

        // Function to clear checkboxes
        function clearCheckboxes(selector) {
            document.querySelectorAll(selector).forEach(checkbox => {
                checkbox.checked = false;
            });
        }

        // Function to get selected user roles from checkboxes
        function getUserRoles() {
            const userRoles = [];
            document.querySelectorAll('#userRolePermissions input[type="radio"]:checked').forEach(checkbox => {
                userRoles.push(checkbox.value);
            });
            return userRoles;
        }

        // Function to get selected user permissions from checkboxes
        function getUserPermissions() {
            const userPermissions = [];
            document.querySelectorAll('#userPermissions input[type="checkbox"]:checked').forEach(checkbox => {
                userPermissions.push(checkbox.value);
            });
            return userPermissions;
        }

        // Function to add a new row to the user table
        function addNewTableRow() {
            const firstName = document.getElementById('firstName').value.trim();
            const lastName = document.getElementById('lastName').value.trim();
            const EmailID = document.getElementById('EmailID').value.trim();
            const userRoles = getUserRoles();
            const userPermissions = getUserPermissions();
            const phoneNo = document.getElementById('phoneNo').value.trim();
            const state = document.getElementById('state').value.trim();
            const city = document.getElementById('city').value.trim();

            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                    <td>${firstName}</td>
                    <td>${lastName}</td>
                    <td>${EmailID}</td>
                    <td>${phoneNo}</td>
                    <td>${state}</td>
                    <td>${city}</td>
                    <td>${userRoles.join(', ')}</td>
                    <td>${userPermissions.join(', ')}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary edit-btn"><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-sm btn-danger delete-btn"><i class="bi bi-trash"></i></button>
                    </td>
                `;
            attachRowEvents(newRow);
            userTableBody.appendChild(newRow);
        }

        // Function to update an existing row in the user table
        function updateTableRow(row) {
            const cells = row.cells;
            // cells[0].textContent = document.getElementById('firstName').value.trim();
            // cells[1].textContent = document.getElementById('lastName').value.trim();
            // cells[2].textContent = document.getElementById('email').value.trim();
            // cells[3].textContent = document.getElementById('phoneNo').value.trim();
            // cells[4].textContent = document.getElementById('state').value.trim();
            // cells[5].textContent = document.getElementById('city').value.trim();
            // cells[6].textContent = getUserRoles().join(', ');
            // cells[7].textContent = getUserPermissions().join(', ');
        }

        document.querySelectorAll('.edit-btn').forEach(button => {
            attachRowEvents(button.closest('tr'));
        });

        // Function to attach edit and delete events to a row
        function attachRowEvents(row) {
            row.querySelector('.edit-btn').addEventListener('click', function() {
                const cells = row.cells;
                document.getElementById('firstName').value = cells[0].textContent;
                document.getElementById('lastName').value = cells[1].textContent;

                clearCheckboxes('#userRolePermissions input[type="radio"]');
                const userRoles = cells[6].textContent.split(', ');
                userRoles.forEach(role => {
                    console.log(role);
                    // document.querySelector(`#userRolePermissions input[type="checkbox"][value="${role}"]`).checked = true;
                    $(`#userRolePermissions input[type="radio"][value="${role}"]`).checked = true;
                });

                clearCheckboxes('#userPermissions input[type="checkbox"]');
                const userPermissions = cells[7].textContent.split(', ');
                userPermissions.forEach(permission => {
                    // document.querySelector(`#userPermissions input[type="checkbox"][value="${permission}"]`).checked = true;
                });

                rowId = cells[8].textContent;
                $("#userForm").attr('action', "{{ URl('users') }}/" + rowId + "");
                $("#PUTMethod").insertAfter("#PUT");

                document.getElementById('email').value = cells[2].textContent;
                document.getElementById('phoneNo').value = cells[3].textContent;
                document.getElementById('state').value = cells[4].textContent;
                document.getElementById('city').value = cells[5].textContent;

                isEditMode = true;
                currentEditRow = row;
                userModal.show();
            });
        }

        // Event delegation for dynamically added edit and delete buttons
        userTableBody.addEventListener('click', function(event) {
            if (event.target.classList.contains('edit-btn')) {
                const row = event.target.closest('tr');
                attachRowEvents(row); // Attach events if not already attached
                row.querySelector('.edit-btn').click(); // Trigger edit button click
            } else if (event.target.classList.contains('delete-btn')) {
                const row = event.target.closest('tr');
                row.remove();
            }
        });

        // Show relevant permissions based on selected user role
        document.querySelectorAll('#userRolePermissions input[type="radio"]').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const selectedUserRole = this.value;
                const correspondingPermissions = document.querySelectorAll(`#userPermissions input[type="checkbox"][value^="${selectedUserRole}"]`);
                correspondingPermissions.forEach(permission => {
                    permission.closest('label').style.display = this.checked ? 'block' : 'none';
                });
            });
        });
    });
</script>