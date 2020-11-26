<?php

namespace App\Http\Controllers;

use App\ExamQuestion;
use App\ExamQuestionAnswer;
use App\Http\Requests\StoreExamQuestionAnswerRequest;
use App\Http\Requests\UpdateExamQuestionAnswerRequest;
use App\Http\Resources\ExamQuestionAnswer as ExamQuestionAnswerResource;

class ExamQuestionAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\ExamQuestion  $examQuestion
     * @return \Illuminate\Http\Response
     */
    public function index(ExamQuestion $examQuestion)
    {
        return ExamQuestionAnswerResource::collection($examQuestion->examQuestionAnswers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\ExamQuestion  $examQuestion
     * @param  \App\Http\Requests\StoreExamQuestionAnswerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamQuestion $examQuestion, StoreExamQuestionAnswerRequest $request)
    {            
        ExamQuestionAnswer::create([
            'exam_question_id' => $examQuestion->id,
            'answer_identifier' => $request->answer_identifier,
            'answer' => $request->answer,
            'answer_image' => $request->answer_image
        ]);

        return response([
            'message' => 'data saved'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExamQuestion  $examQuestion
     * @param  \App\ExamQuestionAnswer  $examQuestionAnswer
     * @return \Illuminate\Http\Response
     */
    public function show(ExamQuestion $examQuestion, ExamQuestionAnswer $examQuestionAnswer)
    {   
        return new ExamQuestionAnswerResource($examQuestion->examQuestionAnswers()->findOrFail($examQuestionAnswer->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\ExamQuestion  $examQuestion
     * @param  \App\Http\Requests\UpdateExamQuestionAnswerRequest  $request
     * @param  \App\ExamQuestionAnswer  $examQuestionAnswer
     * @return \Illuminate\Http\Response
     */
    public function update(ExamQuestion $examQuestion, UpdateExamQuestionAnswerRequest $request, ExamQuestionAnswer $examQuestionAnswer)
    {
        $examQuestionAnswer->update([
            'answer_identifier' => $request->answer_identifier,
            'answer' => $request->answer,
            'answer_image' => $request->answer_image
        ]);

        return response([
            'message' => 'data updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExamQuestion  $examQuestion
     * @param  \App\ExamQuestionAnswer  $examQuestionAnswer
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExamQuestion $examQuestion, ExamQuestionAnswer $examQuestionAnswer)
    {
        $examQuestion->examQuestionAnswers()->findOrFail($examQuestionAnswer->id)->delete();
        
        return response([
            'message' => 'data deleted'
        ], 200);
    }
}
