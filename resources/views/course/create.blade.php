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
              <h4 class="page-title">Students</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                <form class="form-horizontal" action="{{ route('course.store') }}" method="post">
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
                        for="instructor"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Instructor</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="instructor"
                          placeholder="Instructor Here"
                          name="instructor"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="category"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Category</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="category"
                          placeholder="Category Here"
                          name="category"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="duration"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Duration</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="duration"
                          placeholder="Duration Here"
                          name="duration"
                        />
                      </div>
                    </div> 
                    <div class="form-group row">
                      <label
                        for="course_link"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Course_link</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="course_link"
                          placeholder="Course_link Here"
                          name="course_link"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="border-top">
                    <div class="card-body">
                      <button type="submit" class="btn btn-primary" >
                        Add
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
