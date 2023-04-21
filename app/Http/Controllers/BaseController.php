<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{

    public function sendResponse($data=[], $message="success operation")
    {
        $response = [
            'success' => true,
            'data'    => $data,
            'message' => $message
        ];

        return response($response, 200);
    }

    public function sendError($message, $errorData = [], $code = 500)
        {
            $response = [
                'success' => false,
                'message' => $message,
            ];

            if(!empty($errorData)){
                $response['data'] = $errorData;
            }

            return response($response, $code);
        }
}
