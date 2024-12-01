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
              <h4 class="page-name">Path</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{ route('path.create') }}">Add New</a></li>
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
                <form class="form-horizontal" action="{{ route('path.update', $paths->id) }}" enctype="multipart/form-data" method="post"
                name="editform" id="editform">
                  @method('PUT')
                  @csrf
                  <div class="card-body">
                  <div class="form-group row">
                      <label
                        for="name"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Name</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="name"
                          placeholder="Name Here"
                          name="name"
                           value="{{ old('name', $paths->name) }}"
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
                           value="{{ old('description', $paths->description) }}"
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
                          value="{{ old('duration', $paths->duration) }}"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="level"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Level</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="level"
                          placeholder="Level Here"
                          name="level"
                          value="{{ old('level', $paths->level) }}"
                        />
                      </div>
                    </div>                
                  <div class="border-top">
                    <div class="card-body">
                      <button  type="submit" class="btn btn-primary" onsubmit="return confirm('Are you sure you want to update this path?');">
                       Update
                      </button>
                      <a href="{{ route('path.index') }}" class="btn btn-secondary">
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
            url:'{{route("path.update",$paths->id)}}',
            type:'put',
            dataType: 'json' ,
            data :$('#editform').serializeArray(),
            success:function(response){
                if(response.status == true){
                     $("#name	").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                      $("#description	").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                      $("#duration	").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                      $("#level").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                        window.location.href="{{route('path.index')}}";

                }else{
                    var errors=response.errors;
                    if(errors.name){
                        $("#name").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.name[0])
                    }else{
                        $("#name").removeClass('is-invalid')
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
                    }
                    if(errors.level){
                        $("#level").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.level[0])
                    }else{
                        $("#level").removeClass('is-invalid')
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