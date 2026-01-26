<?php

namespace App\Http;

final class JsonResponse extends Response
{
    public function __construct(array $data, int $status = 200)
    {
        parent::__construct(
            json_encode($data),
            $status
        );
        $this->headers()->set('Content-Type', 'application/json');
    }
}
