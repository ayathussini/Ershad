    @extends('includes.layout')
    @section('main')
    <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Jobs</h4>
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
                 @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
             {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
           @endif

           @if(Session::has('error'))
           <div class="alert alert-danger alert-dismissible fade show" role="alert">
               {{ Session::get('error') }}
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>
           @endif
            <!-- Start Page Content -->
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Deleted Job</h5>
                    <div class="table-responsive">
                        <table
                        id="zero_config"
                        class="table table-striped table-bordered"
                        >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Location</th>
                                <th>Company</th>
                                <th>Job_type</th>
                                <th>Salary</th>
                                <th>Deleted At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($jobs as $job)
                                <tr>
                                    <td>{{ $job->id }}</td>
                                    <td>{{ $job->title }}</td>
                                    <td>{{ $job->description }}</td>
                                    <td>{{ $job->location }}</td>
                                    <td>{{ $job->company }}</td>
                                    <td>{{ $job->job_type }}</td>
                                    <td>{{ $job->salary }}</td>
                                    <td>{{ $job->deleted_at }}</td>
                                         <td>
                                        <!-- Restore Button -->
                                        <form action="{{ route('job.restore', $job->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="btn btn-success">Restore</button>
                                        </form>

                                        <!-- Force Delete Button -->
                                        <form action="{{ route('job.forceDelete', $job->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="17" class="text-center">No trashed students found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
