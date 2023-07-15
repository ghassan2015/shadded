<?php

namespace App\Http\Controllers\Admin\Drivers;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DriverController extends Controller
{
    public function index(Request $request){

        return view('admin.drivers.index');
    }
    public function getALlDriver(Request $request){
        $data = Driver::query()->orderby('created_at', 'desc');

        if ($request->input('email')) {
            $data = $data->where("email", 'LIKE', '%' . $request->input('email') . '%');
        }
        if ($request->input('name')) {
            $data = $data->where('firstName', 'LIKE', '%' . $request->input('name') . '%');
        }
        if ($request->input('mobile')) {
            $data = $data->where('mobile', 'LIKE', '%' . $request->input('mobile') . '%');
        }
        if ($request->input('status')) {
            if ($request->input('status') == 1) {

                $data = $data->where('status', '=', 1);

            } else {

                $data = $data->where('status', '=', 0);

            }
        }

        if ($request->input('start_date')) {
            $start_at = Carbon::parse($request->input('start_date'));
            $data = $data->where('created_at', '>=', $start_at);
        }
        if ($request->input('end_date')) {
            $end_date = Carbon::parse($request->input('end_date'));
            $data = $data->where('created_at', '<=', $end_date);
        }
        return DataTables::of($data)
            ->addColumn('image', function ($data) {
                $image = ' <img src="' . $data->getPhoto() . '"  width="50px"  class="align-self-end"  alt=""  style="  border-radius: 12px; "/>';

                return $image;

            })

            ->addColumn('status', function ($data) {

                if ($data->status) {
                    $button = '<span class="switch switch-icon">
																<label>
																	<input type="checkbox" checked="checked" name="status" data-id="' . $data->id . '" data-status="' . $data->status . '" class="check_status"  />
																	<span></span>
																</label>
															</span>';
                } else {
                    $button = '<span class="switch switch-icon">
																<label>
																	<input type="checkbox" name="status" data-id="' . $data->id . '" data-status="' . $data->status . '" class="check_status" />
																	<span></span>
																</label>
															</span>';
                }


                return $button;

            })

                ->addColumn('action', function ($data) {


                $button = '<a  href="' . route('admin.drivers.view', $data->id) . '"   class="edit_admin"><span><i style="color: #66afe9" class="fas fa-eye"></i></span></a>';

                return $button;
            })->rawColumns(['action', 'image', 'status'])
            ->make(true);

    }

    public function view($id){

        $data['driver']=Driver::query()->where('id',$id)->first()??abort(404);
        return view('admin.drivers.requests.index',$data);
    }

    public function updateStatus(Request $request)
    {
        try {
            $user = Driver::where('id', $request->id)->first();
//            if ($admin->count() > 0) {


            $user->update([
                'status' => intval($request->status),
            ]);

            return response()->json(["status" => 201, 'message' => 'تم تغير الحالة  بنجاح']);

        } catch (\Exception $exception) {
            return response()->json(["status" => 500, 'message' => 'هناك خطا ما يرجى المحاولة لاحقا']);
        }
    }

    public function delete(Request $request)
    {

        try {
            $user = \App\Models\Driver::where('id', $request->id)->first();
            if (isset($user)) {
                $user->delete();

                return response()->json(["status" => 201, 'message' => 'تم حذف المستخدم']);
            } else {
                return response()->json(["status" => 404, 'message' => 'مدير النظام غير موجود ']);

            }
        } catch (\Exception $exception) {
            return response()->json(["status" => 422, 'message' => 'هناك خطا ما يرجى المحاولة لاحقا']);
        }
    }


}
