<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseDetail;
use App\Models\CourseEvaluation;
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
    public function destroy(string $id, Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);
        $course = Course::findOrFail($id);
        $user = $request->user();

        if ($user !== false) {
            
            $course->delete();
            return redirect()->route('dashboard')->with('success', 'Course deleted successfully');

        }
    }

    public function evaluation(string $id){

        $course = Course::findOrFail($id);
        $user = Auth::user();

        return view('admin.courseEvaluation', compact('course','user'));
    }

        public function evaluationpost(Request $request, $id){

        $request->validate([
            'notes' => ['required', 'string', 'max:250'],
            'description' => ['required', 'string','max:1000'],
            'status' => ['required']
        ]); 

        $course = Course::findOrFail($id);
        $user = Auth::user();

        CourseEvaluation::create([
            'course_id' => $course->id,
            'user_id' => $user->id,
            'notes' => $request->notes,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect()->route('course.detail', $course->id);

    }

    public function evaluationdelete(string $id, Request $request){

        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        if($user !== false){
            
            $evaluate = CourseEvaluation::findOrFail($id);

            $evaluate->delete();

            return redirect()->route('course.detail',['id' => $evaluate->course_id]);
        }
    }
}
