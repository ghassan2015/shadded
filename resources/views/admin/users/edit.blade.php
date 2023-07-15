@extends('layouts.admin')
@section('title')
    مدير النظام-تعديل

@endsection


@section('content')

    <div class="card card-custom">
        <div class="card-header flex-wrap">
            <div class="card-title">
                <h1 class="card-label">مدير النظام : {{$admin->name}}</h1>
            </div>
            <div class="card-toolbar">
                <!--begin::Dropdown-->

                <!--end::Dropdown-->
                <!--begin::Button-->
                <h6 class="card-label">تاريخ التسحيل : {{$admin->created_at->format('Y-m-d')}}</h6>


                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <form class="needs-validation " id="edit_admin" name="edit_admin" method="POST" enctype="multipart/form-data">

                <div class="modal-body">
                    @csrf
                    <input type="hidden" value="{{$admin->id}}" name="id">

                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12">

                            <label for="name">
                                 الاسم
                                    <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="name" class="form-control" id="name" value="{{$admin->name}}"
                                 placeholder="">
                            @if ($errors->has('name'))
                                <span class="help-block font-red-mint">
                                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                              </span>
                            @endif
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="col-lg-6 col-sm-12">

                            <label for="email">
                                الايميل
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="email" class="form-control" id="email" value="{{$admin->email}}"
                                   placeholder="">
                            @if ($errors->has('email'))
                                <span class="help-block font-red-mint">
                                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                              </span>
                            @endif
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>


                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12">

                            <label for="phone">
                                رقم الجوال
                                    <span class="text-danger">*</span>
                                </label>

                            <input type="text" name="phone" value="{{$admin->mobile}}" class="form-control" id="phone"
                                   aria-describedby="emailHelp" placeholder="">
                            @if ($errors->has('phone'))
                                <span class="help-block font-red-mint">
                                    <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                              </span>
                            @endif
                        </div>

                        <div class="col-lg-6 col-sm-12">

                            <label for="password">
                                كلمة المرور
                                <span class="text-danger">*</span>
                            </label>
                            <input type="password" name="password" value="" class="form-control" id="password"
                                   aria-describedby="emailHelp" placeholder="">
                            <div class="invalid-feedback">
                                كلمة المرور
                            </div>
                            @if ($errors->has('password'))
                                <span class="help-block font-red-mint">
                                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                              </span>
                            @endif
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
                                    <option value="{{$value->id}}" @if($value->id==$admin->role_id) selected='selected' @endif>{{$value->name}}</option>

                                @endforeach
                            </select>
                            @if ($errors->has('role_id'))
                                <span class="help-block font-red-mint">
                                    <div class="alert alert-danger">{{ $errors->first('role_id') }}</div>
                              </span>
                            @endif
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


                            <img src="{{ $admin->getAttachment() }}" style="width: 100px"
                                 class="img-thumbnail img-preview"  id="imagePreview" alt="">

                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12">
                            <label for="banner_image">
                                الحالة

                            </label>

                        <span class="switch switch-icon">
																<label>
																	<input type="checkbox"  value="1" name="status"  @if($admin->status)checked="checked"@endif/>
																	<span></span>
																</label>
															</span>



</div>
                    </div>
                            <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><span><i class="fa fa-paper-plane"
                                                                               aria-hidden="true"></i></span>
                          تحديث

                        </button>


                    </div>
            </form>

        </div>
    </div>

@endsection

@section('scripts')
@include('admin.admin.js.edit_create')
@endsection
