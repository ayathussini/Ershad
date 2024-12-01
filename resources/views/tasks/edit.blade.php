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
              <h4 class="page-title">tasks</h4>
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
                <form class="form-horizontal" action="{{ route('tasks.update', $tasks->id) }}" enctype="multipart/form-data" method="post"
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
                           value="{{ old('title', $tasks->title) }}"
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
                           value="{{ old('description', $tasks->description) }}"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="student_id"
                        class="col-sm-3 text-end control-label col-form-label"
                        >student_id</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="student_id"
                          placeholder="student_id Here"
                          name="student_id"
                          value="{{ old('student_id', $tasks->student->id) }}"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="due_date"
                        class="col-sm-3 text-end control-label col-form-label"
                        >due_date</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="due_date"
                          placeholder="due_date Here"
                          name="due_date"
                          value="{{ old('due_date', $tasks->due_date) }}"
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
                          placeholder="status Here"
                          name="status"
                          value="{{ old('status', $tasks->status) }}"
                        />
                      </div>
                    </div>
                  <div class="border-top">
                    <div class="card-body">
                      <button type="submit" class="btn btn-primary"onsubmit="return confirm('Are you sure you want to update this task?');">
                       Update
                      </button>
                      <a href="{{ route('student.index') }}" class="btn btn-secondary">
                        Back
                      </a>
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
            url:'{{route("tasks.update",$tasks->id)}}',
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
                      $("#student_id	").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                      $("#due_date").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                      $("#status		").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                        window.location.href="{{route('tasks.index')}}";

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
                    }
                    if(errors.due_date){
                        $("#due_date").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.due_date[0])
                    }else{
                        $("#due_date").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }if(errors.status){
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