@extends('includes.layout')
@section('main')
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Student Details</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Students</a></li>
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
                        <h4 class="card-title">student Information</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $students->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Name (Arabic)</th>
                                        <td>{{ $students->name_ar }}</td>
                                    </tr>
                                    <tr>
                                        <th>Name (English)</th>
                                        <td>{{ $students->name_en }}</td>
                                    </tr>
                                    <tr>
                                        <th>Age</th>
                                        <td>{{ $students->age }}</td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td>{{ $students->gender == 'm' ? 'Male' : 'Female' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $students->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{ $students->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{ $students->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <td>{{ $students->city }}</td>
                                    </tr>
                                    <tr>
                                        <th>University</th>
                                        <td>{{ $students->university }}</td>
                                    </tr>
                                    <tr>
                                        <th>Faculty</th>
                                        <td>{{ $students->faculty }}</td>
                                    </tr>
                                    <tr>
                                        <th>Training Path</th>
                                        <td>{{ $students->training_path }}</td>
                                    </tr>
                                    <tr>
                                        <th>Personality Test Results</th>
                                        <td>{{ $students->personality_test_results }}</td>
                                    </tr>
                                    <tr>
                                        <th>English Level Test Results</th>
                                        <td>{{ $students->english_level_test_results }}</td>
                                    </tr>
                                    <tr>
                                        <th>Path</th>
                                        <td>@foreach ($student->paths as $path)
                                            <p>{{ $path->name }}</p>
                                        @endforeach
                                    </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div><a href="{{ route('student.index') }}" class="btn btn-secondary mt-3">Back</a>
                    <a href="{{ route('student.edit', $students->id) }}" class="btn btn-info mt-3">Edit</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Container fluid -->
</div>
@endsection
