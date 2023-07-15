@extends('layouts.admin')
@section('title','الدعم الفني')
@section('mainTitle','عرض كافة رسائل الدعم الفني')
@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap">
            <div class="card-title">
                <h1 class="card-label">عرض كافة رسائل الدفعم الفني</h1>
            </div>
            <div class="card-toolbar">
                <!--begin::Dropdown-->

                <!--end::Dropdown-->
                <!--begin::Button-->



                <!--end::Button-->
            </div>
        </div>


        <div class="card-body">

            <table class="table table-head-custom table-vertical-center data-table">
                <thead class="">
                <tr>
                    <th>اسم الشخص</th>
                    <th>الرسالة</th>
                    <th>الرد</th>
                    <th>العمليات</th>
                </tr>
                </thead>
                <tbody>





                </tbody>
            </table>

        </div>
    </div>






@endsection
@section('scripts')

    @include('admin.support.js.js')

@endsection
