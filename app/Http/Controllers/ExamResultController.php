<?php

namespace App\Http\Controllers;

use App\Exam;
use App\ExamResult;
use App\Http\Requests\StoreExamResultRequest;
use App\Http\Requests\UpdateExamResultRequest;
use App\Http\Resources\ExamResult as ExamResultResource;

class ExamResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function index(Exam $exam)
    {
        return ExamResultResource::collection($exam->examResults);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Exam  $exam
     * @param  \App\Http\Requests\StoreExamResultRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Exam $exam, StoreExamResultRequest $request)
    {

        ExamResult::create([
            'exam_id' => $exam->id,
            'total_true_answer' => $request->total_true_answer,
            'total_wrong_answer' => $request->total_wrong_answer,
            'score' => $request->score,
            'user_id' => 1
        ]);

        return response([
            'message' => 'data saved'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exam  $exam
     * @param  \App\ExamResult  $examResult
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam, ExamResult $examResult)
    {
        return new ExamResultResource($exam->examResults()->findOrFail($examResult->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Exam  $exam
     * @param  \App\Http\Requests\UpdateExamResultRequest  $request
     * @param  \App\ExamResult  $examResult
     * @return \Illuminate\Http\Response
     */
    public function update(Exam $exam, UpdateExamResultRequest $request, ExamResult $examResult)
    {
        $examResult->update([
            'total_true_answer' => $request->total_true_answer,
            'total_wrong_answer' => $request->total_wrong_answer,
            'score' => $request->score
        ]);

        return response([
            'message' => 'data updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     * @param  \App\ExamResult  $examResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam, ExamResult $examResult)
    {
        $exam->examResults()->findOrFail($examResult->id)->delete();

        return response([
            'message' => 'data deleted'
        ], 200);
    }
}
