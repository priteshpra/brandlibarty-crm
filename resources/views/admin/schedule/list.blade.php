@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/admin/css/create blog.css') }}">
<div class="page-content">

    <!-- main div here page -->

    <div class="create-blog-breadcrumb">Blog Writing > <span class="dark-color">Create Blog</span></div>
    <div class="table-container create-blog" style="margin-top: 10px; max-width: 70%; margin-left: 10px; padding-bottom: 20px;">
        <table id="projectTable" class="table table-striped table-bordered create-blog">
            <thead class="thead-dark create-blog">
                <tr>
                    <th style="border: none; position: relative; width: 35%;">
                        <div class="dropdown create-blog">
                            <span class="dropdown-toggle" id="dropdownKeyword" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Select Keyword
                            </span>
                            <div class="dropdown-menu" aria-labelledby="dropdownKeyword">
                                <a class="dropdown-item create-blog" href="#">Keyword 1</a>
                                <a class="dropdown-item create-blog" href="#">Keyword 2</a>
                                <a class="dropdown-item create-blog" href="#">Keyword 3</a>
                                <!-- Add more dropdown items as needed -->
                            </div>
                        </div>
                    </th>
                    <th style="border: none; position: relative;">
                        <div class="dropdown create-blog">
                            <span class="dropdown-toggle" id="dropdownCategory" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Select Category
                            </span>
                            <div class="dropdown-menu" aria-labelledby="dropdownCategory">
                                <a class="dropdown-item create-blog" href="#">Category 1</a>
                                <a class="dropdown-item create-blog" href="#">Category 2</a>
                                <!-- Add more dropdown items as needed -->
                            </div>
                        </div>
                    </th>
                    <th style="border: none;">Domain Name</th>
                    <th style="border: none;">Prompt Select</th>
                    <th style="border: none;">Date</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example row -->
                <tr>
                    <td>artificial intelligence</td>
                    <td>news</td>
                    <td>www.newsletter.com</td>
                    <td>default prompt</td>
                    <td>10 jun 2024</td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>

    <!-- Additional Table for Keyword Research -->
    <div class="table-container keyword-research" style="margin-top: -140px; margin-left: 910px; padding-bottom: 10px;">
        <table id="keywordResearchTable" class="table table-striped table-bordered create-blog">
            <thead class="thead-dark create-blog">
                <tr>
                    <th style="border: none;">Keyword Research</th>
                </tr>
            </thead>
            <tbody>
                <!-- Rows for keyword research will be dynamically added here -->
            </tbody>
        </table>
        <div style="padding-top: 10px;">
            <i class="fas fa-search">Search</i>
        </div>
        <div style="display: flex; align-items: center; padding-top: 10px;">
            <input type="checkbox" style="margin-right: 40px;">
            <span style="margin-left: -35px;">Keyword Research</span>
            <i class="fas fa-trash-alt" style="margin-left: 40px;"></i>
        </div>
    </div>

    <div class="button-container">
        <button class="btn btn-primary">Create</button>
        <button class="btn btn-secondary">Cancel</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <!-- Font Awesome for Search Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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