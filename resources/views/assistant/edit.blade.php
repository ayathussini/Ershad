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
              <h4 class="page-title">Edit Assistant</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                    <a href="#">Edit Assistant</a></li>
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
            <div class="col-md-12">
              <div class="card">
                <form class="form-horizontal" action="{{ route('assistant.update', $assistants->id) }}" enctype="multipart/form-data" method="post"
                  name="userForm" id="userForm" >
                  @method('PUT')
                  @csrf
                  <div class="card-body">
                    <div class="form-group row">
                      <label
                        for="name_ar"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Name_ar</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="name_ar"
                          name="name_ar"
                          value="{{ old('name_ar', $assistants->name_ar) }}"
                        />
                      </div>
                      <p class="text-danger"></p>
                    </div>
                    <div class="form-group row">
                      <label
                        for="name_en"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Name_en</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="name_en"
                          name="name_en"
                          value="{{ old('name_en', $assistants->name_en) }}"
                        />
                      </div>
                      <p class="text-danger"></p>
                    </div>
                    <div class="form-group row">
                      <label
                        for="age"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Age</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="age"
                          name="age"
                          value="{{ old('age', $assistants->age) }}"
                        />
                      </div>
                      <p class="text-danger"></p>
                    </div>
                   <div class="form-group row">
                    <label
                        for="customControlValidation1"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Gender</label
                      >
                      <div class="col-md-9">
                        <div class="form-check">
                          <input
                            type="radio"
                            class="form-check-input"
                            id="customControlValidation1"
                            name="gender"
                            value="m"
                            {{ old('gender', $assistants->gender) == 'm' ? 'checked' : '' }}
                          />
                          <label
                            class="form-check-label mb-0"
                            for="customControlValidation1"
                            >Male</label
                          >
                        </div>
                        <div class="form-check">
                          <input
                            type="radio"
                            class="form-check-input"
                            id="customControlValidation2"
                            name="gender"
                            value="f"
                            {{ old('gender', $assistants->gender) == 'f' ? 'checked' : '' }}
                          />
                          <label
                            class="form-check-label mb-0"
                            for="customControlValidation2"
                            >Female</label
                          >
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="email"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Email</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="email"
                          name="email"
                          value="{{ old('email', $assistants->email) }}"
                        />
                      </div>
                      <p class="text-danger"></p>
                    </div>
                    <div class="form-group row">
                      <label
                        for="phone"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Phone</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="phone"
                          name="phone"
                          value="{{ old('phone', $assistants->phone) }}"
                        />
                      </div>
                      <p class="text-danger"></p>
                    </div>
                    <div class="form-group row">
                      <label
                        for="address"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Address</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="address"
                          name="address"
                          value="{{ old('address', $assistants->address) }}"
                        />
                      </div>
                      <p class="text-danger"></p>
                    </div>
                    <div class="form-group row">
                      <label
                        for="city"
                        class="col-sm-3 text-end control-label col-form-label"
                        >City</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="city"
                          name="city"
                          value="{{ old('city', $assistants->city) }}"
                        />
                      </div>
                      <p class="text-danger"></p>
                    </div>
                    <div class="form-group row">
                      <label
                        for="nationality"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Nationality</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="nationality"
                          name="nationality"
                          value="{{ old('nationality', $assistants->nationality) }}"
                        />
                      </div>
                      <p class="text-danger"></p>
                    </div>
                    <div class="form-group row">
                      <label
                        for="university"
                        class="col-sm-3 text-end control-label col-form-label"
                        >University</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="university"
                          name="university"
                          value="{{ old('university', $assistants->university) }}"
                        />
                      </div>
                      <p class="text-danger"></p>
                    </div>
                    <div class="form-group row">
                      <label
                        for="faculty"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Faculty</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="faculty"
                          name="faculty"
                          value="{{ old('faculty', $assistants->faculty) }}"
                        />
                      </div>
                      <p class="text-danger"></p>
                    </div>
                    <div class="form-group row">
                      <label
                        for="training_path"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Training_path</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="training_path"
                          name="training_path"
                          value="{{ old('training_path', $assistants->training_path) }}"
                        />
                      </div>
                      </div>
                      <div class="form-group row">
                      <label
                        for="years_of_experiense"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Years_of_Exp</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="number"
                          class="form-control"
                          id="years_of_experiense"
                          name="years_of_experiense"
                          value="{{ old('years_of_experiense', $assistants->years_of_experiense) }}"
                        />
                      </div>
                      <p class="text-danger"></p>
                    </div>
                    <div class="form-group row">
                      <label
                        for="cv"
                        class="col-sm-3 text-end control-label col-form-label"
                        >cv</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="file"
                          class="form-control"
                          id="cv"
                          name="cv"
                          value="{{ old('cv', $assistants->cv) }}"
                        />
                      </div>
                      <p class="text-danger"></p>
                    </div>
                    <p class="text-danger"></p>
                   <div>                   
                    <div class="border-top">
                    <div class="card-body">
                      <button type="submit" class="btn btn-primary">
                         <a href="{{ route('assistant.index') }}" style="color: white" >      Save Changes
                    
                      </button>
                      <a href="{{ route('assistant.index') }}" class="btn btn-secondary">
                        Cancel
                      </a>
                    </div>


@endsection


@section('customJs')
<script>
    $('#userForm').submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'{{route("assistant.update",$assistants->id)}}',
            type:'put',
            dataType: 'json' ,
            data :$('#userForm').serializeArray(),
            success:function(response){
                if(response.status == true){
                     $("#name_ar").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                      $("#name_en").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('') 
                      $("#age").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('') 
                      $("#gender").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                      $("#email").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                      $("#phone").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('') 
                      $("#address").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                      $("#city").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('') 
                      $("#university").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                      $("#faculty").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('') 
                      $("#nationality").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                      $("#training_path").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('') 
                        $("#cv").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                      $("#years_of_experiense").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                        window.location.href="{{route('assistant.index')}}";

                }else{
                    var errors=response.errors;
                    if(errors.name_ar){
                        $("#name_ar").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.name_ar[0])
                    }else{
                        $("#name_ar").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }if(errors.name_en){
                        $("#name_en").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.name_en[0])
                    }else{
                        $("#name_en").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }
                    if(errors.email){
                        $("#email").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.email[0])
                    }else{
                        $("#email").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }
                    if(errors.phone){
                        $("#phone").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.phone[0])
                    }else{
                        $("#phone").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }if(errors.address){
                        $("#address").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.address[0])
                    }else{
                        $("#address").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }if(errors.age){
                        $("#age").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.age[0])
                    }else{
                        $("#age").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }if(errors.city){
                        $("#city").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.city[0])
                    }else{
                        $("#city").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }if(errors.university){
                        $("#university").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.university[0])
                    }else{
                        $("#university").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }if(errors.faculty){
                        $("#faculty").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.faculty[0])
                    }else{
                        $("#faculty").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }if(errors.nationality){
                        $("#nationality").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.nationality[0])
                    }else{
                        $("#nationality").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }if(errors.training_path){
                        $("#training_path").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.training_path[0])
                    }else{
                        $("#training_path").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }if(errors.cv){
                        $("#cv").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.cv[0])
                    }else{
                        $("#cv").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }if(errors.years_of_experiense){
                        $("#years_of_experiense").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.years_of_experiense[0])
                    }else{
                        $("#years_of_experiense").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }
                    }
                    
                }

            }  
         });

    })
    </script>
@endsection