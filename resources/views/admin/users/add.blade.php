@extends('layouts.admin')
@section('title')
    مدير النظام-اضافة

@endsection


@section('content')

    <div class="card card-custom">
        <div class="card-header flex-wrap">
            <div class="card-title">
                <h1 class="card-label">مدير النظام  </h1>
            </div>
            <div class="card-toolbar">
                <!--begin::Dropdown-->

                <!--end::Dropdown-->
                <!--begin::Button-->


                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <form class="needs-validation " id="my-form" name="my-form" method="POST" enctype="multipart/form-data">

                <div class="modal-body">
                    @csrf
                    <div class="alert alert-danger" style="display:none"></div>

                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12">

                            <label for="name">
                                 الاسم
                                    <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}"
                                 placeholder="">
                            <div class="alert alert-danger name_error" style="display: none"></div>

                        </div>
                        <div class="col-lg-6 col-sm-12">

                            <label for="email">
                                الايميل
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="email" class="form-control" id="email" value="{{old('email')}}"
                                   placeholder="">

                                    <div class="alert alert-danger email_error" style="display: none"></div>

                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>


                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12">

                            <label for="phone">
                                رقم الجوال
                                    <span class="text-danger">*</span>
                                </label>

                            <input type="text" name="phone" value="{{old('phone')}}" class="form-control" id="phone"
                                   aria-describedby="emailHelp" placeholder="">
                            <div class="alert alert-danger phone_error" style="display: none"></div>

                        </div>

                        <div class="col-lg-6 col-sm-12">

                            <label for="password">
                                كلمة المرور
                                <span class="text-danger">*</span>
                            </label>
                            <input type="password" name="password" value="" class="form-control" id="password"
                                   aria-describedby="emailHelp" placeholder="">
                            <div class="alert alert-danger password_error" style="display: none"></div>

                        </div>




                    </div>
                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label for="role_id">الصلاحية
                                <span class="text-danger">*</span>

                            </label>
                            <select class="form-control"

                                    name="role_id"
                                    id="role_id">
                                <option value="">اختر</option>
                        @foreach($roles as $value)
                                    <option value="{{$value->id}}" >{{$value->name}}</option>

                                @endforeach
                            </select>

                            <div class="alert alert-danger role_id_error" style="display: none"></div>

                        </div>

                            <div class="col-lg-6 col-sm-12">
                                <label for="banner_image">
                                    الحالة

                                </label>

                                <span class="switch switch-icon">
																<label>
																	<input type="checkbox"  value="1" name="status"  checked="checked"/>
																	<span></span>
																</label>
															</span>


                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12">
                            <label for="banner_image">
                                صورة

                            </label>
                            <input class="form-control image" type="file" name="image" id="banner_image" onchange="readURL(this);" >
                            <div class="invalid-feedback">
                                الصورة
                            </div>
                        </div>


                        <div class="w-50 text-center">


                            <img src="{{asset('assets/users.png')}}" style="width: 100px"
                                 class="img-thumbnail img-preview"  id="imagePreview" alt="">

                        </div>

                    </div>






                            <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><span><i class="fa fa-paper-plane"
                                                                               aria-hidden="true"></i></span>
                          تاكيد

                        </button>


                    </div>
            </form>

        </div>
    </div>



@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>

    <script>
        $("form[name='my-form']").validate({
            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                name: {
                    required: true,

                },
                email: {
                    required: true,
                    email: true,

                },

                phone: {
                    required: true,

                },
                password: {
                    required: true,
                    // min:6,
                },
                role_id: {
                    required: true,

                }

            },

            submitHandler: function(form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // var my_form=$('#my-form');
                var data= new FormData(document.getElementById("my-form"));


                $('#send_form').html('Sending..');
                $.ajax({
                    url: '{{route('admin.admins.store')}}' ,
                    type: "POST",
                    data: data,
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,

                    success: function( response ) {


                        if (response.status==201){
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1000
                            });
                            setTimeout( function(){
                                    window.location.replace('{{route("admin.admins.index")}}')
                                }
                                ,
                                2000 );

                        }else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response.data,
                            })
                        }
                    },
                    error: function(response) {
                        // Object.keys(response['responseText']).forEach(key => {
                        // });
                        const obj = JSON.parse(response['responseText']);
                        // console.log();

                        jQuery.each(obj.errors, function(key, value){

                            $('.'+key+'_error').show();
                            $('.'+key+'_error').text(value);
                            //
                        });
                    }
                });


            }

        });


        $("form[name='edit_admin']").validate({
            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                name: {
                    required:true,

                },
                email: {
                    required:true,
                    email:true,

                },

                phone:{
                    required:true,

                },
                password:{
                    // required:true,
                    // min:6/
                },
                role_id:{
                    required:true,

                }



            },

            submitHandler: function(form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // var my_form=$('#my-form');
                var data= new FormData(document.getElementById("edit_admin"));

                $('#send_form').html('Sending..');
                $.ajax({
                    url: '{{route('admin.admins.update')}}' ,
                    type: "POST",
                    data: data,
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,

                    success: function( response ) {
                        if (response.status==201){
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1000
                            });
                            setTimeout( function(){
                                    window.location.replace('{{route("admin.admins.index")}}')
                                }
                                ,
                                2000 );

                        }else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response.message,
                            })
                        }
                    },
                    error: function(response) {
                        // Object.keys(response['responseText']).forEach(key => {
                        // });
                        const obj = JSON.parse(response['responseText']);


                        jQuery.each(obj.errors, function(key, value){
                            console.log();
                            //
                            //     // // alert(key);
                            //     // alert(value);
                            //
                            //     jQuery('.alert-danger').show();

                            $('.'+key+'_error').show();
                            $('.'+key+'_error').text(value);
                            //
                        });
                    }

                });


            }


        });

        function readURL(input) {
            console.log(input.files);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(".img-preview").attr("src", e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
@endsection
