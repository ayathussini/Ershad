<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        $courses = Course::all();
        return view('course.index', compact('courses'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'title' => ['required','string','max:60','min:5'],
            'description' => ['required','string','max:60','min:5'],
            'instructor' => ['required','string'],
            'category'=>['required'],
            'duration' => ['required',],
            'course_link'=>['required','url']

        ]);
          $course=Course::create($data);
        return redirect()->route('course.index')->with('success', 'Course added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $courses =Course::with('assistants')->findOrFail($id);
        return view('course.show', compact('courses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $courses = Course::findOrFail($id);
        return view('course.edit', compact('courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $courses= Course::findOrFail($id);

     $validator=Validator::make($request->all(),[
        'title' =>  ['required','string','max:60'],
        'description' => ['required','string','max:60'],
        'instructor' => ['required','string'],
        'category' => ['required'],
        'duration' => ['required'],
    ]);
    if($validator->passes()){
            $courses=Course::findOrFail($id);
            $courses->title=$request->title;
            $courses->description=$request->description;
            $courses->instructor=$request->instructor;
            $courses->category=$request->category;
            $courses->duration=$request->duration;
            $courses->update();
            session()->flash('success','course Information Updated Successfully');
              return redirect()->route('course.index')->with('success', 'Course updated successfully!');;
         }else{
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors()

            ]);
        }
}

    /**
     * Remove the specified resource from storage.
     */
   public function delete($id)
{
    $courses = Course::findOrFail($id);
    $courses->delete();
    return redirect()->route('course.index')->with('success', 'Course deleted successfully!');
}


    public function archive()
{
    $courses = Course::onlyTrashed()->get();
    return view('course.archive', compact('courses'));
}
    public function restore($id)
    {
        $courses = Course::onlyTrashed()->findOrFail($id);
        $courses->restore();
        return redirect()->route('course.index')->with('success', 'Course restored successfully!');
    }

    public function forceDelete($id)
    {
        $courses = Course::onlyTrashed()->findOrFail($id);
        $courses->forceDelete();
        return redirect()->route('course.index')->with('success', 'Course permanently deleted!');
    }
   public function assignAssistantToCourse($courseId, $assistantId)
{
    $course = Course::findOrFail($courseId);
    $course->assistants()->attach($assistantId);
}

}
