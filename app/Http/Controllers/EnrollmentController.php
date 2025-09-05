<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditEnrollmentRequest;
use App\Http\Requests\StoreEnrollmentRequest;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrollment = Enrollment::all();
        if($enrollment->isEmpty()){
            return response()->json(['message' => 'Empty Enrollment']);
        }
        return response()->json($enrollment , 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnrollmentRequest $request)
    {
        $enrollment = Enrollment::create($request->validated());
        return response()->json($enrollment ,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $enrollment = Enrollment::find($id);
        if(!$enrollment){
            return response()->json(['message' => 'Enrollment Not Found']);
        }
        return response()->json($enrollment , 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditEnrollmentRequest $request, string $id)
    {
        $enrollment = Enrollment::find($id);
          if(!$enrollment){
            return response()->json(['message' => 'Enrollment Not Found']);
        }
        $enrollment->update($request->validated());
        return response()->json($enrollment , 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $enrollment = Enrollment::find($id);
          if(!$enrollment){
            return response()->json(['message' => 'Enrollment Not Found']);
        }
        $enrollment->delete();
        return response()->json(['message' => 'Enrollment Deleted Successfully'] , 200);
    }
}
