<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        $jobs = Job::all(); 
        return view('job.index', compact('jobs'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => ['required','string','max:60','min:5'],
            'name_en' => ['required','string','max:60','min:5'],
            'email' => ['required','email','unique:Jobs'],
            'phone' => ['required',
            'regex:/^(010|011|012|015)[0-9]{8}$/'],
            'address'=>['required','min:10'],
            'city'=>['required','min:5'],
            'university'=>['required','min:5'],
            'faculty'=>['required','min:5'],
            'nationality'=>['required','min:5'],
            'training_path'=>['required','min:5'],
            'personality_test_results'=>['required'],
            'english_level_test_results'=>['required'],
            'password' => ['required','min:8','same:confirm_password'],
            'confirm_password' => ['required','min:8']
        ]);
          Job::create([
           'name_ar' => $request->name_ar,
           'name_en' => $request->name_en,
           'email' => $request->email,
           'phone' => $request->phone,
           'address' => $request->address,
           'city' => $request->city,
           'university' => $request->university,
           'faculty' => $request->faculty,
           'nationality' => $request->nationality,
           'training_path' => $request->training_path,
           'personality_test_results' => $request->personality_test_results,
           'english_level_test_results' => $request->english_level_test_results,
           'password' => md5($request->password), 
    ]);
        return redirect()->route('Job.index')->with('success', 'Job added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jobs = Job::findOrFail($id);
        return view('Job.show', compact('jobs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jobs = Job::findOrFail($id);
        return view('Job.edit', compact('jobs'));
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(Request $request, string $id)
{
    $jobs= Job::findOrFail($id);

     $validator=Validator::make($request->all(),[
        'title' =>  ['required','string','max:60'],
        'description' => ['required','string','max:60'],
        'location' => ['required'],
        'company' => ['required'],
        'job_type' => ['required'],
        'salary' => ['required'],
    ]);
    if($validator->passes()){
            $jobs=Job::findOrFail($id);
            $jobs->title=$request->title;
            $jobs->description=$request->description;
            $jobs->location=$request->location;
            $jobs->company=$request->company;
            $jobs->job_type=$request->job_type;
            $jobs->salary=$request->salary;
            $jobs->update();
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

    /**
     * Remove the specified resource from storage.
     */
   public function delete($id)
{
    $jobs = Job::findOrFail($id);
    $jobs->delete();
    return redirect()->route('job.index')->with('success', 'job deleted successfully!');
}


    public function archive()
{
    $jobs = Job::onlyTrashed()->get();
    return view('job.archive', compact('jobs'));
}
    public function restore($id)
    {
        $jobs = Job::onlyTrashed()->findOrFail($id);
        $jobs->restore(); 
        return redirect()->route('job.index')->with('success', 'job restored successfully!');
    }

    public function forceDelete($id)
    {
        $jobs = Job::onlyTrashed()->findOrFail($id);
        $jobs->forceDelete(); 
        return redirect()->route('job.index')->with('success', 'job permanently deleted!');
    }

}
