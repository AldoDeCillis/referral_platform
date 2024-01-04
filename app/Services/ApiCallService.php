<?php

namespace App\Services;

use App\Models\ApiLog;

class ApiCallService
{
    public function LogApiCall($level, $code, $request, $response = [], $data = [])
    {
        $payload = ApiLog::create([
            'endpoint' => $this->endpoint(),
            'level' => $level,
            'code' => $code,
            'request' => json_encode($request),
            'response' => json_encode($response),
            'data' => json_encode($data),
        ]);

        return $payload;
    }

    private function endpoint()
    {
        return url()->current();
    }
}
