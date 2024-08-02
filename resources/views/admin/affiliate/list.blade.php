@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/admin/css/affiliate.css') }}">

<div class="page-content">
    <div><span class="dark-color">Affiliate</span></div>
    <!-- main content start here -->
    <!-- buttob for the affilate -->
    <div class="add-button-container">
        <button class="add-button" id="addProjectBtn">+ Add New Affiliate</button>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <!-- modal start here -->
    <div id="affiliateModal" class="modal">
        <span id="PUTMethod"> @method('PUT')</span>
        <form id="apiSetting" name="apiSetting" method="POST" action="{{ route('affiliate.store') }}" enctype="multipart/form-data">
            @csrf
            <div id="PUT"></div>
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Add New Affiliate</h2>
                    <span class="close">&times;</span>
                </div>

                <div class="modal-body">
                    <input type="text" id="accountName" name="accountName" placeholder="Account Name"><br>
                    <input type="text" id="productList" name="productCat" placeholder="Product Category"><br>
                    <input type="text" id="productLink" name="productLink" placeholder="Product Link"><br>
                    <input type="text" id="affiliateId" name="affiliateId" placeholder="Affiliate ID"><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cancelButton" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="createButton">Save</button>
                </div>
            </div>
        </form>
    </div>


    <!-- end btn -->
    <div class="table-responsive" style="margin-top: 20px;">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Account Name</th>
                    <th>Product Category</th>
                    <th>Product Link</th>
                    <th>Affiliate ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($affList as $pr)
                <tr>
                    <td>{{ $pr->accountName }}</td>
                    <td>{{ $pr->productCat }}</td>
                    <td><a href="{{ $pr->productLink }}" target="_blank">{{ substr($pr->productLink, 0, 20) }}</a></td>
                    <td>{{ $pr->affiliateId }}</td>
                    <td style="display: none;">{{ $pr->id }}</td>
                    <td>
                        <button class="btn btn-primary action-btn edit" data-id="{{ $pr->id }}"><i class="fas fa-edit"></i></button>
                        <form action="{{ route('affiliate.destroy', $pr->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger action-btn delete"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the modal
        var modal = document.getElementById('affiliateModal');
        const form = document.getElementById('apiSetting');

        // Get the button that opens the modal
        var btn = document.getElementById('addProjectBtn');

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName('close')[0];

        // Get the cancel button that closes the modal
        var cancelButton = document.getElementById('cancelButton');

        // Get the create button
        var createButton = document.getElementById('createButton');

        // Variables to hold the current editing row and action state
        var currentRow = null;
        var isEditing = false;

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = 'block';
            createButton.innerHTML = 'Create'; // Reset button text to 'Create'
            isEditing = false; // Reset editing state
        };

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = 'none';
        };

        // When the user clicks on cancel button, close the modal
        cancelButton.onclick = function() {
            modal.style.display = 'none';
        };

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        };

        // When the user clicks the create button, add or edit the data in the table
        createButton.onclick = function() {
            var accountName = document.getElementById('accountName').value.trim();
            var productList = document.getElementById('productList').value.trim();
            var productLink = document.getElementById('productLink').value.trim();
            var affiliateId = document.getElementById('affiliateId').value.trim();
            isValid = true;
            // Basic validation: Product Link must contain 'http' or 'https'
            if (accountName && productList && productLink && affiliateId) {
                if (productLink.startsWith('http://') || productLink.startsWith('https://')) {
                    if (isEditing && currentRow) {
                        // Update the existing row
                        currentRow.cells[0].innerHTML = accountName;
                        currentRow.cells[1].innerHTML = productList;
                        currentRow.cells[2].innerHTML = `<a href="${productLink}" target="_blank">${productLink}</a>`;
                        currentRow.cells[3].innerHTML = affiliateId;
                    } else {
                        // Add a new row

                        var table = document.querySelector('.table tbody');
                        var newRow = table.insertRow();

                        var cell1 = newRow.insertCell(0);
                        var cell2 = newRow.insertCell(1);
                        var cell3 = newRow.insertCell(2);
                        var cell4 = newRow.insertCell(3);
                        var cell5 = newRow.insertCell(4);

                        cell1.innerHTML = accountName;
                        cell2.innerHTML = productList;
                        cell3.innerHTML = `<a href="${productLink}" target="_blank">${productLink}</a>`;
                        cell4.innerHTML = affiliateId;
                        cell5.innerHTML = '<button class="btn btn-primary action-btn edit"><i class="fas fa-edit"></i></button> <button class="btn btn-danger action-btn delete"><i class="fas fa-trash"></i></button>';
                    }

                    // Close the modal
                    form.submit();
                    modal.style.display = 'none';

                    // Add event listeners to the new action buttons
                    addEventListenersToButtons();
                } else {
                    alert('Product Link must start with http:// or https://');
                    isValid = false;
                    return false;
                }
            } else {
                $('#accountName, #productList, #productLink, #affiliateId').addClass('error');
                isValid = false;
                return false;
            }
        };

        // Function to add event listeners to edit and delete buttons
        function addEventListenersToButtons() {
            var editButtons = document.querySelectorAll('.action-btn.edit');
            var deleteButtons = document.querySelectorAll('.action-btn.delete');

            editButtons.forEach(function(button) {
                button.onclick = function() {
                    currentRow = this.parentElement.parentElement;
                    rowId = currentRow.cells[4].textContent
                    $("#apiSetting").attr('action', "{{ URl('affiliate') }}/" + rowId + "");
                    $("#PUTMethod").insertAfter("#PUT");

                    document.getElementById('accountName').value = currentRow.cells[0].innerHTML;
                    document.getElementById('productList').value = currentRow.cells[1].innerHTML;
                    document.getElementById('productLink').value = currentRow.cells[2].querySelector('a').href;
                    document.getElementById('affiliateId').value = currentRow.cells[3].innerHTML;

                    modal.style.display = 'block';
                    createButton.innerHTML = 'Update'; // Change button text to 'Update'
                    isEditing = true; // Set editing state
                };
            });
        }

        // Initial call to add event listeners to existing buttons
        addEventListenersToButtons();
    });
</script>