<?php

namespace App\Classes;

class ApiResponseClass 
{
    public static function sendResponse($result , $message ,$code){
        $response = [
            'success' => true,
            'data'    => $result
        ];
        if(!empty($message)){
            $response['message'] = $message;
        }
        return response()->json($response, $code);
    }
}