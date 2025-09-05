<?php

use App\Http\Controllers\BatchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::apiResource('students' , StudentController::class);
Route::apiResource('teachers' , controller: TeacherController::class);
Route::apiResource('courses' , controller: CourseController::class);
Route::apiResource('batches' , BatchController::class);


