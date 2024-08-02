@extends('layouts.admin')
@section('content')
<div class="page-content">
    <!-- <div class="breadcrumb">user > Create-user</div> -->

    <form action="index.php" method="post" enctype="multipart/form-data">
        <!-- Button to open Add New User modal -->
        <div class="button-container">
            <button type="button" class="btn btn-primary add-user-btn">Add New User</button>
        </div>


        <div class="input-box">
            <div class="input-row">
                <div class="input-col">
                    <label for="input1">First Name</label>
                    <input type="text" id="input1" name="input1" placeholder="First Name">
                </div>
                <div class="input-col">
                    <label for="input2">Last Name</label>
                    <input type="text" id="input2" name="input2" placeholder="Last Name">
                </div>
            </div>
            <div class="input-row">
                <div class="input-col">
                    <label for="input3">Email</label>
                    <input type="text" id="input3" name="input3" placeholder="Email">
                </div>
                <div class="input-col">
                    <label for="input4">Phone</label>
                    <input type="text" id="input4" name="input4" placeholder="+91 | Phone Number">
                </div>
            </div>
            <div class="input-row">
                <div class="input-col">
                    <label for="input5">Aadhaar No</label>
                    <input type="text" id="input5" name="input5" placeholder="Aadhaar No">
                </div>
                <div class="input-col">
                    <label for="input6">Emp ID</label>
                    <input type="text" id="input6" name="input6" placeholder="Emp ID">
                </div>
            </div>
            <div class="input-row">
                <div class="input-col">
                    <label for="input7">Choose File</label>
                    <input type="file" id="input7" name="input7" accept="image/*">
                </div>
                <div class="input-col">
                    <label for="input8">Address</label>
                    <input type="text" id="input8" name="input8" placeholder="Address">
                </div>
            </div>
            <div class="input-row">
                <div class="input-col">
                    <label for="input9">Password</label>
                    <input type="password" id="input9" name="input9" placeholder="Password">
                </div>

            </div>
            <div class="input-row">
                <div class="input-col">
                    <label>User Permission</label><br>
                    <input type="checkbox" id="project" name="permissions[]" value="project">
                    <label for="project">Project</label><br>
                    <input type="checkbox" id="app" name="permissions[]" value="app">
                    <label for="app">App</label><br>
                    <input type="checkbox" id="calendar" name="permissions[]" value="calendar">
                    <label for="calendar">Calendar</label><br>
                    <input type="checkbox" id="keyword_research" name="permissions[]" value="keyword_research">
                    <label for="keyword_research">Keyword Research</label><br>
                    <input type="checkbox" id="scheduling" name="permissions[]" value="scheduling">
                    <label for="scheduling">Scheduling</label><br>
                    <input type="checkbox" id="blog_writing" name="permissions[]" value="blog_writing">
                    <label for="blog_writing">Blog Writing</label><br>
                    <input type="checkbox" id="media" name="permissions[]" value="media">
                    <label for="media">Media</label><br>
                    <input type="checkbox" id="email" name="permissions[]" value="email">
                    <label for="email">Email</label><br>
                    <input type="checkbox" id="sms" name="permissions[]" value="sms">
                    <label for="sms">SMS</label><br>
                    <input type="checkbox" id="configuration" name="permissions[]" value="configuration">
                    <label for="configuration">Configuration</label><br>
                    <input type="checkbox" id="affiliate_pages" name="permissions[]" value="affiliate_pages">
                    <label for="affiliate_pages">Affiliate Pages</label><br>
                    <input type="checkbox" id="prompt_add_block" name="permissions[]" value="prompt_add_block">
                    <label for="prompt_add_block">Prompt Add Block</label><br>
                    <input type="checkbox" id="section_components" name="permissions[]" value="section_components">
                    <label for="section_components">Section & Components</label><br>
                </div>
            </div>
            <div class="button-row">
                <button type="submit" class="btn btn-primary">Create</button>
                <button type="button" class="btn btn-outline-secondary">Cancel</button>
            </div>
        </div>
    </form>
</div>

@endsection