<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\APIResource;
use App\Http\Resources\CourseDetailResource;
use App\Models\CourseDetail;
use App\Models\UserDesc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseDetailController extends Controller
{
    public function index()
    {
        $exerciseDetails = CourseDetail::all();

        return new CourseDetailResource(true, 'List Data Course Details', $exerciseDetails);
    }

    public function store(Request $request)
    {
        $datas = $request->data;

        foreach ($datas as $data) {
            $validator = Validator::make($data, [
                'course_id' => 'required|integer|exists:courses,id',
                'duration' => 'required|numeric',
                'position' => 'required|numeric',
                'vout' => 'required|numeric',
                'dorsimax' => 'required|numeric',
                'plantarmax' => 'required|numeric',
                'rom' => 'required|numeric',
                'percentage' => 'required|numeric',
                'step_amount' => 'required|numeric',
                'step_duration' => 'required|numeric',
                'step_per_second' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status'=> false,
                    'message'=> 'Failed to add Data',
                    'errors'=> $validator->errors()
                ],404);
            }


            CourseDetail::create([
                'course_id' => $data['course_id'],
                'duration' => $data['duration'],
                'position' => $data['position'],
                'vout' => $data['vout'],
                'dorsimax' => $data['dorsimax'],
                'plantarmax' => $data['plantarmax'],
                'rom' => $data['rom'],
                'percentage' => $data['percentage'],
                'step_amount' => $data['step_amount'],
                'step_duration' => $data['step_duration'],
                'step_per_second' => $data['step_per_second'],
            ]);
        }

        return new APIResource(true, 'Displays Data Details', $datas);
    }

    public function update(Request $request, $cd_id)
    {
        $datas = $request->data;
        
        foreach ($datas as $data) {
            $validator = Validator::make($data, [
                'course_id' => 'required|integer',
                'duration' => 'required|numeric',
                'position' => 'required|numeric',
                'vout' => 'required|numeric',
                'dorsimax' => 'required|numeric',
                'plantarmax' => 'required|numeric',
                'rom' => 'required|numeric',
                'percentage' => 'required|numeric',
                'step_amount' => 'required|numeric',
                'step_duration' => 'required|numeric',
                'step_per_second' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status'=> false,
                    'message'=> 'Failed to add Data',
                    'errors'=> $validator->errors()
                ],400);
            }

            $detail = CourseDetail::find($cd_id);
            if (is_null($detail)) {
                return response()->json([
                    'status' => false,
                    'message'=> 'Course Details ID not found',
                    'Course Detail ID'=> $cd_id
                ], 404);
            }

            $detail->update([
                'course_id' => $data['course_id'],
                'duration' => $data['duration'],
                'position' => $data['position'],
                'vout' => $data['vout'],
                'dorsimax' => $data['dorsimax'],
                'plantarmax' => $data['plantarmax'],
                'rom' => $data['rom'],
                'percentage' => $data['percentage'],
                'step_amount' => $data['step_amount'],
                'step_duration' => $data['step_duration'],
                'step_per_second' => $data['step_per_second'],
            ]);

            return new APIResource(true, 'Data Edited Successfully', $detail);
        }
    }
}