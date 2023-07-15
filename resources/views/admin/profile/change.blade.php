@extends('layouts.admin')
@section('title','تغير المعلومات الشخصية')
@section('content')
    <div class="flex-row-fluid ml-lg-8">
        <!--begin::Card-->
        <div class="card card-custom">
            <!--begin::Header-->
            <div class="card-header py-3">
                <div class="card-title align-items-start flex-column">
                    <h3 class="card-label font-weight-bolder text-dark">@lang('lang.changePassword')</h3>
                    <span class="text-muted font-weight-bold font-size-sm mt-1">@lang('lang.changePasswordAccount')</span>
                </div>
            </div>
            <form id="from_validate" class="from_validate" action="{{route('profile.changePasswordProfile')}}" method="post">
                @csrf


                <!--begin::Form-->

                <div class="card-body">
                    <!--begin::Alert-->
                    <!--end::Alert-->
                    <label class="col-xl-3 col-lg-3 col-form-label text-alert">@lang('lang.currentPassword')</label>

                    <div class="form-group row">
                        <div class="col-lg-9 col-xl-6">
                            <input type="password" name="oldPassword"
                                   class="form-control form-control-lg form-control-solid mb-2" value=""
                                   placeholder=""/>
                        </div>
                        @error('current_password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <label class="col-xl-3 col-lg-3 col-form-label text-alert">@lang('lang.newPassword')</label>

                    <div class="form-group row">
                        <div class="col-lg-9 col-xl-6">
                            <input type="password" name="newPassword" id="password"
                                   class="form-control form-control-lg form-control-solid" value=""
                                   placeholder=""/>
                        </div>
                        @error('newPassword')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <label class="col-xl-3 col-lg-3 col-form-label text-alert">@lang('lang.confirmCurrentPassword')</label>

                    <div class="form-group row">
                        <div class="col-lg-9 col-xl-6">
                            <input type="password" name="confirmNewPassword"
                                   class="form-control form-control-lg form-control-solid" value=""
                                   placeholder=""/>
                        </div>
                        @error('new_password_confirmation')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer" style="text-align: end">
                    <button type="submit" class="btn btn-success font-weight-bold mr-2"><span>@lang('lang.submit')</span> <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
{{--                    <a href="" class="btn btn-danger font-weight-bold mr-2 backward"><span>تراجع</span> <i class="fas fa-backspace"></i></a>--}}

                </div>

            </form>
            <!--end::Form-->
        </div>
    </div>

@endsection
