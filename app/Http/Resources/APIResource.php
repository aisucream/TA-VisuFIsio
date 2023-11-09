<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class APIResource extends JsonResource
{
    //Properti JSON
    public $status;
    public $massage;
    public $resource;

    //Konstraktor parsing untuk controller
    public function __construct($status,$massage,$resource){
        parent::__construct($resource);
        $this->status = $status;
        $this->massage = $massage;
    }

    //untuk Frontend
    public function toArray(Request $request)
    {
        return [
            'succes' => $this->status,
            'massage' => $this->massage,
            'code' => $this->resource
        ];
    }
}
