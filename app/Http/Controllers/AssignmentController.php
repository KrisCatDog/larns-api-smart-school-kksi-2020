<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Classroom;
use App\Http\Requests\StoreAssignmentRequest;
use App\Http\Requests\UpdateAssignmentRequest;
use Illuminate\Http\Request;
use App\Http\Resources\Assignment as AssignmentResource;
use App\Mail\NewAssignmentMail;
use Illuminate\Support\Facades\Mail;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function index(Classroom $classroom)
    {
        return AssignmentResource::collection($classroom->assignments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Classroom  $classroom
     * @param  \App\Http\Requests\StoreAssignmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Classroom $classroom, StoreAssignmentRequest $request)
    {
        $assignment = $classroom->assignments()->create(array_merge(
            $request->validated(),
            ['user_id' => auth()->id()]
        ));

        foreach ($classroom->members as $member) {
            Mail::to($member->email)->send(new NewAssignmentMail(
                $assignment->name,
                $member->name,
                $classroom
            ));
        }

        return new AssignmentResource($assignment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom, Assignment $assignment)
    {
        return new AssignmentResource($classroom->assignments()->findOrFail($assignment->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Classroom  $classroom
     * @param  \App\Http\Requests\StoreAssignmentRequest  $request
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Classroom $classroom, UpdateAssignmentRequest $request, Assignment $assignment)
    {
        $assignment->update($request->validated());

        return new AssignmentResource($assignment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classroom  $classroom
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom, Assignment $assignment)
    {
        $classroom->assignments()->findOrFail($assignment->id)->delete();

        return response([
            'message' => 'data deleted'
        ], 200);
    }
}
