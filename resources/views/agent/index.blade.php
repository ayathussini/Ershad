@extends('includes.layout')
@section('main')
 <div class="page-wrapper">
        <!-- Bread crumb -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Agents</h4>
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
                  <h5 class="card-title">All Agents</h5>
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
                        @foreach ($agents as $agent )
                            
                        <tr>
                          <td>{{ $agent->id }}</td>
                          <td>{{ $agent->name_en}}</td>
                          <td>{{ $agent->path }}</td>
                          <td>{{ $agent->age}}</td>
                          <td>{{ $agent->gender}}</td>
                          <td>{{ $agent->email}}</td>
                          <td>{{ $agent->phone}}</td>
                          <td>{{ $agent->city}}</td>
                          <td>{{ $agent->cv }}</td>
                          <td>{{ $agent->support_type }}</td>
                          <td>{{ $agent->available_time }}</td>
                          <td>
                            <a href="{{ route('agent.show', $agent->id) }}" class="btn btn-primary">show</a>
                            <a href="{{ route('agent.edit', $agent->id) }}" class="btn btn-success">edit</a>
                            <form action="{{ route('agent.index', $agent->id) }}" method="POST" style="display:inline;">
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