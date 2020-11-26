<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Exam;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use App\Http\Resources\Exam as ExamResource;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function index(Classroom $classroom)
    {
        return ExamResource::collection($classroom->exams);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Classroom  $classroom
     * @param  \App\Http\Requests\StoreExamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Classroom $classroom, StoreExamRequest $request)
    {

        Exam::create([
            'name' => $request->name,
            'description' => $request->description,
            'classroom_id' => $classroom->id,
            'exam_type_id' => 1,
            'user_id' => 1
        ]);

        return response([
            'message' => 'data saved'
        ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom, Exam $exam)
    {
        return new ExamResource($classroom->exams()->findOrFail($exam->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Classroom  $classroom
     * @param  \App\Http\Requests\UpdateExamRequest  $request
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Classroom $classroom, UpdateExamRequest $request, Exam $exam)
    {
        $exam->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response([
            'message' => 'data updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classroom  $classroom
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom, Exam $exam)
    {
        $classroom->exams()->findOrFail($exam->id)->delete();

        return response([
            'message' => 'data deleted'
        ], 200);
    }
}
