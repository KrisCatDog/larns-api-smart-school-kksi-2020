<?php

namespace App\Http\Controllers;

use App\QuestionAnswer;
use App\QuestionSubanswer;
use App\Http\Requests\StoreQuestionSubanswerRequest;
use App\Http\Requests\UpdateQuestionSubanswerRequest;
use App\Http\Resources\QuestionSubanswer as QuestionSubanswerResource;

class QuestionSubanswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\QuestionAnswer  $questionAnswer
     * @return \Illuminate\Http\Response
     */
    public function index(QuestionAnswer $questionAnswer)
    {
        return QuestionSubanswerResource::collection($questionAnswer->questionSubanswers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\QuestionAnswer  $questionAnswer
     * @param  \App\Http\Requests\StoreQuestionSubanswerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionAnswer $questionAnswer, StoreQuestionSubanswerRequest $request)
    {
        QuestionSubanswer::create([
            'subanswer' => $request->subanswer,
            'question_answer_id' => $questionAnswer->id,
            'user_id' => 1
        ]);

        return response([
            'message' => 'data saved'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QuestionAnswer  $questionAnswer
     * @param  \App\QuestionSubanswer  $questionSubanswer
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionAnswer $questionAnswer, QuestionSubanswer $questionSubanswer)
    {
        return new QuestionSubanswerResource($questionAnswer->questionSubanswers()->findOrFail($questionSubanswer->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\QuestionAnswer  $questionAnswer
     * @param  \App\Http\Requests\UpdateQuestionSubanswerRequest $request
     * @param  \App\QuestionSubanswer  $questionSubanswer
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionAnswer $questionAnswer, UpdateQuestionSubanswerRequest $request, QuestionSubanswer $questionSubanswer)
    {
        $questionSubanswer->update([
            'subanswer' => $request->subanswer
        ]);

        return response([
            'message' => 'data updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuestionAnswer  $questionAnswer
     * @param  \App\QuestionSubanswer  $questionSubanswer
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionAnswer $questionAnswer, QuestionSubanswer $questionSubanswer)
    {
        $questionAnswer->QuestionSubanswers()->findOrFail($questionSubanswer->id)->delete();

        return response([
            'message' => 'data deleted'
        ], 200);
    }
}
