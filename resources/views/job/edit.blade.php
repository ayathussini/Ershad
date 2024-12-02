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
          <!-- Start Page Content -->
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <form class="form-horizontal" action="{{ route('job.update', $jobs->id) }}" enctype="multipart/form-data" method="post"
                name="editform" id="editform">
                  @method('PUT')
                  @csrf
                  <div class="card-body">
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
                           value="{{ old('title', $jobs->title) }}"
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
                           value="{{ old('description', $jobs->description) }}"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="location"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Location</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="location"
                          placeholder="Location Here"
                          name="location"
                          value="{{ old('location', $jobs->location) }}"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="company"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Company</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="company"
                          placeholder="Company Here"
                          name="company"
                          value="{{ old('company', $jobs->company) }}"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="job_type"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Job_type</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="job_type"
                          placeholder="Job_type Here"
                          name="job_type"
                          value="{{ old('job_type', $jobs->job_type) }}"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="salary"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Salary</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="salary"
                          placeholder="Salary Here"
                          name="salary"
                          value="{{ old('salary', $jobs->salary) }}"
                        />
                      </div>
                   
                  <div class="border-top">
                    <div class="card-body">
                      <button type="submit" class="btn btn-primary" onsubmit="return confirm('Are you sure you want to update this job?');">
                       Update
                      </button>
                     <a href="{{ route('job.index') }}" class="btn btn-secondary">                   
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
@section('customJs')
<script>
    $('#editform').submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'{{route("job.update",$jobs->id)}}',
            type:'put',
            dataType: 'json' ,
            data :$('#editform').serializeArray(),
            success:function(response){
                if(response.status == true){
                     $("#title	").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                      $("#description	").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                      $("#location	").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                      $("#company").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                      $("#job_type		").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                      $("#salary").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                        window.location.href="{{route('job.index')}}";

                }else{
                    var errors=response.errors;
                    if(errors.title){
                        $("#title").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.title[0])
                    }else{
                        $("#title").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }if(errors.description){
                        $("#description").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.description[0])
                    }else{
                        $("#description").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }
                    if(errors.location){
                        $("#location").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.location[0])
                    }else{
                        $("#location").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }
                    if(errors.company){
                        $("#company").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.company[0])
                    }else{
                        $("#company").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }if(errors.job_type){
                        $("#job_type").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.job_type[0])
                    }else{
                        $("#job_type").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }if(errors.salary){
                        $("#salary").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.salary[0])
                    }else{
                        $("#salary").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }
                    
                }

            }  
         });

    })
    </script>
@endsection