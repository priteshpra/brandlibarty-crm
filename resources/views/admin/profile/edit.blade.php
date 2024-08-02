@extends('layouts.admin')
@section('content')
<div class="page-content">
    <!-- Profile Information -->
    <div class="row">
        <div class="col-md-8 col-lg-8 col-xl-6">
            <div class="profile-info">
                <a class="text-black" href="{{route('profile.edit',$profile->UserID)}}">
                    <h4>My Profile</h4>
                </a>
                <form class="needs-validation" novalidate action="{{ route('profile.update', $profile->UserID) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="profile-list">
                        <div class="profile-detail">
                            <label class="avatar profile-cover-avatar">
                                <img class="avatar-img" src="{{ asset('/assets/admin/img/profiles/avatar-02.jpg') }}" alt="Profile Image">
                            </label>
                            <div class="pro-name">
                                <p>@ {{ $profile->EmailID }}</p>
                                <h4>{{ $profile->FirstName }} {{ $profile->LastName }}</h4>
                            </div>
                            <!-- <a href="#" class="edit-pro"><i class="feather-edit"></i> Edit</a> -->
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="pro-title">Personal Information</h6>
                                <!-- <textarea>ipsum dolor sit amet, consectetur adipiscing elit. Turpis adipiscing arcu praesent tellus aliquam quam volutpat. Etiam tincidunt habitant sit maecenas feugiat eget convallis. Aliquam non viverra accumsan vulputate id aliquam et enim vivamus. </textarea> -->
                            </div>
                            <div class="col-md-4 mb-3">
                                <h5>Date of Birth</h5>
                                <p>{{ $profile->BirthDate}}</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <h5>Gender</h5>
                                <p>Male</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <h5>Age</h5>
                                <p>46</p>
                            </div>
                            <div class="col-md-12">
                                <h6 class="pro-title">Address & Location</h6>
                            </div>
                            <div class="col-md-4">
                                <h5>Address</h5>
                                <p>{{ $profile->Address }}</p>
                            </div>
                            <div class="col-md-4">
                                <h5>Country</h5>
                                <p>United States</p>
                            </div>
                            <div class="col-md-4">
                                <h5>State</h5>
                                <p>Florida</p>
                            </div>
                        </div>
                    </div>
                    <div class="profile-list">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pro-title d-flex justify-content-between">
                                    <h6>Account Information</h6>
                                    <!-- <a href="#" class="edit-pro"><i class="feather-edit"></i> Edit</a> -->
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h5>Email Address</h5>
                                <p>{{ $profile->EmailID }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h5>Phone Number</h5>
                                <p>{{ $profile->MobileNo }}</p>
                            </div>
                            <div class="col-md-6">
                                <h5>Social Links</h5>
                                <ul class="social-icon">
                                    <li>
                                        <a href="#"><i class="feather-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="feather-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="feather-linkedin"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="feather-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="feather-youtube"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="text-end settings-btns">
                                <button type="submit" class="btn btn-orange" tabindex="6">Update</button>
                            </div>
                        </div> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Profile Information -->
</div>
@endsection