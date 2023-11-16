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
        
        return new APIResource(true,'Menampilkan Data Course', $dataLatihan);
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
                'message' => 'Gagal Memasukan Data',
                'errors'=> $validator->errors()
            ],400);  
        }

     
        $dataLatihan->code = $request->code;
        $dataLatihan->user_id = Auth::user()->id;
        $dataLatihan->start_time = $request->start_time;
        $dataLatihan->end_time = $request->end_time;

        $post = $dataLatihan->save();
        return new APIResource(true, 'Data Berhasil Ditambahkan', $dataLatihan);
    }

    public function update(Request $request, $id){
       

        $rules = [
            'code' => 'required',
            'start_time' => 'date',
            'end_time'=> 'date',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json([
                'status'=> false,
                'message'=> 'Gagal mengedit Data',
                'errors'=> $validator->errors()
            ],400);
        }

        $course = Course::findOrFail($id);
        $course->update($request->all());
        return new APIResource(true, 'Data Berhasil Diedit', $course);

    }

}
