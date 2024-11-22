@extends('includes.layout')
@section('main')
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">agents Details</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('agent.index') }}">agents</a></li>
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
                        <h4 class="card-title">agents Information</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $agents->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Name (Arabic)</th>
                                        <td>{{ $agents->name_ar }}</td>
                                    </tr>
                                    <tr>
                                        <th>Name (English)</th>
                                        <td>{{ $agents->name_en }}</td>
                                    </tr>
                                    <tr>
                                        <th>Age</th>
                                        <td>{{ $agents->age }}</td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td>{{ $agents->gender == 'm' ? 'Male' : 'Female' }}</td>
                                    </tr>
                                    <tr>
                                        <th>years_of_Exp</th>
                                        <td>{{ $agents->years_of_experiense	 }}</td>
                                    </tr><tr>
                                        <th>Email</th>
                                        <td>{{ $agents->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{ $agents->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{ $agents->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <td>{{ $agents->city }}</td>
                                    </tr>
                                    <tr>
                                        <th>University</th>
                                        <td>{{ $agents->university }}</td>
                                    </tr>
                                    <tr>
                                        <th>Faculty</th>
                                        <td>{{ $agents->faculty }}</td>
                                    </tr>
                                    <tr>
                                        <th>Training Path</th>
                                        <td>{{ $agents->training_path }}</td>
                                    </tr>
                                    <tr>
                                        <th>CV</th>
                                        <td>{{ $agents->cv }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div><a href="{{ route('agent.index') }}" class="btn btn-secondary mt-3">Back</a>
                    <a href="{{ route('agent.edit',$agents->id) }}" class="btn btn-info mt-3">Edit</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Container fluid -->
</div>
@endsection
