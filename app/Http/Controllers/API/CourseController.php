<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\APIResource;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function index()
    {
        $dataLatihan = Course::orderby('id', 'asc')->get();
        
        return new CourseResource(true,'Displays Course Data', $dataLatihan);
    }

    public function store(Request $request)
    {
        $dataLatihan = new Course;

        $rules = [
            'code' => 'required',
            'start_time' => 'date',
            'end_time'=> 'date',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to Enter Data',
                'errors'=> $validator->errors()
            ],400);  
        }

     
        $dataLatihan->code = $request->code;
        $dataLatihan->user_id = Auth::user()->id;
        $dataLatihan->start_time = $request->start_time;
        $dataLatihan->end_time = $request->end_time;

        $post = $dataLatihan->save();
        return new CourseResource(true, 'Data Added Successfully', $dataLatihan);
    }

    public function update(Request $request, $c_id){
       

        $rules = [
            'code' => 'required',
            'start_time' => 'date',
            'end_time'=> 'date',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json([
                'status'=> false,
                'message'=> 'Failed to edit Data',
                'errors'=> $validator->errors()
            ],400);
        }

        $course = Course::find($c_id);
        if (is_null($course)) {
            return response()->json([
                'status' => false,
                'message'=> 'Course ID not found',
                'course_id' => $c_id
            ], 404);
        }

        $course->update($request->all());
        return new APIResource(true, 'Data Edited Successfully', $course);

    }

}
