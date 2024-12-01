<?php 
namespace App\Http\Controllers;

use App\Models\PathTraining;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PathTrainingController extends Controller
{
    public function index()
    {
        $paths = PathTraining::all();
        return view('path.index', compact('paths'));
    }

    public function create()
    {
        return view('path.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration' => 'nullable|integer',
            'level' => 'nullable|string',
        ]);

        PathTraining::create($request->all());

        return redirect()->route('path.index')->with('success', 'Path training created successfully.');
    }
    public function show(string $id)
    {
        $path =PathTraining::findOrFail($id);
        return view('path.show', compact('path'));
    }

    public function edit($id)
    {
        $paths = PathTraining::findOrFail($id);
        return view('path.edit', compact('paths'));
    }

     public function update(Request $request, string $id)
{
    $paths= PathTraining::findOrFail($id);

     $validator=Validator::make($request->all(),[
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'duration' => 'nullable|integer',
        'level' => 'nullable|string',
    ]);
    if($validator->passes()){
            $paths=PathTraining::findOrFail($id);
            $paths->name=$request->name;
            $paths->description=$request->description;
            $paths->duration=$request->duration;
            $paths->level=$request->level;
            $paths->update();
            session()->flash('success','Path Information Updated Successfully');
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
    $paths = PathTraining::findOrFail($id);
    $paths->delete();
    return redirect()->route('path.index')->with('success', 'path deleted successfully!');
}


    public function archive()
{
    $paths = PathTraining::onlyTrashed()->get();
    return view('path.archive', compact('paths'));
}
    public function restore($id)
    {
        $paths = PathTraining::onlyTrashed()->findOrFail($id);
        $paths->restore(); 
        return redirect()->route('path.index')->with('success', 'path restored successfully!');
    }

    public function forceDelete($id)
    {
        $paths = PathTraining::onlyTrashed()->findOrFail($id);
        $paths->forceDelete(); 
        return redirect()->route('path.index')->with('success', 'path permanently deleted!');
    }
}
