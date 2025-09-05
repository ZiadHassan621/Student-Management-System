<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditCoursesRequest;
use App\Http\Requests\StoreCoursesRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::all();

        if($courses->isEmpty()){
                                return response()->json(['message' => 'No Courses Found'] , 204);
        }
        return response()->json($courses ,200);
    }

    public function store(StoreCoursesRequest $request){
        $course = Course::create($request->validated());
                return response()->json($course ,201);

    }

    public function show(string $id){
       $course = Course::find($id);
       if(!$course){
        return response()->json(['message' => 'Course Not Found']);
       }

       return response()->json($course);
    }

    public function update(EditCoursesRequest $request ,string $id){
           $course = Course::find($id);
           if(!$course){
            return response()->json(['message' => 'Course Not Found']);
           }

           $course->update($request->validated());
           return response()->json($course , 200);
    }

    public function destroy(string $id){
         $course = Course::find($id);
         if(!$course){
            return response()->json(['message' => 'Course Not Found']);
         }
         $course->delete();
         return response()->json(['message' => 'Course Deleted Successfully']);
    }
}
