<?php

namespace App\Http\Controllers;

use App\Exam;
use App\ExamQuestion;
use App\Http\Requests\StoreExamQuestionRequest;
use App\Http\Requests\UpdateExamQuestionRequest;
use App\Http\Resources\ExamQuestion as ExamQuestionResource;

class ExamQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function index(Exam $exam)
    {
        return ExamQuestionResource::collection($exam->examQuestions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Exam  $exam
     * @param  \App\Http\Requests\StoreExamQuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Exam $exam, StoreExamQuestionRequest $request)
    {   
        ExamQuestion::create([
            'question' => $request->question,
            'true_answer' => $request->true_answer,
            'exam_id' => $exam->id
        ]);

        return response([
            'message' => 'data saved'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exam  $exam
     * @param  \App\ExamQuestion  $examQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam, ExamQuestion $examQuestion)
    {
        return new ExamQuestionResource($exam->examQuestions()->findOrFail($examQuestion->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Exam  $exam
     * @param  \App\Http\Requests\UpdateExamQuestionRequest  $request
     * @param  \App\ExamQuestion  $examQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Exam $exam, UpdateExamQuestionRequest $request, ExamQuestion $examQuestion)
    {
        $examQuestion->update([
            'question' => $request->question,
            'true_answer' => $request->true_answer
        ]);
        
        return response([
            'message' => 'data updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     * @param  \App\ExamQuestion  $examQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam, ExamQuestion $examQuestion)
    {
        $exam->examQuestions()->findOrFail($examQuestion->id)->delete();

        return response([
            'message' => 'data deleted'
        ], 200);
    }
}
