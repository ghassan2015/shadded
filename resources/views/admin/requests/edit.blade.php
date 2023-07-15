@extends('layouts.company')
@section('title',__('lang.ShippingCompany'))
@section('mainTitle',__('lang.ViewAllShippingServices'))
    @section('content')


        <div class="card card-custom">
            <div class="card-header flex-wrap">
                <div class="card-title">
                    <h1 class="card-label">   @lang('lang.ViewGeneralStatistics')  <span>
                </div>
                <div>




                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-3">
                        <!--begin::Stats Widget 25-->
                        <div class="card card-custom bg-light-success card-stretch gutter-b">
                            <!--begin::Body-->
                            <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-success">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"></rect>
															<path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3"></path>
															<path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000"></path>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>


                                <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{$OrderTotalCount}}</span>
                                <span class="font-weight-bold text-muted font-size-sm">@lang('lang.orderCount')</span>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Stats Widget 25-->
                    </div>
                    <div class="col-xl-3">
                        <!--begin::Stats Widget 26-->
                        <div class="card card-custom bg-light-danger card-stretch gutter-b">
                            <!--begin::ody-->
                            <div class="card-body">
										<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Compiling.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3"/>
        <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{$completedOrder}}</span>
                                <span class="font-weight-bold text-muted font-size-sm">@lang('lang.completedOrder')</span>

                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Stats Widget 26-->
                    </div>
                    <div class="col-xl-3">
                        <!--begin::Stats Widget 27-->
                        <div class="card card-custom bg-light-info card-stretch gutter-b">
                            <!--begin::Body-->
                            <div class="card-body">
										<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Outgoing-box.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M22,17 L22,21 C22,22.1045695 21.1045695,23 20,23 L4,23 C2.8954305,23 2,22.1045695 2,21 L2,17 L6.27924078,17 L6.82339262,18.6324555 C7.09562072,19.4491398 7.8598984,20 8.72075922,20 L15.381966,20 C16.1395101,20 16.8320364,19.5719952 17.1708204,18.8944272 L18.118034,17 L22,17 Z" fill="#000000"/>
        <path d="M2.5625,15 L5.92654389,9.01947752 C6.2807805,8.38972356 6.94714834,8 7.66969497,8 L16.330305,8 C17.0528517,8 17.7192195,8.38972356 18.0734561,9.01947752 L21.4375,15 L18.118034,15 C17.3604899,15 16.6679636,15.4280048 16.3291796,16.1055728 L15.381966,18 L8.72075922,18 L8.17660738,16.3675445 C7.90437928,15.5508602 7.1401016,15 6.27924078,15 L2.5625,15 Z" fill="#000000" opacity="0.3"/>
        <path d="M11.1288761,0.733697713 L11.1288761,2.69017121 L9.12120481,2.69017121 C8.84506244,2.69017121 8.62120481,2.91402884 8.62120481,3.19017121 L8.62120481,4.21346991 C8.62120481,4.48961229 8.84506244,4.71346991 9.12120481,4.71346991 L11.1288761,4.71346991 L11.1288761,6.66994341 C11.1288761,6.94608579 11.3527337,7.16994341 11.6288761,7.16994341 C11.7471877,7.16994341 11.8616664,7.12798964 11.951961,7.05154023 L15.4576222,4.08341738 C15.6683723,3.90498251 15.6945689,3.58948575 15.5161341,3.37873564 C15.4982803,3.35764848 15.4787093,3.33807751 15.4576222,3.32022374 L11.951961,0.352100892 C11.7412109,0.173666017 11.4257142,0.199862688 11.2472793,0.410612793 C11.1708299,0.500907473 11.1288761,0.615386087 11.1288761,0.733697713 Z" fill="#000000" fill-rule="nonzero" transform="translate(11.959697, 3.661508) rotate(-90.000000) translate(-11.959697, -3.661508) "/>
    </g>
