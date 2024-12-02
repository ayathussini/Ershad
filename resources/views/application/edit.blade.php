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
              <h4 class="page-title">Application</h4>
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
                <form class="form-horizontal" action="{{ route('application.update', $applications->id) }}" enctype="multipart/form-data" method="post"
                name="editform" id="editform">
                  @method('PUT')
                  @csrf
                  <div class="card-body">
                  <div class="form-group row">
                      <label
                        for="student_id"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Student_id</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="number"
                          class="form-control"
                          id="student_id"
                          placeholder="Student_id Here"
                          name="student_id"
                           value="{{ old('student_id', $applications->student_id) }}"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="job_id"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Job_id</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="number"
                          class="form-control"
                          id="job_id"
                          placeholder="Job_id Here"
                          name="job_id"
                           value="{{ old('job_id', $applications->job_id) }}"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="status"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Status</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="status"
                          placeholder="Status Here"
                          name="status"
                          value="{{ old('status', $applications->status) }}"
                        />
                      </div>
                    </div>
                    <div class="border-top">
                    <div class="card-body">
                      <button  type="submit" class="btn btn-primary" onsubmit="return confirm('Are you sure you want to update this application?');">
                       Update
                      </button>
                      <div><a href="{{ route('application.index') }}" class="btn btn-secondary mt-3">Back</a>
                        </a>
                    </div>
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
            url:'{{route("application.update",$applications->id)}}',
            type:'put',
            dataType: 'json' ,
            data :$('#editform').serializeArray(),
            success:function(response){
                if(response.status == true){
                     $("#student_id	").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                      $("#job_id").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                      $("#status").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                        window.location.href="{{route('application.index')}}";

                }else{
                    var errors=response.errors;
                    if(errors.student_id){
                        $("#student_id").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.student_id[0])
                    }else{
                        $("#student_id").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }if(errors.job_id){
                        $("#job_id").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.job_id[0])
                    }else{
                        $("#job_id").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }
                    if(errors.status){
                        $("#status").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.status[0])
                    }else{
                        $("#status").removeClass('is-invalid')
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