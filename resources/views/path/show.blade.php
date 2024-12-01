@extends('includes.layout')
@section('main')
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Path Details</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('path.index') }}">Path</a></li>
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
                        <h4 class="card-title">Path Information</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $path->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $path->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{{ $path->description }}</td>
                                    </tr>
                                    <tr>
                                        <th>Duration</th>
                                        <td>{{ $path->duration }}</td>
                                    </tr>
                                    <tr>
                                        <th>Level</th>
                                        <td>{{ $path->level }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div><a href="{{ route('path.index') }}" class="btn btn-secondary mt-3">Back</a>
                    <a href="{{ route('path.edit',$path->id) }}" class="btn btn-info mt-3">Edit</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Container fluid -->
</div>
@endsection
