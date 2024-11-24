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
                    <h5 class="card-title">Deleted Agents</h5>
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
                                <th>Training Path</th>
                                <th>years_of_experiense</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>University</th>
                                <th>Faculty</th>
                                <th>Nationality</th>
                                <th>CV</th>
                                <th>Deleted At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($agents as $agent)
                                <tr>
                                    <td>{{ $agent->id }}</td>
                                    <td>{{ $agent->name_ar }}</td>
                                    <td>{{ $agent->name_en }}</td>
                                    <td>{{ $agent->email }}</td>
                                    <td>{{ $agent->phone }}</td>
                                    <td>{{ $agent->age }}</td>
                                    <td>{{ $agent->gender == 'm' ? 'Male' : 'Female' }}</td>\
                                    <td>{{ $agent->training_path }}</td>
                                    <td>{{ $agent->years_of_experiense }}</td>
                                    <td>{{ $agent->address }}</td>
                                    <td>{{ $agent->city }}</td>
                                    <td>{{ $agent->university }}</td>
                                    <td>{{ $agent->faculty }}</td>
                                    <td>{{ $agent->nationality }}</td>
                                    <td>{{ $agent->cv }}</td>
                                    <td>{{ $agent->deleted_at }}</td>
                                    <td>
                                        <!-- Restore Button -->
                                        <form action="{{ route('agent.restore', $agent->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="btn btn-success">Restore</button>
                                        </form>

                                        <!-- Force Delete Button -->
                                        <form action="{{ route('agent.forceDelete', $agent->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="17" class="text-center">No trashed agents found.</td>
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
