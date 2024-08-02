@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/admin/css/categorylist.css') }}">
<div class="page-content">
    <!-- button div -->
    <!-- <div class="container"> -->
    <button id="addCategoryBtn" class="add-btn">Add New Category</button>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <table id="categoryTable">
        <thead>
            <tr>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $category)
            <tr>
                <td>
                    <h5>{{$category->categoryName}}</h5>
                </td>


                <td class="">
                    <div class="actions">
                        <button class="action-btn edit-btn"><i class="fas fa-edit"></i></button>
                        <form action="{{ route('category.destroy', $category->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn delete-btn"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- </div> -->

    <!-- Modal for adding/editing category -->
    <div id="categoryModal" class="modal">
        <div class="modal-content">
            <span id="closeModal" class="close-btn">&times;</span>
            <h2>Add/Edit Category</h2>
            <span id="PUTMethod"> @method('PUT')</span>
            <form id="categoryForm" method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                @csrf
                <div id="PUT"></div>
                <label for="categoryName">Category</label>
                <input type="text" id="categoryName" name="categoryName" required>
                <button type="submit" class="save-btn">Save</button>
                <button type="button" class="cancel-btn" id="cancelBtn">Cancel</button>
            </form>
        </div>
    </div>
    <!-- end of model -->
</div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const addCategoryBtn = document.getElementById('addCategoryBtn');
        const categoryModal = document.getElementById('categoryModal');
        const closeModal = document.getElementById('closeModal');
        const categoryForm = document.getElementById('categoryForm');
        const cancelBtn = document.getElementById('cancelBtn');
        const categoryTable = document.getElementById('categoryTable').getElementsByTagName('tbody')[0];

        let editIndex = null;

        addCategoryBtn.onclick = function() {
            openModal();
        }

        closeModal.onclick = function() {
            closeModalFunction();
        }

        cancelBtn.onclick = function() {
            closeModalFunction();
        }

        categoryForm.onsubmit = function(event) {
            event.preventDefault();
            const categoryName = document.getElementById('categoryName').value;

            if (editIndex !== null) {
                updateCategory(editIndex, categoryName);
            } else {
                categoryForm.submit();
            }

            closeModalFunction();
        }

        function openModal(categoryName = '', index = null) {
            categoryModal.style.display = 'block';
            document.getElementById('categoryName').value = categoryName;
            editIndex = index;
        }

        function closeModalFunction() {
            categoryModal.style.display = 'none';
            categoryForm.reset();
            editIndex = null;
        }

        function addCategory(name) {
            const newRow = categoryTable.insertRow();
            newRow.insertCell(0).textContent = name;
            const actionCell = newRow.insertCell(1);

            // Edit button with icon
            const editBtn = document.createElement('button');
            editBtn.innerHTML = '<i class="fas fa-edit"></i>';
            editBtn.classList.add('action-btn', 'edit-btn');
            editBtn.onclick = function() {
                openModal(name, newRow.rowIndex - 1);
            }

            // Delete button with icon
            const deleteBtn = document.createElement('button');
            deleteBtn.innerHTML = '<i class="fas fa-trash-alt"></i>';
            deleteBtn.classList.add('action-btn', 'delete-btn'); // Add delete-btn class

            actionCell.appendChild(editBtn);
            actionCell.appendChild(deleteBtn);
        }


        function updateCategory(index, name) {
            const row = categoryTable.rows[index];
            row.cells[0].textContent = name;
        }

        window.onclick = function(event) {
            if (event.target == categoryModal) {
                closeModalFunction();
            }
        }
    });
</script>