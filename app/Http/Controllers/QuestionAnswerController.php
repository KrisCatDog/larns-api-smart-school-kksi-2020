<?php

namespace App\Http\Controllers;

use App\Question;
use App\QuestionAnswer;
use App\Http\Requests\StoreQuestionAnswerRequest;
use App\Http\Requests\UpdateQuestionAnswerRequest;
use App\Http\Resources\QuestionAnswer as QuestionAnswerResource;

class QuestionAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function index(Question $question)
    {
        return QuestionAnswerResource::collection($question->questionAnswers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Question  $question
     * @param  \App\Http\Requests\StoreQuestionAnswerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question, StoreQuestionAnswerRequest $request)
    {
        QuestionAnswer::create([
            'question_id' => $question->id,
            'answer' => $request->answer,
            'user_id' => 1
        ]);

        return response([
            'message' => 'data saved'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $Question
     * @param  \App\QuestionAnswer  $QuestionAnswer
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question, QuestionAnswer $questionAnswer)
    {
        return new QuestionAnswerResource($question->questionAnswers()->findOrFail($questionAnswer->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Question  $question
     * @param  \App\Http\Requests\UpdateQuestionAnswerRequest  $request
     * @param  \App\QuestionAnswer  $questionAnswer
     * @return \Illuminate\Http\Response
     */
    public function update(Question $question, UpdateQuestionAnswerRequest $request, QuestionAnswer $questionAnswer)
    {
        $questionAnswer->update([
            'answer' => $request->answer
        ]);

        return response([
            'message' => 'data updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @param  \App\QuestionAnswer  $questionAnswer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question, QuestionAnswer $questionAnswer)
    {
        $question->questionAnswers()->findOrFail($questionAnswer->id)->delete();

        return response([
            'message' => 'data deleted'
        ], 200);
    }
}
