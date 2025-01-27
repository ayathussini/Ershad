<?php

namespace App\Http\Controllers\Admin;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller
{

    public function index()
    {
        $applications = Application::with(['student', 'job'])->get();
        return view('application.index', compact('applications'));
    }

     public function create()
    {
        return view('application.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => ['required'],
            'job_id' => ['required'],
            'status' => ['required'],
        ]);
          Application::create([
           'student_id' => $request->student_id,
           'job_id' => $request->job_id,
           'status' => $request->status,
    ]);
        return redirect()->route('application.index')->with('success', 'application added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $applications =Application::findOrFail($id);
        return view('application.show', compact('applications'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $applications = Application::findOrFail($id);
        return view('application.edit', compact('applications'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $applications= Application::findOrFail($id);

     $validator=Validator::make($request->all(),[
        'student_id' =>  ['required'],
        'job_id' => ['required'],
        'status' => ['required'],
    ]);
    if($validator->passes()){
            $applications=Application::findOrFail($id);
            $applications->student_id=$request->student_id;
            $applications->job_id=$request->job_id;
            $applications->status=$request->status;
            $applications->update();
            session()->flash('success','User Information Updated Successfully');
                 return redirect()->route('application.index')->with('success', 'application updated successfully!');
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
    $applications = Application::findOrFail($id);
    $applications->delete();
    return redirect()->route('application.index')->with('success', 'application deleted successfully!');
}


    public function archive()
{
    $applications = Application::onlyTrashed()->get();
    return view('application.archive', compact('applications'));
}
    public function restore($id)
    {
        $applications = Application::onlyTrashed()->findOrFail($id);
        $applications->restore();
        return redirect()->route('application.index')->with('success', 'application restored successfully!');
    }

    public function forceDelete($id)
    {
        $applications = Application::onlyTrashed()->findOrFail($id);
        $applications->forceDelete();
        return redirect()->route('application.index')->with('success', 'application permanently deleted!');
    }
}
