<?php

namespace App\Http\Controllers\Admin;

use App\Models\Assistant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class AssistantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assistants = Assistant::all();
        return view('assistant.index', compact('assistants'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('assistant.create');
    }

    /**
     * Store a newly created resource in storage.
     */

public function store(Request $request)
{
    $validatedData = $request->validate([
        'name_ar' => 'required|string|max:60|min:5',
        'name_en' => 'required|string|max:60|min:5',
        'email' => 'required|email|unique:assistants',
        'phone' => [
            'required',
            'regex:/^(010|011|012|015)[0-9]{8}$/',
            'unique:assistants'
        ],
        'address' => 'required|min:10',
        'years_of_experiense'=>['required','number'],
        'age' => ['min:2', 'max:2', 'required'],
        'gender' => 'required',
        'city' => 'required|min:5',
        'university' => 'required|min:5',
        'faculty' => 'required|min:5',
        'nationality' => 'required|min:5',
        'training_path' => 'required|min:5',
        'cv' => ['required','file','mimes:pdf,doc,docx,jpg,png','max:2048'],
        'support_type'=>'required|min:5',
        'available_time'=>'required|min:5',

    ]);
    if ($request->hasFile('file')) {
        $assistants = $request->file('file')->store('uploads', 'public');


    try {
        $assistants = assistant::create($validatedData);
        $assistants->save();
        return response()->json([
            'status' => true,
            'message' => 'assistant added successfully!',
            'data' => $assistants
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'errors' => ['error' => $e->getMessage()]
        ]);
    }
}}
    public function show( $id)
    {
        $assistants= assistant::findOrFail($id);
        return view('assistant.show', compact('assistants'));
    }

    public function edit(string $id)
    {
        $assistants = assistant::findOrFail($id);
        return view('assistant.edit', compact('assistants'));
    }

    public function update(Request $request, string $id)
{
    $assistants= assistant::findOrFail($id);

     $validator=Validator::make($request->all(),[
        'name_ar' => 'required|string|max:60|',
        'name_en' => 'required|string|max:60|',
        'email' => 'required|email',
        'phone' => 'required', 'regex:/^(010|011|012|015)[0-9]{8}$/'. $id . ',id',
        'address' => 'required|min:5',
        'age' => ['min:2', 'max:2', 'required'],
        'years_of_experiense'=>['required','number'],
        'gender' => 'required',
        'city' => 'required|min:3',
        'university' => 'required|min:3',
        'faculty' => 'required|min:3',
        'nationality' => 'required|min:3',
        'training_path' => 'required|min:3',
        'cv' => ['required','file','mimes:pdf,doc,docx,jpg,png','max:2048'],
        'support_type'=>'required|min:5',
        'available_time'=>'required|min:5',
    ]);
    if($validator->passes()){
            $assistants=Assistant::findOrFail($id);
            $assistants->name_ar=$request->name_ar;
            $assistants->name_en=$request->name_en;
            $assistants->email=$request->email;
            $assistants->phone=$request->phone;
            $assistants->years_of_experiense=$request->years_of_experiense;
            $assistants->address=$request->address;
            $assistants->age=$request->age;
            $assistants->city=$request->city;
            $assistants->university=$request->university;
            $assistants->faculty=$request->faculty;
            $assistants->nationality=$request->nationality;
            $assistants->training_path=$request->training_path;
            $assistants->cv=$request->cv;
            $assistants->support_type=$request->support_type;
            $assistants->available_time=$request->available_time;
            $assistants->update();
            session()->flash('success','User Information Updated Successfully');
                return redirect()->route('assistant.index')->with('success', 'assistant deleted successfully!');

         }else{
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors()

            ]);
        }
}
  public function delete($id)
{
    $assistant = Assistant::findOrFail($id);
    $assistant->delete();
    return redirect()->route('assistant.index')->with('success', 'assistant deleted successfully!');
}


    public function archive()
{
    $assistants = Assistant::onlyTrashed()->get();
    return view('assistant.archive', compact('assistants'));
}
    public function restore($id)
    {
        $assistants = Assistant::onlyTrashed()->findOrFail($id);
        $assistants->restore();
        return redirect()->route('assistant.index')->with('success', 'assistant restored successfully!');
    }

    public function forceDelete($id)
    {
        $assistants = Assistant::onlyTrashed()->findOrFail($id);
        $assistants->forceDelete();
        return redirect()->route('assistant.index')->with('success', 'assistant permanently deleted!');
    }

}
