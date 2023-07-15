@extends('layouts.admin')
@section('title')
مدير النظام
@endsection
@section('style')

    <style>

        .error .select2-choice.select2-default,
        .error .select2-choices {
            color: #a94442;
            border-color: #a94442;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        }
        .error:focus,
        .error .select2-choice.select2-defaultLfocus,
        .error .select2-choicesLfocus {
            border-color: #843534;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #ce8483;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #ce8483;
        }
        .select2-container .select2-choices .select2-search-field input,
        .select2-container .select2-choice,
        .select2-container .select2-choices,
        .error {
            border-radius: 1px;
        }
    </style>
@endsection
@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap">
            <div class="card-title">
                <h1 class="card-label">عرض كافة مديرين النظام</h1>
            </div>
            <div class="card-toolbar">
                <!--begin::Dropdown-->
{{--                <form action="{{route('admin.admins.excel')}}" method="post">--}}
{{--                    @csrf--}}
                    <div class="card-toolbar">
                        <!--begin::Dropdown-->

                        <!--end::Dropdown-->
                        <!--begin::Button-->
                        <a href="{{route('admin.admins.create')}}" class="btn btn-primary mr-1">اضافة </a>

{{--                        <button class="btn btn-warning excel" name="excel">تصدير </button>--}}
                <!--end::Dropdown-->
                <!--begin::Button-->

                <!--end::Button-->
            </div>
        </div>
        </div>
        <div class="card-body">
            <!--begin::Table-->


                <div class="form-group row m-1">
                    <div class="col-lg-3">
                        <label>الاسم:</label>
                        <input name="name" id="name" class="form-control">

                    </div>
                    <div class="col-lg-3">
                        <label>الايميل:</label>
                        <input name="email" id="email" class="form-control">

                    </div>
                    <div class="col-lg-3">
                        <label>رقم الجوال:</label>
                        <input name="mobile" id="mobile" class="form-control">

                    </div>
                    <div class="col-lg-3">
                        <label>من تاريخ:</label>
                        <div class="input-group date">
                            <input type="text" class="form-control datepicker start_at" readonly="readonly" name="start_at" placeholder=""  />
                            <div class="input-group-append">
																	<span class="input-group-text">
																		<i class="la la-calendar-check-o"></i>
																	</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="form-group row m-1">




                        <div class="col-lg-3">
                            <label>الى  تاريخ:</label>
                            <div class="input-group date">
                                <input type="text" class="form-control end_at" readonly="readonly" name="end_at" placeholder=""  />
                                <div class="input-group-append">
																	<span class="input-group-text">
																		<i class="la la-calendar-check-o"></i>
																	</span>
                                </div>
                            </div>

                        </div>
                    <div class="col-lg-3">
                        <label>الحالة:</label>
                        <select class="form-control"

                                name="status"
                                id="status_id">
                            <option value="">اختر</option>
                            <option value="1" >فعال
                            </option>
                            <option value="0">غير فعال</option>

                        </select>
                    </div>
                </div>

                <div class="form-group row" style="margin: 10px 3px 10px 0px">
                    <div class="col-lg-4">
                        <button class="btn btn-primary " id="btnFiterSubmitSearch">بحث</button>


                    </div>
                </div>
{{--            </form>--}}

            <br>
            <div class="table-responsive">
                <table class="table table-head-custom table-vertical-center data-table" id="kt_advance_table_widget_1">
                    <thead>
                    <tr class="text-left">

                        <th class="pr-0" style="width: 50px"></th>
                        <th >الاسم</th>
                        <th >رقم الجوال</th>
                        <th >الايميل</th>
                        <th >اسم الصلاحية</th>
                        <th>الحالة</th>
                        <th>العمليات</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        </div>




    @include('Shared.delete')
@endsection

@section('scripts')

@include('admin.admin.js.js')

@endsection
