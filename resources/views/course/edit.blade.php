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
              <h4 class="page-title">Course</h4>
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
                <form class="form-horizontal" action="{{ route('course.update', $courses->id) }}" enctype="multipart/form-data" method="post"
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
                           value="{{ old('title', $courses->title) }}"
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
                           value="{{ old('description', $courses->description) }}"
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
                          value="{{ old('instructor', $courses->instructor) }}"
                        />
                      </div>
                    </div>
                     <div class="form-group row">
                      <label
                        for="category"
                        class="col-sm-3 text-end control-label col-form-label"
                        >category</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="category"
                          placeholder="Category Here"
                          name="category"
                          value="{{ old('category', $courses->category) }}"
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
                          value="{{ old('duration', $courses->duration) }}"
                        />
                      </div>
                    </div> <div class="form-group row">
                      <label
                        for="course_link"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Course_link </label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="course_link"
                          placeholder="Course_link Here"
                          name="course_link"
                          value="{{ old('course_link', $courses->course_link) }}"
                        />
                      </div>
                    </div>
                   
                    </div>
                  <div class="border-top">
                    <div class="card-body">
                        <a href="{{ route('course.index') }} " style="color: white">
                      <button  type="submit" class="btn btn-primary" onsubmit="return confirm('Are you sure you want to update this course?');">
                       Update
                      </button>
                      <a href="{{ route('course.index') }}" class="btn btn-secondary">                                        
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
            url:'{{route("course.update",$courses->id)}}',
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
                      $("#instructor	").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                      $("#duration").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                      $("#category").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                        window.location.href="{{route('course.index')}}";

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
                    if(errors.instructor){
                        $("#instructor").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.instructor[0])
                    }else{
                        $("#instructor").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }
                    if(errors.duration){
                        $("#duration").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.duration[0])
                    }else{
                        $("#duration").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }if(errors.category){
                        $("#category").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.category[0])
                    }else{
                        $("#category").removeClass('is-invalid')
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