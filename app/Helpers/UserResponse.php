<?php

namespace App\Helpers;

class UserResponse
{
    public const STATUS_SUCCESS = 'success';
    public const STATUS_ERROR = 'error';
    public const STATUS_UNAUTHORIZED = 'unauthorized';
    public const STATUS_NOT_FOUND_USER = 'not_found';
    public const STATUS_ERROR_TRY_AGAIN = 'error_try_again';
    public const HTTP_BAD_REQUEST = 'http_bad_request';


    public const MSG_INTERNAL_ERROR = 'ระบบขัดข้องกรุณาลองใหม่อีกครั้งภายหลัง';
    public const MSG_VALIDATE_ERROR = 'กรุณาระบุข้อมูลให้ครบและถูกต้อง';
    public const MSG_SUCCESS = 'สำเร็จ';
    public const MSG_NOT_FOUND_DATA = 'ไม่พบข้อมูลในระบบ';

    public static function sent($httpCode, $status, $message, $data = [])
    {
        $response = [];

        $response['status'] = $status;

        if (!empty($message)) {
            $response['message'] = $message;
        }

        if (!empty($data)) {
            $response['data'] = $data;
        }

        return response()->json($response, $httpCode);
    }
}
