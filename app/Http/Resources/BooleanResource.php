<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BooleanResource extends JsonResource
{
    protected $status = false;

    public function __construct(bool $status)
    {
        $this->status = $status;
    }

    public function with($request)
    {
        return [
            'status' => $this->status ? 'true' : 'false',
        ];
    }

}
