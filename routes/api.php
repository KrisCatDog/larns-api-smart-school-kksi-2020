<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Auth Module
Route::post('login', 'Auth\AuthAPIController@login');
Route::post('register', 'Auth\AuthAPIController@register');

Route::middleware('auth:api')->group(function () {
    Route::post('logout', 'Auth\AuthAPIController@logout');

    Route::get('user', function () {
        return request()->user();
    });

    // Classroom Module
    Route::apiResource('classrooms', 'ClassroomController');

    // Assignment Module
    Route::apiResource('classrooms/{classroom}/assignments', 'AssignmentController');
    Route::apiResource('assignments/{assignment}/assignment-attachments', 'AssignmentAttachmentController');
    Route::apiResource('assignments/{assignment}/assignment-results', 'AssignmentResultController');

    // Attendance Module
    Route::apiResource('classrooms/{classroom}/attendances', 'AttendanceController');
    Route::apiResource('attendances/{attendance}/attendance-responds', 'AttendanceRespondController');

    // Annoucement Module
    Route::apiResource('classrooms/{classroom}/announcements', 'AnnouncementController');
    Route::apiResource('announcements/{announcement}/announcement-comments', 'AnnouncementCommentController');

    // Discussion Question Module
    Route::apiResource('classrooms/{classroom}/questions', 'QuestionController');
    Route::apiResource('questions/{question}/question-answers', 'QuestionAnswerController');
    Route::apiResource('question-answers/{questionAnswer}/question-subanswers', 'QuestionSubanswerController');

    // Class Video Module
    Route::apiResource('classrooms/{classroom}/class-videos', 'ClassVideoController');
    Route::apiResource('class-videos/{classVideo}/class-video-comments', 'ClassVideoCommentController');
    Route::apiResource('class-video-comments/{classVideoComment}/class-video-subcomments', 'ClassVideoSubcommentController');

    // Exam Module
    Route::apiResource('exam-types', 'ExamTypeController');
    Route::apiResource('classrooms/{classroom}/exams', 'ExamController');
    Route::apiResource('exams/{exam}/exam-questions', 'ExamQuestionController');
    Route::apiResource('exam-questions/{examQuestion}/exam-question-answers', 'ExamQuestionAnswerController');
    Route::apiResource('exams/{exam}/exam-results', 'ExamResultController');
});
