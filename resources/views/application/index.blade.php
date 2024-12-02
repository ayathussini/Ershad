    @extends('includes.layout')
    @section('main')
    <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Applications</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        <a href="#">Add New</a></li>
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
                    <h5 class="card-title">All Applications</h5>
                    <div class="table-responsive">
                        <table
                        id="zero_config"
                        class="table table-striped table-bordered"
                        >
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Student_id</th>
                            <th>Job_id</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $application )
                                
                            <tr>
                            <td>{{ $application->id }}</td>
                            <td>{{ $application->student_id}}</td>
                            <td>{{ $application->job_id }}</td>
                            <td>{{ $application->status}}</td>
                            <td>
                                <a href="{{ route('application.show', $application->id) }}" class="btn btn-primary">show</a>
                                <a href="{{ route('application.edit', $application->id) }}" class="btn btn-success">edit</a>
                                <form action="{{ route('application.delete', $application->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                                </form>                          </td>

                            </tr>
                        @endforeach

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