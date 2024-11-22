@extends('includes.layout')
@section('main')
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Job Details</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('job.index') }}">Job</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bread crumb -->

    <!-- Container fluid -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Job Information</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $jobs->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td>{{ $jobs->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{{ $jobs->description }}</td>
                                    </tr>
                                    <tr>
                                        <th>Location</th>
                                        <td>{{ $jobs->location }}</td>
                                    </tr>
                                    <tr>
                                        <th>Company</th>
                                        <td>{{ $jobs->company }}</td>
                                    </tr>
                                    <tr>
                                        <th>Job_type</th>
                                        <td>{{ $jobs->job_type }}</td>
                                    </tr>
                                    <tr>
                                        <th>Salary</th>
                                        <td>{{ $jobs->salary }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div><a href="{{ route('job.index') }}" class="btn btn-secondary mt-3">Back</a>
                    <a href="{{ route('job.edit',$jobs->id) }}" class="btn btn-info mt-3">Edit</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Container fluid -->
</div>
@endsection
