<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    $data = Course::paginate(5);

    return view("dashboard", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::findOrFail($id);
        $courseDetails = CourseDetail::where('course_id', $id)->orderBy('created_at', 'asc')->get();

        return view('admin.courseDetail', compact('course','courseDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $course = Course::findOrFail($id);

      $course->delete();
      return redirect()->route('dashboard');

    }
}