</svg><!--end::Svg Icon--></span>
                                <h6></h6>
                                <label></label>

                                <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{$shipmentOrder}}</span>
                                <span class="font-weight-bold text-muted font-size-sm">@lang('lang.shipmentOrder')</span>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Stats Widget 27-->
                    </div>
                    <div class="col-xl-3">
                        <!--begin::Stats Widget 28-->
                        <div class="card card-custom bg-light-warning card-stretch gutter-b">
                            <!--begin::Body-->
                            <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-warning">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"></rect>
															<path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000"></path>
															<path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3"></path>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>

                                <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{$pendingOrder}}</span>
                                <span class="font-weight-bold text-muted font-size-sm">@lang('lang.paddingOrder')</span>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Stat: Widget 28-->
                    </div>
                </div>



                <h3 class="card-title">@lang('lang.Viewallshipments')</h3>





                <form action="" id="filter_form" method="post">
                    @csrf
                    <div class="card-toolbar">

                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                            <input type="text" class="form-control" placeholder="@lang('lang.name')" id="customerName" name="customerName">
                        </div>

                        <div class="col-lg-4  col-sm-12 mb-2">
                            <input type="text" class="form-control" placeholder="@lang('lang.billOfLading')" id="plocyNumber" name="plocyNumber">
                        </div>
                        {{--                    <div class="col-lg-4 col-md-6 col-sm-12 mb-2">--}}

                        {{--                        <select class="form-control select2" id="ChipCourierServiceId" name="ChipCourierServiceId">--}}
                        {{--                            <option value="">@lang('lang.ShippingCompany')</option>--}}
                        {{--                            @foreach($ShipCourierService as $value)--}}
                        {{--                                <option value="{{$value->id}}" @if(isset($ShipCourierServiceId)) @if($value->id==$ShipCourierServiceId) selected="selected" @endif @endif>{{$value->name}}</option>--}}
                        {{--                            @endforeach--}}
                        {{--                        </select>--}}
                        {{--                    </div>--}}

                        <div class="col-lg-4 col-sm-12 mb-2">
                            <input type="date" class="form-control" placeholder="من تاريخ" id="startDate" name="startDate">
                        </div>
                        <div class="col-lg-4  col-sm-12 mb-2">
                            <input type="date" class="form-control" placeholder="الى تاريخ" id="endDate" name="endDate">
                        </div>

                        <div class="col-lg-4  col-sm-12 mb-2">
                            <select class="form-control select2" id="statusId" name="statusId">
                                <option value="">@lang('lang.status')</option>
                                <option value="1">قيد الانتظار</option>
                                <option value="2">جاري الشحن</option>
                                <option value="3">تم التسليم</option>
                            </select>
                        </div>
                    </div>

                    <button class="btn btn-primary " id="btnFiterSubmitSearch">@lang('lang.search')</button>

                </form>
                <hr>


                <table class="table table-separate table-head-custom table-checkable  data-table">
                    <thead>
                    <tr class="text-uppercase">
                        <th style="width: 15%" class="pl-7">
                            <span class="">@lang('lang.ShippingCompany')</span>
                        </th>
                        <th >@lang('lang.billOfLading')</th>
                        <th >@lang('lang.name')</th>
                        <th >@lang('lang.shipmentValue')</th>
                        <th >@lang('lang.amount')</th>
                        <th >@lang('lang.DateCreated')</th>
                        <th >@lang('lang.status')</th>
                        <th>@lang('lang.Processes')</th>


                    </tr>
                    </thead>
                    {{--                            <tbody>--}}

                    {{--                            </tbody>--}}
                </table>
                <!--end::Table-->
            </div>
        </div>



    @endsection

    @section('scripts')
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/moment/moment.min.js"></script>

        <script src="{{asset('assets/admin/js/pages/crud/forms/widgets/bootstrap-daterangepicker.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.1.0/echarts-en.common.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>




        <script>
            table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,

                searching: true,
                ajax: {
                    url: "{{route('shipments.getShipment')}}",
                    type: 'get',
                    "data": function (d) {
                        d.name = $('#customerName').val();
                        d.status=$('#statusId').val();
                        d.clientId = "{{$client->id}}";
                        d.start_date=$( "#startDate" ).val();
                        d.end_date=$( "#endDate" ).val();
                        d.plocyNumber=$('#plocyNumber').val();

                    },

                },

                columns: [
                    {data: 'images', name: 'images'},
                    {data: 'shipmentNumber', name: 'shipmentNumber'},
                    {data: 'name', name: 'name'},
                    {data: 'total', name: 'total'},
                    {data: 'shipperPrice', name: 'shipperPrice'},
                    {data:'date',name:'date'},
                    {data: 'getStatus', name: 'getStatus'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],

                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Arabic.json"
                }
            });

        </script>






    @endsection






