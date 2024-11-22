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
                    <h5 class="card-title">All Students</h5>
                    <div class="table-responsive">
                        <table
                        id="zero_config"
                        class="table table-striped table-bordered"
                        >
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>Faculty</th>
                            <th>Path</th>
                            <th>personality</th>
                            <th>english</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student )
                                
                            <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name_en}}</td>
                            <td>{{ $student->age }}</td>
                            <td>{{ $student->email}}</td>
                            <td>{{ $student->phone}}</td>
                            <td>{{ $student->city}}</td>
                            <td>{{ $student->faculty}}</td>
                            <td>{{ $student->training_path}}</td>
                            <td>{{ $student->personality_test_results}}</td>
                            <td>{{ $student->english_level_test_results }}</td>
                            <td>
                                <a href="{{ route('student.show', $student->id) }}" class="btn btn-primary">Show</a>
                                <a href="{{ route('student.edit',$student->id)}}  "class="btn btn-success">edit</a>
                                <form action="{{ route('student.delete', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger" style="display: inline" >Delete</button>
                              </form>
                         </td>

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