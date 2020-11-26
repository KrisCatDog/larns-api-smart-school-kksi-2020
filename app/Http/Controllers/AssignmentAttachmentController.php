<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\AssignmentAttachment;
use App\Http\Requests\StoreAssignmentAttachmentRequest;
use App\Http\Requests\UpdateAssignmentAttachmentRequest;
use App\Http\Resources\AssignmentAttachment as AssignmentAttachmentResource;

class AssignmentAttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function index(Assignment $assignment)
    {
        return AssignmentAttachmentResource::collection($assignment->assignmentAttachments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Assignment  $assignment
     * @param  \App\Http\Requests\StoreAssignmentAttachmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Assignment $assignment, StoreAssignmentAttachmentRequest $request)
    {
        AssignmentAttachment::create([
            'attachment_file' => $request->attachment_file,
            'assignment_id' => $assignment->id
        ]);
        
        return response([
            'message' => 'data saved'
        ], 200);    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Assignment  $assignment
     * @param  \App\AssignmentAttachment  $assignmentAttachment
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment, AssignmentAttachment $assignmentAttachment)
    {
        // return new AssignmentAttachmentResource($assignmentAttachment);
        return new AssignmentAttachmentResource($assignment->assignmentAttachments()->findOrFail($assignmentAttachment->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Assignment  $assignment
     * @param  \App\Http\Requests\UpdateAssignmentAttachmentRequest  $request
     * @param  \App\AssignmentAttachment  $assignmentAttachment
     * @return \Illuminate\Http\Response
     */
    public function update(Assignment $assignment, UpdateAssignmentAttachmentRequest $request, AssignmentAttachment $assignmentAttachment)
    {
        $assignmentAttachment->update([
            'attachment_file' => $request->attachment_file
        ]);

        return response([
            'message' => 'data updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assignment  $assignment
     * @param  \App\AssignmentAttachment  $assignmentAttachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment, AssignmentAttachment $assignmentAttachment)
    {
        $assignment->assignmentAttachments()->findOrFail($assignmentAttachment->id)->delete();
        
        return response([
            'message' => 'data deleted'
        ], 200);
    }
}
