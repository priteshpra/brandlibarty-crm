@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/admin/css/Email.css') }}">
<div class="page-content">
    <!-- main page start here  -->
    <div class="email-breadcrumb">Home > <span class="dark-color">Email Campaign</span></div>
    <!-- buttons  -->
    <div class="button-container">
        <button id="addNewEmail">+ Add New Email</button>
        <button id="addNewTemplate">+ Add New Template</button>
    </div>

    <!-- modal code  -->
    <!-- The Modal -->
    <div id="emailModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2 style="margin-top: -30px; margin-right: -600px;">Add New Email</h2>
                <p style="margin-top: 60px; margin-right: 500px;">Fill the fields below to add a new Email
                    (Domain)</p>
            </div>
            <div class="modal-body">
                <input type="text" placeholder="Subject"><br>
                <textarea placeholder="Description"></textarea><br>
                <button class="blue-button">Schedule for Later</button>
                <button class="blue-button">Submit</button>
            </div>
            <div class="modal-footer">
                <button id="closeModal">Close</button>
            </div>
        </div>

    </div>

    <!-- table content -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>
                        Domain Name
                        <div class="dropdown">
                            <span class="dropbtn">▼</span>
                            <div id="myDropdown" class="dropdown-content">
                                <a href="#">Domain 1</a>
                                <a href="#">Domain 2</a>
                                <a href="#">Domain 3</a>
                            </div>
                        </div>
                    </th>
                    <th>No of Email</th>
                    <th>Templates</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Domain 1</td>
                    <td>5</td>
                    <td>Template A</td>
                    <td>example@example.com</td>
                    <td>Active</td>
                    <td>
                        <button class="action-btn edit"><i class="fas fa-edit"></i></button>
                        <button class="action-btn trash"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
    // Get the modal
    var modal = document.getElementById('emailModal');

    // Get the button that opens the modal
    var btn = document.getElementById("addNewEmail");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Close modal when close button inside modal is clicked
    document.getElementById('closeModal').onclick = function() {
        modal.style.display = "none";
    }
</script>
@endsection