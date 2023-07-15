<?php

namespace App\Http\Controllers\Admin\Requests;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RequestController extends Controller
{
    public function index(Request $request){

        return view('admin.requests.index');
    }
    public function getAllRequest(Request $request){
        $driverName=$request->driverName;
        $userName=$request->userName;
        $status=$request->status;
        $startAt=$request->startAt;
        $endAt=$request->endAt;
        $userId=$request->userId;
        $driverId=$request->driverId;
        $data = \App\Models\Request::query()->orderby('created_at', 'desc')
        ->when($driverName??false,function ($q)use ($driverName){
            $q->where('driver',function ($q)use ($driverName){
                $q->where('firstName','like','%'.$driverName.'%')->orwhere('lastName','like','%'.$driverName.'%');
            });
        })
        ->when($userName??false,function ($q)use ($userName){
            $q->where('user',function ($q)use ($userName){
                $q->where('name','like','%'.$userName.'%');
            });
        })->when($status??false,function ($q)use ($status){
                    $q->where('status','%'.$status.'%');
            })
            ->when($userId??false,function ($q)use ($userId){
                $q->where('userId',$userId);
            })
            ->when($driverId??false,function ($q)use ($driverId){
                $q->where('driverId',$driverId);
            })
            ->when($status??false,function ($q)use ($status){
                $q->where('status','%'.$status.'%');
            })
        ->when($startAt??false,function ($q)use ($startAt){
                       $start_at = Carbon::parse($startAt);

             $q->where('created_at', '>=', $start_at);
        })->when($endAt??false,function ($q)use ($endAt){
             $q->where('created_at', '<=', $endAt);
            });
        return DataTables::of($data)
            ->addColumn('driverName', function ($data) {

                return $data->driver?$data->driver->firstName .' '.$data->driver->lastName:'';

//                $q->where('')

            })
            ->addColumn('userName', function ($data) {

                return $data->user?$data->user->name:'';


            })

            ->addColumn('rate', function ($data) {

                return $data->reviews?$data->reviews->rate:'';


            })
            ->addColumn('status', function ($data) {

                return $data->getStatus();

            })
            ->addColumn('action', function ($data) {


                $button = '<a  href="' . route('admin.requests.view', $data->id) . '"   class="edit_admin"><span><i style="color: #66afe9" class="fas fa-eye"></i></span></a>';

                $button .= '&nbsp;&nbsp;&nbsp;&nbsp;';
                return $button;
            })->rawColumns(['action', 'status'])
            ->make(true);

    }

    public function view($id){

        $data['request']=\App\Models\Request::findorfail($id);
        return view('admin.requests.view',$data);
    }

}
