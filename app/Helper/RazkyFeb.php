<?php

namespace App\Helper;


use App\Models\UserMNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class RazkyFeb
{

    public static function hello()
    {
        return "hello";
    }

    public static function isAPI()
    {
        $url = url()->current();
        if (str_contains($url, 'api/')) {
            return true;
        } else {
            return false;
        }
    }

    public static function responseSuccessWithData(
        $http_code, $status_code, $api_code, $message_id, $message_en, $res_data
    )
    {
        $response = [
            'http_response' => $http_code,
            'status_code' => $status_code,
            'api_code' => $api_code,
            'message' => $message_id,
            'message_id' => $message_id,
            'message_en' => $message_en,
            'res_data' => $res_data,
        ];

        return response($response, $http_code);
    }

    public static function responseErrorWithData(
        $http_code, $status_code, $api_code, $message_id, $message_en, $res_data
    )
    {
        $response = [
            'http_response' => $http_code,
            'status_code' => $status_code,
            'api_code' => $api_code,
            'message' => $message_id,
            'message_id' => $message_id,
            'message_en' => $message_en,
            'res_data' => $res_data,
        ];

        return response($response, $http_code);
    }

    public static function removeFile($file_path)
    {
        // remove photo first
        if (!Str::contains($file_path, 'razky_samples'))
            File::delete($file_path);
        // if (file_exists($file_path)) {
        //     try {
        //         unlink($file_path);
        //     } catch (Exception $e) {
        //         // Do Nothing on Exception
        //     }
        // }
    }

    public static function logout(){
        return response()->json(['error' => 'Unauthenticated.'], 401);
    }

    public static function error($code,$message){
        return response()->json(
            [
                'message' => "$message",
                'message_en' => "$message",
                'message_id' => "$message",
                'http_response' => $code,
                'status_code' => 0,
                'api_code' => 0,
            ], $code);
    }

    public static function general($code,$message,$apiCode,$statusCode){
        return response()->json(
            [
                'message' => "$message",
                'message_en' => "$message",
                'message_id' => "$message",
                'http_response' => $code,
                'status_code' => $statusCode,
                'api_code' => $apiCode,
            ], $code);
    }

    public static function success($code,$message){
        return response()->json(['message' => "$message"], $code);
    }

    public static function rupiah($angka){
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;

    }

    public static function checkApiKey($key)
    {
        $check = DB::table('api_key')
            ->where('key', '=', "$key")
            ->count();

        if ($check == 0) {
            return response()->json([
                'message' => "Unauthorized, Api Key Mismatch",
                'http_response' => 401,
                'status_code' => 0,
            ], 401);
        }
        return null;
    }

    public static function insertNotification(
        $userId, $title, $message, $desc, $type
    )
    {
        $object = new UserMNotification();
        $object->user_id = $userId;
        $object->message = $message;
        $object->title = $title;
        $object->desc = $desc;
        $object->type = $type;
        $object->save();
    }

    public static function profileImgPath()
    {
        return "photo/profile";
    }

    public static function newsImgPath()
    {
        return "photo/news";
    }

    public static function reqSellImgPath()
    {
        return "photo/profile";
    }

}



