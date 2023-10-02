<?php

namespace App\Trait;


trait Shared
{

    public function responseData($message = '', $data = [], $status = false, $other = '')
    {
        return $other !== '' ? ["message" => $message, "data" => $data, 'status' => $status, 'other' => $other] : ["message" => $message, "data" => $data, 'status' => $status];
    }

    /* 
    
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json($this->responseData('', [], false, $validator->errors()), JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }*/
}
