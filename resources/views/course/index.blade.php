@extends('includes.layout')
@section('main')
 <div class="page-wrapper">
        <!-- Bread crumb -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Courses</h4>
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
                  <h5 class="card-title">All Courses</h5>
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
                          <th>Instructor</th>
                          <th>Category</th>
                          <th>Duration</th>                 
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($courses as $course )
                            
                        <tr>
                          <td>{{ $course->id }}</td>
                          <td>{{ $course->title}}</td>
                          <td>{{ $course->description }}</td>
                          <td>{{ $course->instructor}}</td>
                          <td>{{ $course->category}}</td>
                          <td>{{ $course->duration}}</td>
                          <td>
                            <a href="{{ route('course.show', $course->id) }}" class="btn btn-primary">show</a>
                            <a href="{{ route('course.edit', $course->id) }}" class="btn btn-success">edit</a>
                            <form action="{{ route('course.delete', $course->id) }}" method="POST" style="display:inline;">
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