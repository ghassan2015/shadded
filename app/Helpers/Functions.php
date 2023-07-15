<?php

use App\Models\Country;
use Illuminate\Support\Facades\Auth;

function getPath($folder, $full_path = true, $default_image = "default.png")
{
    return $full_path ? ($folder != '' ? url("uploads/$folder/$default_image") : url("uploads/$default_image")) : "$folder/" . $default_image;
}

function getMultiLangField($default_value = '')
{
    $data = [];
    foreach (config('app.locales') as $locale) {
        $data[$locale] = $default_value;
    }
    return $data;
}

function checkCanFilter($attribute)
{
    return !is_null($attribute) && $attribute != -1;
}

// check role
function checkAdminRole($role)
{
    $admin = Auth::guard('admin')->user();
    if ($admin->is_super == 1) return true;
    return $admin->hasPermissions($role);
}

function returnData($key, $value, $num = 200, $msg = "")
{
    return response()->json([
        'status' => true,
        'statusNumber' => $num,
        'msg' => $msg,
        $key => $value
    ]);
}

function response_api($status, $message, $data, $status_code = 200)
{
    $response = [];
    $response['status'] = $status;
    $status_code_ = !$status && $status_code == 200 ? 422 : $status_code;
    $response['code'] = $status_code_;
    $response['message'] = $message;
//    if ($status) {
    $response = $response + $data;
//    }


    return response()->json($response, $status_code_);

}

function reverse_convert_currency($price, $currency_data = null)
{
    if (isset($currency_data) && !is_null($currency_data)) {
        return round($price * $currency_data['exchange_rate'], round_digit());
    } else {
        return round($price, round_digit());
    }
}

function calculation()
{
    $country_tax =Country::query()->where('id',auth('api')->user()->country->id)->first();

    $data = [];
    $data['country_tax'] = 0.0;
    $data['tax_app'] = 0.0;
    $data['base_price'] = 0.0;
    $data['shopping_cost'] = 0.0;
    $data['quantity'] = 0.0;
    $data['discount'] = 0.0;

    $data['total_price']=0.0;
    $shoppingCartProduct = \App\Models\ShoppingCart::query()->where('user_id', auth('api')->id())->get();
    foreach ($shoppingCartProduct as $product_cart) {
        $data['base_price'] += $product_cart->price;
        $data['quantity'] += $product_cart->quantity;
        $data['shopping_cost'] +=$product_cart->shopping_cost;
        $data['tax_app'] += floatval($product_cart->tax_app);
        $data['discount'] += $product_cart->discount_value;
        $data['country_tax'] += ($product_cart->price) * (intval($country_tax->add_tax) / 100);
        $data['total_price'] = $data['base_price'] + $data['country_tax'] + $data['shopping_cost'] - $data['discount'];


    }

    return $data;

}




