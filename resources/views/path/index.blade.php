@extends('includes.layout')
@section('main')
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Paths</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="{{ route('path.index') }}">Paths</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bread crumb -->

    <!-- Container fluid -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">All Paths</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Duration</th>
                                        <th>Level</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paths as $path)
                                    <tr>
                                        <td>{{ $path->id }}</td>
                                        <td>{{ $path->name }}</td>
                                        <td>{{ $path->description }}</td>
                                        <td>{{ $path->duration }}</td>
                                        <td>{{ $path->level }}</td>
                                        <td>
                                            <a href="{{ route('path.show', $path->id) }}" class="btn btn-primary btn-sm">Show</a>
                                            <a href="{{ route('path.edit', $path->id) }}" class="btn btn-success btn-sm">Edit</a>
                                            <form action="{{ route('path.delete', $path->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this job?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Content -->
    </div>
    <!-- End Container fluid -->
</div>
@endsection
