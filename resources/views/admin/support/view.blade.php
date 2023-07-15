@extends('layouts.admin')
@section('title','الدعم الفني')
@section('mainTitle','الدعم الفني')
@section('content')

    <div class="flex-row-fluid ml-lg-8">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-body p-0">
                <!-- begin: Invoice-->
                <!-- begin: Invoice header-->
                <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
                    <div class="col-md-10">
                        <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                            <h1 class="display-4 font-weight-boldest mb-10">الدعم الفني</h1>

                        </div>


                        <table class="table table-bordered" style="text-align: center;">
                            <thead>


                            <tr>
                                <th scope="col">اسم المستخدم</th>
                                <th scope="col">الرسالة </th>
                                <th scope="col">الرد </th>

                            </tr>

                            </thead>
                            <tbody>
                            <tr class="font-weight-boldest">
                                <td>{{$support->user?$support->user->name:''}}</td>
                                <td>{{$support->message}}</td>

                            </tr>
                            </tbody>
                        </table>
                            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                                <div class="col-md-10">
                                   الرد
                                    <form class="needs-validation "  name="update_status" id="my-form" method="POST" >
                                        @csrf
                                        <input type="hidden" value="{{$support->id}}" name="supportId">
                                        <textarea class="form-control" name="replayMessage">

                                        </textarea>
                                        <div class="row m-3">
                                            <button type="submit" class="btn btn-primary font-weight-bold">تاكيد</button>

                                        </div>
                                    </form>
                                    {{--                        @endif--}}
                                    <!-- end: Invoice footer-->
                                    <!-- begin: Invoice action-->
                                    <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                                        <div class="col-md-10">
                                            <div class="d-flex justify-content-between">
                                                {{--                                    <button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">Download Order Details</button>--}}
                                                {{--                                    <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">Print Order Details</button>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end: Invoice action-->
                                    <!-- end: Invoice-->
                                </div>
                            </div>
                        <!--end::Card-->
                    </div>
                </div>
            </div>

        </div>
            @endsection
            @section('scripts')
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>

                <script>
                    $("form[name='update_status']").validate({
                        rules: {
                            replayMessage: "required",


                        },
                        messages:{
                        replayMessage:"هذا الحقل مطلوب",
                        },
                        submitHandler: function(form) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            // var my_form=$('#my-form');
                            var data= new FormData(document.getElementById("my-form"));


                            // console.log(data);
                            $('#send_form').html('Sending..');
                            $.ajax({
                                url: '{{route('admin.support.Reply')}}' ,
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

                                        location.reload();
                                    }else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: response.message,
                                        })
                                    }
                                },
                                error: function(response) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: response.message,
                                    })
                                }
                            });


                        }

                    });

                </script>
@endsection

