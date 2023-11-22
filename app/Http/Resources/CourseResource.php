<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
    public function toArray(Request $request){
        return [
                'success' => $this->status,
                'message' => $this->message,
                'data' => [
                    'id' => $this->resource->id,
                    'code' => $this->resource->code,
                    'patient' => new UserResource($this->resource->user), 
                    'start_time' => $this->resource->start_time,
                    'end_time' => $this->resource->end_time,
                ],
            ];
    }
}
