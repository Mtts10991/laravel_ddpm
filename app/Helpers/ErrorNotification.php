<?php

namespace App\Helpers;
use Log;

class ErrorNotification
{
    public static function notify_message($message)
    {
        $LINE_API = "https://notify-api.line.me/api/notify";
        //token line noti
        $LINE_TOKEN = "x84dD5GsDWroRRKIXKevjJX9kOtU21CsW2HvY1B62yC";
        $queryData = array('message' => $message);
        $queryData = http_build_query($queryData, '', '&');
        $headerOptions = array(
            'http' => array(
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                . "Authorization: Bearer " . $LINE_TOKEN . "\r\n"
                . "Content-Length: " . strlen($queryData) . "\r\n",
                'content' => $queryData,
            ),
        );
        $context = stream_context_create($headerOptions);
        $result = file_get_contents($LINE_API, false, $context);
        $res = json_decode($result);
        return $res;
    }
    public static function error_log($function, $message, $file, $line)
    {
        $origin = request()->header('origin');
        Log::error("[Error] "
            . $origin. " " . $function . " : " . "\r\n" .
            "Message Error>> " . $message . "\r\n" .
            "File Error>> " . $file . "\r\n" .
            "Line Error>> " . $line);
        self::notify_message("[Error] " . $origin . " " . $function . " : " . "\r\n" .
            "Message Error>> " . $message . "\r\n" .
            "File Error>> " . $file . "\r\n" .
            "Line Error>> " . $line);
    }

}
