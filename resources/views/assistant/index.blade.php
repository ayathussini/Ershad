@extends('includes.layout')
@section('main')
 <div class="page-wrapper">
        <!-- Bread crumb -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Assistants</h4>
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
                  <h5 class="card-title">All Assistants</h5>
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Path</th>
                          <th>Years_Of_Experiense</th>
                          <th>Age</th>
                          <th>Gender</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>City</th>
                          <th>CV</th>
                          <th>Support_type</th>
                          <th>Available_time</th>
                          <th>Action</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($assistants as $assistant )
                            
                        <tr>
                          <td>{{ $assistant->id }}</td>
                          <td>{{ $assistant->name_en}}</td>
                          <td>{{ $assistant->path }}</td>
                          <td>{{ $assistant->years_of_experiense}}</td>
                          <td>{{ $assistant->age}}</td>
                          <td>{{ $assistant->gender}}</td>
                          <td>{{ $assistant->email}}</td>
                          <td>{{ $assistant->phone}}</td>
                          <td>{{ $assistant->city}}</td>
                          <td>{{ $assistant->cv }}
                            <a href="{{ Storage::url($assistant->cv) }}" target="_blank">Download</a>
                          </td>
                          <td>{{ $agent->support_type }}</td>
                          <td>{{ $agent->available_time }}</td>
                          <td>
                            <a href="{{ route('assistant.show', $assistant->id) }}" class="btn btn-primary">show</a>
                            <a href="{{ route('assistant.edit', $assistant->id) }}" class="btn btn-success">edit</a>
                            <form action="{{ route('assistant.delete', $assistant->id) }}" method="POST" style="display:inline;">
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