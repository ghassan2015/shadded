<?php

function generalResponse($status , $message , $data , $status_code = 200) {
    $data = [
        'status' => $status ,
        'message' => $message ,
        'data' => $data ,
    ];
    return $data;
}
function responseJson($status , $message , $data , $status_code = 200) {
    return response()->json(generalResponse($status , $message , $data , $status_code) , $status_code);
}
 function generate_code(){
    $digits = 6;
    return str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
}
function upload($image)
{


    $file = $image;
    $imageName = time().'.'.$file->extension();
    $imagePath = public_path(). '/files';

    $file->move($imagePath, $imageName);

   $attachment= \App\Models\Attachment::create([
        'url'=>$imageName,
        'name'=>$imageName,
    ]);
    return $attachment;
}

function get_order_number()
{
    $today = date("Ymd");
    $rand = strtoupper(substr(uniqid(sha1(time())), 0, 10));
    $unique = $today . $rand;
    return $unique;
}


