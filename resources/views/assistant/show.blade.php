@extends('includes.layout')
@section('main')
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Assistants Details</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('assistant.index') }}">assistants</a></li>
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
                        <h4 class="card-title">Assistants Information</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $assistants->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Name (Arabic)</th>
                                        <td>{{ $assistants->name_ar }}</td>
                                    </tr>
                                    <tr>
                                        <th>Name (English)</th>
                                        <td>{{ $assistants->name_en }}</td>
                                    </tr>
                                    <tr>
                                        <th>Age</th>
                                        <td>{{ $assistants->age }}</td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td>{{ $assistants->gender == 'm' ? 'Male' : 'Female' }}</td>
                                    </tr>
                                    <tr>
                                        <th>years_of_Exp</th>
                                        <td>{{ $assistants->years_of_experiense	 }}</td>
                                    </tr><tr>
                                        <th>Email</th>
                                        <td>{{ $assistants->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{ $assistants->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{ $assistants->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <td>{{ $assistants->city }}</td>
                                    </tr>
                                    <tr>
                                        <th>University</th>
                                        <td>{{ $assistants->university }}</td>
                                    </tr>
                                    <tr>
                                        <th>Faculty</th>
                                        <td>{{ $assistants->faculty }}</td>
                                    </tr>
                                    <tr>
                                        <th>Training Path</th>
                                        <td>{{ $assistants->training_path }}</td>
                                    </tr>
                                    <tr>
                                        <th>CV</th>
                                        <td>{{ $assistants->cv }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div><a href="{{ route('assistant.index') }}" class="btn btn-secondary mt-3">Back</a>
                    <a href="{{ route('assistant.edit',$assistants->id) }}" class="btn btn-info mt-3">Edit</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Container fluid -->
</div>
@endsection
