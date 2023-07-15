@extends('layouts.admin')
@section('title',__('lang.roleEdit'))
@section('mainTitle','تعديل الصلاحيات')
@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">

                <h3 class="card-label">الصلاحيات</h3>
            </div>
        </div>
        <div class="card-body">


            <form class="needs-validation " id="form" name="form" method="POST" enctype="multipart/form-data">

            @csrf
                                            <input type="hidden" name="role_id" value="{{$role->id}}">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">
                                                            </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{ $role->name }}"
                                                                   name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="row">
                                                        @foreach (config('global.permissions') as $name => $value)
                                                            <div class="form-group col-sm-4">


                                                                <span class="switch switch-icon">
                                <label>
                                                                    <input type="checkbox" class="chk-box" name="permissions[]" value="{{ $name }}"  {{ in_array($name, $role->permissions)? 'checked' : '' }}>    {{ $value }}
                                    <span></span>
                                </label>
                            </span>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    @error('categories.0')
                                                    <span class="text-danger"> {{$message}}</span>
                                                    @enderror
                                                </div>
                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary">

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

        $("#form").submit(function (event) {
            event.preventDefault();
            var form = $('#form')[0];
            var data=    new FormData(form);
            // console.log(form.getAll());

            $.ajax({
                url: '{{route('admin.roles.update')}}',
                method: 'POST',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 800000,

                success: function (data) {
                    if (data.status === 201) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: data.message,
                            showConfirmButton: false,
                            timer: 3000
                        });

                        window.location.href="{{route('admin.roles.index')}}"

                        // $('.data-table').DataTable().ajax.reload();
                    }



                },
                error: function (data) {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 2000
                    });
                    $('.data-table').DataTable().ajax.reload();

                }


            });



        });

        {{--$("form[name='my-form']").validate({--}}
        {{--    // Specify validation rules--}}
        {{--    rules: {--}}
        {{--        // The key name on the left side is the name attribute--}}
        {{--        // of an input field. Validation rules are defined--}}
        {{--        // on the right side--}}
        {{--        name: {--}}
        {{--            required: true,--}}

        {{--        },--}}


        {{--        permissions: {--}}
        {{--            required: true,--}}



        {{--        },--}}

        {{--        submitHandler: function(form) {--}}
        {{--            $.ajaxSetup({--}}
        {{--                headers: {--}}
        {{--                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
        {{--                }--}}
        {{--            });--}}

        {{--            // var my_form=$('#my-form');--}}
        {{--            var data= new FormData(document.getElementById("my-form"));--}}

        {{--            $.ajax({--}}
        {{--                url: '{{route('admin.roles.update')}}' ,--}}
        {{--                type: "POST",--}}
        {{--                data: data,--}}
        {{--                dataType: 'JSON',--}}
        {{--                contentType: false,--}}
        {{--                cache: false,--}}
        {{--                processData: false,--}}

        {{--                success: function( response ) {--}}


        {{--                    if (response.status==201){--}}
        {{--                        Swal.fire({--}}
        {{--                            position: 'center',--}}
        {{--                            icon: 'success',--}}
        {{--                            title: response.message,--}}
        {{--                            showConfirmButton: false,--}}
        {{--                            timer: 1000--}}
        {{--                        });--}}
        {{--                        setTimeout( function(){--}}
        {{--                                window.location.replace('{{route("admin.roles.index")}}')--}}
        {{--                            }--}}
        {{--                            ,--}}
        {{--                            2000 );--}}

        {{--                    }else {--}}
        {{--                        Swal.fire({--}}
        {{--                            icon: 'error',--}}
        {{--                            title: 'Oops...',--}}
        {{--                            text: response.data,--}}
        {{--                        })--}}
        {{--                    }--}}
        {{--                },--}}
        {{--                error: function(response) {--}}
        {{--                    // Object.keys(response['responseText']).forEach(key => {--}}
        {{--                    // });--}}
        {{--                    const obj = JSON.parse(response['responseText']);--}}
        {{--                    // console.log();--}}

        {{--                    jQuery.each(obj.errors, function(key, value){--}}

        {{--                        $('.'+key+'_error').show();--}}
        {{--                        $('.'+key+'_error').text(value);--}}
        {{--                        //--}}
        {{--                    });--}}
        {{--                }--}}
        {{--            });--}}


        {{--        }--}}

        {{--    }--}}

        {{--});--}}
    </script>
@endsection
