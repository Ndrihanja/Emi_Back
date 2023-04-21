<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class ChatController extends BaseController
{
    public function openChat( Request $request ){
        if(!$request->prompt){
            return $this->sendError("No conversation found");
        }

        $data = [
            "model" => "text-davinci-003",
            "max_tokens" => 2048,
            "temperature" => 0,
            "prompt" => $request->prompt
        ];

        try{
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.env('OPENAI_API_KEY'),
            ])->post("https://api.openai.com/v1/completions", $data);

            return $this->sendResponse($response['choices'][0]['text']);
        }
        catch (\Exception $e){
            return $this->sendError("L'opération a échouée", $e->getMessage());
        }
    }
}
