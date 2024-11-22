@extends('includes.layout')
@section('main')
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Applications Details</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('application.index') }}">Applications</a></li>
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
                        <h4 class="card-title">Applications Information</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $applications->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Student_id</th>
                                        <td>{{ $applications->student_id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Job_id</th>
                                        <td>{{ $applications->job_id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>{{ $applications->status }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div><a href="{{ route('application.index') }}" class="btn btn-secondary mt-3">Back</a>
                    <a href="{{ route('application.edit',$applications->id) }}" class="btn btn-info mt-3">Edit</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Container fluid -->
</div>
@endsection
