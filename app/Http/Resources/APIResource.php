<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class APIResource extends JsonResource
{
    //Properti JSON
    public $status;
    public $message;
    public $resource;

    //Konstraktor parsing untuk controller
    public function __construct($status,$message,$resource){
        parent::__construct($resource);
        $this->status = $status;
        $this->message = $message;
    }

    //untuk Frontend
    public function toArray(Request $request)
    {
        return [
            'succes' => $this->status,
            'message' => $this->message,
            'data' => $this->resource
        ];
    }
}
