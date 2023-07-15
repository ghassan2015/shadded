@extends('layouts.admin')
@section('title','الصلاحيات')
@section('mainTitle','الصلاحيات')

@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">

                <h3 class="card-label">اضافة الصلاحيات جديدة</h3>
            </div>
        </div>
        <div class="card-body">


                                        <form class="form form_role" id="form"
                                              action=""
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">اسم الصلاحية
                                                            </label>
                                                                <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('name')}}"
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
{{--                                                                <label class="checkbox-inline">--}}

{{--                                                                    <input type="checkbox" class="chk-box" name="permissions[]" value="{{ $name }}">  {{ $value }}--}}
{{--                                                                </label>--}}

                                                                <span class="switch switch-icon">
                                <label>
                                                                    <input type="checkbox" class="chk-box" name="permissions[]" value="{{ $name }}">  {{ $value }}
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
                                            <button type="submit"  id="submit" class="btn btn-primary submit">
                تاكيد
                                            </button>


                                        </form>
                                    </div>
                                </div>

    @include('admin.roles.js.create_update')

@endsection
