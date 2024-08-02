@extends('layouts.admin')
@section('content')
<div class="page-content">
    <h6 class="project-heading">Project List</h6>

    <div class="text-right mb-3" style="width: 100%; display: flex; justify-content: flex-end; padding-top: 50px;">
        <button class="btn btn-primary" data-toggle="modal" data-target="#addProjectModal" style="float: right;">Add New Project</button>
    </div>

    <div class="table-container" style="width: 100%; overflow-x: auto;">
        <table id="projectTable" class="table table-striped table-bordered" style="width: 100%; table-layout: auto;">
            <thead class="thead-dark">
                <tr>
                    <th>Domain Name</th>
                    <th>Category</th>
                    <th>Default Prompt</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Example.com</td>
                    <td>Web Development</td>
                    <td>Prompt 1</td>
                    <td>
                        <button class="btn btn-sm btn-primary">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>
@endsection