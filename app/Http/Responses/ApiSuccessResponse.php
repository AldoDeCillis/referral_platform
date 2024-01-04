<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;

class ApiSuccessResponse implements Responsable
{
    public function __construct(
        private string $message,
        private int $code = Response::HTTP_OK,
        private mixed $data = null,
        private array $metadata = [],
        private array $headers = []
    ) {

    }

    public function toResponse($request)
    {
        return response()->json([
            'message' => $this->message,
            'code' => $this->code,
            'data' => $this->data,
            'metadata' => $this->metadata,
        ],
            $this->code,
            $this->headers);
    }

    public function jsonSerialize(): array
    {
        return [
            'data' => $this->data,
            'metadata' => $this->metadata,
        ];
    }
}
