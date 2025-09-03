<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditStudentRequest;
use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        if($students->isEmpty()){
                    return response()->json(['message' => 'No Student Found'] , 204);

        }
        return response()->json(['students' => $students] , 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $student = Student::create($request->validated());
          return response()->json([
            'message' => 'Student registered successfully!',
            'student' => $student
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);

        if(!$student){
         return response()->json(['message' => 'Student Not Found'] , 200);
        }
                 return response()->json($student , 200);

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
    public function update(EditStudentRequest $request, string $id)
    {
        $student = Student::find($id);
        if(!$student){
                     return response()->json(['message' => 'Student Not Found'] , 200);

        }
        $student->update($request->validated());

        return response()->json($student , 200);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
             if(!$student){
               return response()->json(['message' => 'Student Not Found'] , 200);
        }
        $student->delete();
        return response()->json(['message' => 'Student deleted Successfully']);
    }
}
