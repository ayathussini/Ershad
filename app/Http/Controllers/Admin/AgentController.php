<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agents = Agent::all();
        return view('agent.index', compact('agents'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agent.create');
    }

    /**
     * Store a newly created resource in storage.
     */

public function store(Request $request)
{
    $validatedData = $request->validate([
        'name_ar' => 'required|string|max:60|min:5',
        'name_en' => 'required|string|max:60|min:5',
        'email' => 'required|email|unique:agents',
        'phone' => [
            'required',
            'regex:/^(010|011|012|015)[0-9]{8}$/',
            'unique:agents'
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
        $agents = $request->file('file')->store('uploads', 'public');


    try {
        $agents = Agent::create($validatedData);
        $agents->save();
        return response()->json([
            'status' => true,
            'message' => 'agent added successfully!',
            'data' => $agents
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
        $agents= Agent::findOrFail($id);
        return view('agent.show', compact('agents'));
    }

    public function edit(string $id)
    {
        $agents = Agent::findOrFail($id);
        return view('agent.edit', compact('agents'));
    }

    public function update(Request $request, string $id)
{
    $agents= Agent::findOrFail($id);

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
            $agents=Agent::findOrFail($id);
            $agents->name_ar=$request->name_ar;
            $agents->name_en=$request->name_en;
            $agents->email=$request->email;
            $agents->phone=$request->phone;
            $agents->years_of_experiense=$request->years_of_experiense;
            $agents->address=$request->address;
            $agents->age=$request->age;
            $agents->city=$request->city;
            $agents->university=$request->university;
            $agents->faculty=$request->faculty;
            $agents->nationality=$request->nationality;
            $agents->training_path=$request->training_path;
            $agents->cv=$request->cv;
            $agents->support_type=$request->support_type;
            $agents->available_time=$request->available_time;
            $agents->update();
            session()->flash('success','User Information Updated Successfully');
                return redirect()->route('agent.index')->with('success', 'agent updated successfully!');

         }else{
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors()

            ]);
        }
}
  public function delete($id)
{
    $agent = Agent::findOrFail($id);
    $agent->delete();
    return redirect()->route('agent.index')->with('success', 'agent deleted successfully!');
}


    public function archive()
{
    $agents = Agent::onlyTrashed()->get();
    return view('agent.archive', compact('agents'));
}
    public function restore($id)
    {
        $agents = Agent::onlyTrashed()->findOrFail($id);
        $agents->restore();
        return redirect()->route('agent.index')->with('success', 'agent restored successfully!');
    }

    public function forceDelete($id)
    {
        $agents = Agent::onlyTrashed()->findOrFail($id);
        $agents->forceDelete();
        return redirect()->route('agent.index')->with('success', 'agent permanently deleted!');
    }

}
