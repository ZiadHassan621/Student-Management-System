<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditStudentRequest;
use App\Http\Requests\StoreStudentRequest;
use App\Models\c;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $teachers = Teacher::all();
        if($teachers->isEmpty()){
                    return response()->json(['message' => 'No Teachers Found'] , 204);

        }
        return response()->json(['teachers' => $teachers] , 200);
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
    public function store(StoreStudentRequest $request)
    {
          $teachers = Teacher::create($request->validated());
          return response()->json([
            'message' => 'Teacher registered successfully!',
            'student' => $teachers
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
           $teacher = Teacher::find($id);

        if(!$teacher){
         return response()->json(['message' => 'Teacher Not Found'] , 200);
        }
                 return response()->json($teacher , 200);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditStudentRequest $request , string $id)
    {
          $teacher = Teacher::find($id);
        if(!$teacher){
                     return response()->json(['message' => 'Teacher Not Found'] , 200);

        }
        $teacher->update($request->validated());

        return response()->json($teacher , 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
             $teacher = Teacher::find($id);
             if(!$teacher){
               return response()->json(['message' => 'Teacher Not Found'] , 200);
        }
        $teacher->delete();
        return response()->json(['message' => 'Teacher deleted Successfully']);
    }
}
