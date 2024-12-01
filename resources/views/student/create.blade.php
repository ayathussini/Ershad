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
                <form class="form-horizontal" action="{{ route('student.store') }}" method="post">
                   @method('POST')
                   @csrf
                  <div class="card-body">
                  <div class="form-group row">
                    
                    </div>
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
                          placeholder="Name_ar Here"
                          name="name_ar"
                        />
                      </div>
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
                          placeholder="Name_en Here"
                          name="name_en"
                        />
                      </div>
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
                          placeholder="Age Here"
                          name="age"
                        />
                      </div>
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
                          placeholder="Email Here"
                          name="email"
                        />
                      </div>
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
                          placeholder="Phone Here"
                          name="phone"
                        />
                      </div>
                    </div><div class="form-group row">
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
                          placeholder="Address Name Here"
                          name="address"
                        />
                      </div>
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
                          placeholder="city Here"
                          name="city"
                        />
                      </div>
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
                          placeholder="Nationality Here"
                          name="nationality"
                        />
                      </div>
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
                          placeholder="University Here"
                          name="university"
                        />
                      </div>
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
                          placeholder="Faculty Here"
                          name="faculty"
                        />
                      </div>
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
                          placeholder="Training_path Here"
                          name="training_path"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="personality_test_results"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Personality_test_results</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="personality_test_results"
                          placeholder="Personality_test_results Here"
                          name="personality_test_results"
                        />
                      </div>
                    </div><div class="form-group row">
                      <label
                        for="english_level_test_results"
                        class="col-sm-3 text-end control-label col-form-label"
                        >English_level_test_results</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="english_level_test_results"
                          placeholder="English_level_test_results Here"
                          name="english_level_test_results"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="border-top">
                    <div class="card-body">
                      <button type="submit" class="btn btn-primary">
                        <a href="" style="color: white">Add</a>
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

{{-- @section('customJs')
<script>
    $('#userForm').submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'{{route("student.create")}}',
            type:'put',
            dataType: 'json' ,
            data :$('#userForm').serializeArray(),
            success:function(response){
                if(response.status == true){
                     $("#name").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                         $("#email").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                        window.location.href="{{route('student.index')}}";

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
                    }if(errors.personality_test_results){
                        $("#personality_test_results").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.personality_test_results[0])
                    }else{
                        $("#personality_test_results").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }if(errors.english_level_test_results){
                        $("#english_level_test_results").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.english_level_test_results[0])
                    }else{
                        $("#english_level_test_results").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }if(errors.password){
                        $("#password").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.password[0])
                    }else{
                        $("#password").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }
                    
                }

            }  
         });

    })
    </script>
@endsection --}}