@extends('layouts.admin')
@section('content')
<div class="page-content">
    <!-- Doctor List -->
    <div class="row">
        <div class="col-sm-12">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <a class="text-black" href="{{ url('/country') }}">
                                <h5 class="card-title">COUNTRIES</h5>
                            </a>
                        </div>
                        <div class="col-auto d-flex flex-wrap">
                            <div class="form-custom me-2">
                                <div id="tableSearch" class="dataTables_wrapper"></div>
                            </div>
                            <div>
                                <div class="button-block">
                                    <a href="{{ url('/country/create') }}" class="btn btn-success btn-add">ADD NEW</a>
                                    <a href="#" class="btn btn-light btn-add">EXPORT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="datatable table table-borderless hover-table" id="data-table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Country Name</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($country as $country)
                                <tr>
                                    <td>
                                        <h5>{{$country->CountryName}}</h5>
                                    </td>
                                    <td>
                                        <label class="toggle-switch" for="status5">
                                            <input type="checkbox" class="toggle-switch-input" id="status5" {{ $country->Status == 1 ? 'checked': '' }}>
                                            <span class="toggle-switch-label">
                                                <span class="toggle-switch-indicator"></span>
                                            </span>
                                        </label>
                                    </td>
                                    <td class="text-end">
                                        <div class="actions">
                                            <a class="text-black" href="{{ route('country.edit',$country->CountryID) }}">
                                                <i class="feather-edit-3 me-1"></i> Edit
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="tablepagination" class="dataTables_wrapper"></div>
        </div>
    </div>
    <!-- /Doctor List -->
</div>
@endsection