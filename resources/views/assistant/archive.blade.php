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
                    <h5 class="card-title">Deleted Assistants</h5>
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
                            @forelse ($assistants as $assistant)
                                <tr>
                                    <td>{{ $assistant->id }}</td>
                                    <td>{{ $assistant->name_ar }}</td>
                                    <td>{{ $assistant->name_en }}</td>
                                    <td>{{ $assistant->email }}</td>
                                    <td>{{ $assistant->phone }}</td>
                                    <td>{{ $assistant->age }}</td>
                                    <td>{{ $assistant->gender == 'm' ? 'Male' : 'Female' }}</td>\
                                    <td>{{ $assistant->training_path }}</td>
                                    <td>{{ $assistant->years_of_experiense }}</td>
                                    <td>{{ $assistant->address }}</td>
                                    <td>{{ $assistant->city }}</td>
                                    <td>{{ $assistant->university }}</td>
                                    <td>{{ $assistant->faculty }}</td>
                                    <td>{{ $assistant->nationality }}</td>
                                    <td>{{ $assistant->cv }}</td>
                                    <td>{{ $assistant->deleted_at }}</td>
                                    <td>
                                        <!-- Restore Button -->
                                        <form action="{{ route('assistant.restore', $assistant->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="btn btn-success">Restore</button>
                                        </form>

                                        <!-- Force Delete Button -->
                                        <form action="{{ route('assistant.forceDelete', $assistant->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="17" class="text-center">No trashed assistants found.</td>
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
