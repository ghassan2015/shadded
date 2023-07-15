<?php

namespace App\Http\Controllers\Admin\Support;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SupportController extends Controller
{
    //

    public function index(Request $request){


        return view('admin.support.index');
    }
    public function getSupport(Request $request){
        $data=Support::query()->orderBy('id','desc');
        return DataTables::of($data)
->addColumn('userName',function ($data){
    return$data->user? $data->user->name:'';
})
            ->addColumn('action', function ($data) {


                $button = '<a  href="' . route('admin.support.view', $data->id) . '"   class="edit_admin"><span><i style="color: #66afe9" class="fas fa-eye"></i></span></a>';

                return $button;
            })->rawColumns(['action', 'image', 'status'])
            ->make(true);

    }

    public function view($id){
        $data['support']=Support::query()->where('id',$id)->first()??abort(404);
        return view('admin.support.view',$data);
    }


    public function Reply(Request $request)
    {
        try {
            $support=Support::query()->where('id',$request->supportId)->first();

            $support->update([
                'replayMessage'=>$request->replayMessage,
                'adminId'=>auth('admin')->id(),
            ]);

            return response()->json(["status" => 201, 'message' => 'التنفيد بنجاح']);

        } catch (\Exception $exception) {
            return response()->json(["status" => 500, 'message' => 'هناك خطا ما يرجى المحاولة لاحقا']);
        }
    }
}
