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

        return new CourseDetailResource(true, 'List Data Exercise Details', $exerciseDetails);
    }

    public function store(Request $request)
    {
        $datas = $request->data;

        foreach ($datas as $data) {
            $validator = Validator::make($data, [
                'course_id' => 'required',
                'duration' => 'required',
                'position' => 'required',
                'vout' => 'required',
                'dorsimax' => 'required',
                'plantarmax' => 'required',
                'rom' => 'required',
                'percentage' => 'required',
                'step_amount' => 'required',
                'step_duration' => 'required',
                'step_per_second' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
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

        return new APIResource(true, 'Menampilkan Detail Data', $datas);
    }
}
