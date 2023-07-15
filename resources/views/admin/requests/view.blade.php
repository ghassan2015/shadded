@extends('layouts.admin')
@section('title','تفاصيل الطلب')
@section('mainTitle','عرض تفاصيل الطلب')
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
                            <h1 class="display-4 font-weight-boldest mb-10">تفاصيل الطلب</h1>

                        </div>


                        <table class="table table-bordered" style="text-align: center;">
                            <thead>


                            <tr>
                                <th scope="col">رقم الطلب</th>
                                <th scope="col">الحالة
                                <th>اسم المستخدم</th>
                                <th>السعر</th>
                                <th scope="col">تاريخ الطلب</th>
                            </tr>

                            </thead>
                            <tbody>
                            <tr class="font-weight-boldest">
                                <td>{{$request->id}}</td>
                                <td>{!!  $request->getStatus()!!}
                                <td>{{$request->user->name}}</td>
                                <td>{{$request->price}}</td>
                                <td>{{$request->created_at->format('Y-m-d')}}</td>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                    <div class="col-md-10">

                        <h6>تفاصيل المستخدم</h6>
                        <table class="table table-bordered" style="text-align: center;">
                            <thead>


                            <tr>
                                <th scope="col">الاسم</th>
                                <th scope="col">رقم الجوال</th>
                                <th scope="col">العنوان</th>
                            </tr>

                            </thead>
                            <tbody>
                            <tr class="font-weight-boldest">


                                <td >
                                    {{$request->user->name}}
                                    <!--end::Symbol-->
                                </td>



                                <td> {{$request->user->mobile}}</td>


                                <td>
                                    {{$request->user->location}}
                                </td>

                            </tr>
                            </tbody>

                        </table>
                        {{--                        </div>--}}
                    </div>
                </div>

                <!-- end: Invoice header-->
                <!-- begin: Invoice body-->
                @if($request->driver)
                <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                    <div class="col-md-10">
                        <h6>تفاصيل الكابتن</h6>

                        <table class="table table-bordered" style="text-align: center;">
                            <thead>
                            <tr>
                                <th scope="col">اسم الكابتن</th>

                                <th scope="col">رقم الجوال</th>
                                <th scope="col">التقيم</th>

                            </tr>
                            </thead>
                            <tbody>
                                <tr class="font-weight-boldest">


                                    <td>
                                        {{$request->driver->user->name}}
                                    </td>



                                    <td>  {{$request->driver->mobile}}</td>
                                    <td>  {{$request->countReviews()}}</td>


                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
                @endif
                <!-- end: Invoice body-->
                <!-- begin: Invoice footer-->
                <!--end::Card-->
            </div>

        </div>
    </div>
            @endsection
