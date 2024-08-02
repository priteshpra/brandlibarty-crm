@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/admin/css/calendar.css') }}">
<div class="page-content">
    <!-- main contenet start here -->
    <!-- add new btn  -->
    <div class="custom-button-container">
        <button id="Shadule" onclick="openModal()">+ Add New Shadule</button>
    </div>
    <!-- btn end -->
    <div><span class="dark-color">Calendar</span></div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <!-- actual page  -->

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Add New Schedule</h2>
                <span class="close" onclick="closeModal()">&times;</span>
            </div>
            <div class="modal-body">
                <span id="PUTMethod"> @method('PUT')</span>
                <form id="scheduleForm" name="projectForm" method="POST" action="{{ route('calendar.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div id="PUT"></div>
                    <div class="form-group">
                        <label for="articleName">Article Name:</label>
                        <input type="text" id="articleName" name="articleName" required>
                    </div>
                    <div class="form-group">
                        <label for="articleLink">Article Link:</label>
                        <input type="url" id="articleLink" name="articleLink" required>
                    </div>
                    <div class="form-group">
                        <label for="scheduledFor">Schedule date:</label>
                        <input type="date" id="scheduledFor" name="scheduledFor" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="cancelButton" onclick="closeModal()">Cancel</button>
                        <button type="submit" id="createButton">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Your Table -->
    <div class="table-container">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Article Name</th>
                    <th>Article Link</th>
                    <th>Schedule date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($List as $pr)
                <tr>
                    <td>{{ $pr->articleName }}</td>
                    <td><a href="{{ $pr->articleLink }}" target="_blank">{{ $pr->articleLink }}</a></td>
                    <td>{{ $pr->articleScheduleDate }}</td>
                    <td style="display: none;">{{ $pr->id }}</td>
                    <td>
                        <button class="btn btn-sm btn-primary edit-btn" onclick="editSchedule(this)"><i class="fas fa-edit"></i></button>
                        <form action="{{ route('calendar.destroy', $pr->id) }}" method="post">
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
@endsection
<script>
    // Get modal element
    var modal = document.getElementById("myModal");
    const form = document.getElementById('scheduleForm');
    // Temporary variables to store current values
    var tempArticleName, tempArticleLink, tempScheduledFor;

    // Function to open the modal
    function openModal() {
        const modal = document.getElementById("myModal");
        modal.style.display = "block";
    }

    // Function to close the modal
    function closeModal() {
        const modal = document.getElementById("myModal");
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            closeModal();
        }
    }

    // Handle form submission
    document.getElementById("scheduleForm").addEventListener("submit", function(event) {
        event.preventDefault();
        addSchedule();
        closeModal();
    });

    // Function to add schedule to the table
    function addSchedule(articleName, articleLink, scheduledFor) {
        if (!articleName) articleName = document.getElementById("articleName").value;
        if (!articleLink) articleLink = document.getElementById("articleLink").value;
        if (!scheduledFor) scheduledFor = document.getElementById("scheduledFor").value;

        var table = document.querySelector(".table-container tbody");
        var newRow = table.insertRow();

        var cell1 = newRow.insertCell(0);
        var cell2 = newRow.insertCell(1);
        var cell3 = newRow.insertCell(2);
        var cell4 = newRow.insertCell(3);

        cell1.innerHTML = articleName;
        cell2.innerHTML = `<a href="${articleLink}" target="_blank">${articleLink}</a>`;
        cell3.innerHTML = `<input type="date" class="form-control schedule-date" value="${scheduledFor}">`;
        cell4.innerHTML = `<button class="btn btn-sm btn-primary" onclick="editSchedule(this)"><i class="fas fa-edit"></i></button> <button class="btn btn-sm btn-danger" onclick="deleteSchedule(this)"><i class="fas fa-trash-alt"></i></button>`;

        // Clear form
        form.submit();
        // document.getElementById("scheduleForm").reset();
    }

    // Function to edit schedule in the table
    function editSchedule(button) {
        var row = button.parentNode.parentNode;
        rowId = row.cells[3].textContent
        $("#scheduleForm").attr('action', "{{ URl('calendar') }}/" + rowId + "");
        $("#PUTMethod").insertAfter("#PUT");

        tempArticleName = row.cells[0].innerHTML;
        tempArticleLink = row.cells[1].querySelector('a').href;
        tempScheduledFor = row.cells[2].textContent;

        document.getElementById("articleName").value = tempArticleName;
        document.getElementById("articleLink").value = tempArticleLink;
        document.getElementById("scheduledFor").value = tempScheduledFor;

        openModal();
    }
</script>