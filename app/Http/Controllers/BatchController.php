<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditBatchRequest;
use App\Http\Requests\StoreBatchRequest;
use App\Models\Batch;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batches = Batch::all();
        if($batches->isEmpty()){
            return response()->json(['message' => 'No Batches Found']);
        }
        return response()->json($batches ,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBatchRequest $request)
    {
        $batch = Batch::create($request->validated());
        return response()->json($batch);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $batch = Batch::find($id);
        if(!$batch){
            return response()->json(['message' => 'Batch Not Found']);
        }
        return response()->json($batch , 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditBatchRequest $request, string $id)
    {
        $batch = Batch::find($id);
          if(!$batch){
            return response()->json(['message' => 'Batch Not Found']);
        }
        $batch->update($request->validated());
        return response()->json($batch , 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          $batch = Batch::find($id);
          if(!$batch){
            return response()->json(data: ['message' => 'Batch Not Found']);
        }
        $batch->delete();
        return response()->json(data: ['message' => 'Batch Deleted Successfully']);
    }
}
