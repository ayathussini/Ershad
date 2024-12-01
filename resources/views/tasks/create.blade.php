@extends('includes.layout')
@section('main')
 <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >

      <div class="page-wrapper">
        <!-- Bread crumb -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Tasks</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{ route('tasks.create') }}">Add New</a></li>
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
          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
          <!-- Start Page Content -->
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <form class="form-horizontal" action="{{ route('tasks.store') }}" method="post">
                   @method('POST')
                   @csrf
                  <div class="card-body">
                  <div class="form-group row">
                    </div>
                    <div class="form-group row">
                      <label
                        for="title"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Title</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="title"
                          placeholder="Title Here"
                          name="title"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="description"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Description</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="description"
                          placeholder="Description Here"
                          name="description"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="student_id"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Student</label
                      >
                      <div class="col-sm-9">
                       <select name="student_id" id="student_id"  class="form-control" >
                            @foreach($students as $student)
                                <option value="{{ $student->id }}" style="color: black">{{ $student->name }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="due_date"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Due Date</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="due_date"
                          placeholder="Due_date Here"
                          name="due_date"
                        />
                      </div>
                    </div>
               <div class="form-group row">
    <label for="path_id" class="col-sm-3 text-end control-label col-form-label">Path</label>
    <div class="col-sm-9">
        <select name="path_id" id="path_id" class="form-control" required>
            <option value="">Select Path</option>
            @foreach($paths as $path)
                <option value="{{ $path->id }}">{{ $path->name }}</option>
            @endforeach
        </select>
    </div>
</div>


                  </div>
                  <div class="border-top">
                    <div class="card-body">
                      <button type="submit" class="btn btn-primary" >
                        Add Task
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- End Page Content -->

        </div>
        
        
      </div>
      <!-- End Page wrapper -->
    </div>
@endsection
