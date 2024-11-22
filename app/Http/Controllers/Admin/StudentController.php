<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all(); 
        return view('student.index', compact('students'));
    }

    public function create()
    {
        return view('student.create');
    }

public function store(Request $request)
{
    $validatedData = $request->validate([
        'name_ar' => 'required|string|max:60|min:5',
        'name_en' => 'required|string|max:60|min:5',
        'email' => 'required|email|unique:students',
        'phone' => [
            'required',
            'regex:/^(010|011|012|015)[0-9]{8}$/',
            'unique:students'
        ],
        'address' => 'required|min:10',
        'age' => ['min:2', 'max:2', 'required'],
        'gender' => 'required',
        'city' => 'required|min:5',
        'university' => 'required|min:5',
        'faculty' => 'required|min:5',
        'nationality' => 'required|min:5',
        'training_path' => 'required|min:5',
        'personality_test_results' => 'required',
        'english_level_test_results' => 'required',
    ]);
    

    try {
        $students = Student::create($validatedData);
        $students->save();
        return response()->json([
            'status' => true,
            'message' => 'Student added successfully!',
            'data' => $students
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'errors' => ['error' => $e->getMessage()]
        ]);
    }
}
    public function show( $id)
    {
        $students= Student::findOrFail($id);
        return view('student.show', compact('students'));
    }

    public function edit(string $id)
    {
        $students = Student::findOrFail($id);
        return view('student.edit', compact('students'));
    }

    public function update(Request $request, string $id)
{
    $students= Student::findOrFail($id);

     $validator=Validator::make($request->all(),[
        'name_ar' => 'required|string|max:60|',
        'name_en' => 'required|string|max:60|',
        'email' => 'required|email',
        'phone' => 'required', 'regex:/^(010|011|012|015)[0-9]{8}$/'. $id . ',id',
        'address' => 'required|min:5',
        'age' => ['min:2', 'max:2', 'required'],
        'gender' => 'required',
        'city' => 'required|min:3',
        'university' => 'required|min:3',
        'faculty' => 'required|min:3',
        'nationality' => 'required|min:3',
        'training_path' => 'required|min:3',
        'personality_test_results' => 'required',
        'english_level_test_results' => 'required',
    ]);
    if($validator->passes()){
            $students=Student::findOrFail($id);
            $students->name_ar=$request->name_ar;
            $students->name_en=$request->name_en;
            $students->email=$request->email;
            $students->phone=$request->phone;
            $students->address=$request->address;
            $students->age=$request->age;
            $students->city=$request->city;
            $students->university=$request->university;
            $students->faculty=$request->faculty;
            $students->nationality=$request->nationality;
            $students->training_path=$request->training_path;
            $students->personality_test_results=$request->personality_test_results;
            $students->english_level_test_results=$request->english_level_test_results;
            $students->password=$request->password;
            $students->update();
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
    $student = Student::findOrFail($id);
    $student->delete();
    return redirect()->route('student.index')->with('success', 'Student deleted successfully!');
}


    public function archive()
{
    $students = Student::onlyTrashed()->get();
    return view('student.archive', compact('students'));
}
    public function restore($id)
    {
        $students = Student::onlyTrashed()->findOrFail($id);
        $students->restore(); 
        return redirect()->route('student.index')->with('success', 'Student restored successfully!');
    }

    public function forceDelete($id)
    {
        $students = Student::onlyTrashed()->findOrFail($id);
        $students->forceDelete(); 
        return redirect()->route('student.index')->with('success', 'Student permanently deleted!');
    }
}
