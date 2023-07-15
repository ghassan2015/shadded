<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;
use App\Models\Notification;
use App\Traits\PaginationTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    use PaginationTrait;
    public function index(Request $request){
        $size = $request->size ?? config('const.options.size_paginate');

        $filters=$request;
        $notifications= Notification::query()->orderBy('created_at', 'desc')->paginate($size);


        $groupedNotification = $notifications->groupBy(function ($notification) {
            return $notification->created_at->format('Y-m-d');
        });
        $formattedNotifications=[];

        foreach ($groupedNotification as $date => $notification) {
            $formattedNotifications[] = [
                'date' => $date,
                'notifications' => NotificationResource::collection($notification),
            ];
        }

        $notification= Notification::query()->orderBy('created_at', 'desc')->paginate($size);

        foreach ($notification as $value )
        {
            $value->update([
                'read_at'=>Carbon::now()
            ]);
        }
        $filter_option = "&" . http_build_query($filters);
        $response['data'] = $formattedNotifications;
        $pagination_options = $this->get_options_v2($notifications, $filter_option);
        $response = $response + $pagination_options;

        return response_api(true, __('message.success'), $response, 200);

    }
}
