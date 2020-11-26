<?php

namespace App\Http\Controllers;

use App\ExamType;
use App\Http\Requests\StoreExamTypeRequest;
use App\Http\Requests\UpdateExamTypeRequest;
use App\Http\Resources\ExamType as ExamTypeResource;

class ExamTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ExamTypeResource::collection(ExamType::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExamTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamTypeRequest $request)
    {
        ExamType::create([
            'name' => $request->name
        ]);

        return response([
            'message' => 'data saved'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExamType  $examType
     * @return \Illuminate\Http\Response
     */
    public function show(ExamType $examType)
    {
        return new ExamTypeResource($examType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExamTypeRequest  $request
     * @param  \App\ExamType  $examType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExamTypeRequest $request, ExamType $examType)
    {
        $examType->update([
            'name' => $request->name
        ]);

        return response([
            'message' => 'data updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExamType  $examType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExamType $examType)
    {
        $examType->delete();

        return response([
            'message' => 'data deleted'
        ], 200);
    }
}
