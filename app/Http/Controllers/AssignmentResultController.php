<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\AssignmentResult;
use App\Http\Requests\StoreAssignmentResultRequest;
use App\Http\Requests\UpdateAssignmentResultRequest;
use App\Http\Resources\AssignmentResult as AssignmentResultResource;

class AssignmentResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function index(Assignment $assignment)
    {
        return AssignmentResultResource::collection($assignment->assignmentResults);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Assignment  $assignment
     * @param  \App\Http\Requests\StoreAssignmentResultRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Assignment $assignment, StoreAssignmentResultRequest $request)
    {
        AssignmentResult::create([
            'attachment_file' => $request->attachment_file->store('uploads/attachments', 'public'),
            'score' => $request->score,
            'assignment_id' => $assignment->id,
            'user_id' => auth()->id()
        ]);

        return response([
            'message' => 'assignment saved'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Assignment  $assignment
     * @param  \App\AssignmentResult  $assignmentResult
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment, AssignmentResult $assignmentResult)
    {
        return new AssignmentResultResource($assignmentResult);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Assignment  $assignment
     * @param  \App\Http\Requests\UpdateAssignmentResultRequest  $request
     * @param  \App\AssignmentResult  $assignmentResult
     * @return \Illuminate\Http\Response
     */
    public function update(Assignment $assignment, UpdateAssignmentResultRequest $request, AssignmentResult $assignmentResult)
    {
        $assignmentResult->update($request->validated());

        return new AssignmentResultResource($assignmentResult);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assignment  $assignment
     * @param  \App\AssignmentResult  $assignmentResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment, AssignmentResult $assignmentResult)
    {
        $assignment->assignmentResults()->findOrFail($assignmentResult->id)->delete();

        return response([
            'message' => 'data deleted'
        ], 200);
    }
}
