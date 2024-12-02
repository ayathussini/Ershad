    @extends('includes.layout')
    @section('main')
    <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Students</h4>
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
                    <h5 class="card-title">Deleted Students</h5>
                    <div class="table-responsive">
                        <table
                        id="zero_config"
                        class="table table-striped table-bordered"
                        >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name (Arabic)</th>
                                <th>Name (English)</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>University</th>
                                <th>Faculty</th>
                                <th>Nationality</th>
                                <th>Training Path</th>
                                <th>Personality Test Results</th>
                                <th>English Level Test Results</th>
                                <th>Deleted At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->name_ar }}</td>
                                    <td>{{ $student->name_en }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->phone }}</td>
                                    <td>{{ $student->age }}</td>
                                    <td>{{ $student->gender == 'm' ? 'Male' : 'Female' }}</td>
                                    <td>{{ $student->address }}</td>
                                    <td>{{ $student->city }}</td>
                                    <td>{{ $student->university }}</td>
                                    <td>{{ $student->faculty }}</td>
                                    <td>{{ $student->nationality }}</td>
                                    <td>{{ $student->training_path }}</td>
                                    <td>{{ $student->personality_test_results }}</td>
                                    <td>{{ $student->english_level_test_results }}</td>
                                    <td>{{ $student->deleted_at }}</td>
                                    <td>
                                        <!-- Restore Button -->
                                        <form action="{{ route('student.restore', $student->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="btn btn-success">Restore</button>
                                        </form>

                                        <!-- Force Delete Button -->
                                        <form action="{{ route('student.forceDelete', $student->id) }}" method="POST" style="display:inline;">
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
