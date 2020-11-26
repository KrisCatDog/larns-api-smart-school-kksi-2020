<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Http\Resources\Question as QuestionResource;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function index(Classroom $classroom)
    {
        return QuestionResource::collection($classroom->questions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Classroom  $classroom
     * @param  \App\Http\Requests\StoreQuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Classroom $classroom, StoreQuestionRequest $request)
    {

        Question::create([
            'title' => $request->title,
            'description' => $request->description,
            'classroom_id' => $classroom->id,
            'user_id' => 1,
        ]);

        return response([
            'message' => 'data saved'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom, Question $question)
    {
        return new QuestionResource($classroom->questions()->findOrFail($question->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Classroom  $classroom
     * @param  \App\Http\Requests\UpdateQuestionRequest  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Classroom $classroom, UpdateQuestionRequest $request, Question $question)
    {
        $question->update([
            'title' => $request->title,
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
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom, Question $question)
    {
        $classroom->questions()->findOrFail($question->id)->delete();

        return response([
            'message' => 'data deleted'
        ], 200);
    }
}
