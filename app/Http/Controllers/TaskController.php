<?php

namespace App\Http\Controllers;

use App\Models\PathTraining;
use App\Models\Task;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
public function index(Request $request)
{
    $month = $request->input('month', now()->format('m'));
    $path_id = $request->input('path_id'); // الحصول على الفلتر

    // استعلام لتصفية البيانات بناءً على الشهر والمسار
    $tasks = Task::with(['student', 'path'])
        ->whereMonth('due_date', $month);

    if ($path_id) {
        $tasks->where('path_id', $path_id);
    }

    $tasks = $tasks->get();

    // إرسال جميع المسارات للعرض لاستخدامها في الفلتر
    $paths = PathTraining::all();

    return view('tasks.index', compact('tasks', 'month', 'paths', 'path_id'));
}

public function create()
{
    $students = Student::all();
    $paths = PathTraining::all();
    $month= now()->format('m');
    return view('tasks.create', compact('students','month','paths'));
}

public function store(Request $request)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'student_id' => 'required|exists:students,id',
        'due_date' => 'required|date',
    ]);

    Task::create($data);
    return redirect()->route('tasks.index')->with('success', 'Task added successfully!');
}
public function edit(string $id)
    {
        $tasks = Task::findOrFail($id);
        return view('tasks.edit', compact('tasks'));
    }
            public function update(Request $request, string $id)
{
    $tasks= Task::findOrFail($id);

     $validator=Validator::make($request->all(),[
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'student_id' => 'required|exists:students,id',
        'due_date' => 'required|date',
        'month' => 'required|string',
        'status' => 'required',
    ]);
    if($validator->passes()){
            $tasks=Task::findOrFail($id);
            $tasks->title=$request->title;
            $tasks->description=$request->description;
            $tasks->student_id=$request->student_id;
            $tasks->due_date=$request->due_date;
            $tasks->month=$request->month;
            $tasks->status=$request->status;
            $tasks->update();
            session()->flash('success','User Information Updated Successfully');
             return response()->json([
                'status'=>true,
                'errors'=>[]
            ]);
         }else{
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors()

            ]);
        }
}
  public function delete($id)
{
    $tasks = Task::findOrFail($id);
    $tasks->delete();
    return redirect()->route('tasks.index')->with('success', 'task deleted successfully!');
}


}
