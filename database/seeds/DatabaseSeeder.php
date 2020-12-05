<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        // factory(App\User::class, 5)->create();;
        // factory(App\Classroom::class, 1)->create();
        // factory(App\Assignment::class, 5)->create();
        // factory(App\AssignmentAttachment::class, 5)->create();
        // factory(App\AssignmentResult::class, 5)->create();
        // factory(App\Attendance::class, 5)->create();
        // factory(App\AttendanceRespond::class, 5)->create();
        // factory(App\Announcement::class, 5)->create();
        // factory(App\Question::class, 5)->create();
        // factory(App\QuestionAnswer::class, 5)->create();
        // factory(App\QuestionSubanswer::class, 5)->create();
        // factory(App\ClassVideo::class, 5)->create();
        // factory(App\ClassVideoComment::class, 5)->create();
        // factory(App\ClassVideoSubcomment::class, 5)->create();
        // factory(App\ExamType::class, 5)->create();
        // factory(App\Exam::class, 5)->create();
        // factory(App\ExamQuestion::class, 5)->create();
        // factory(App\ExamQuestionAnswer::class, 5)->create();
        // factory(App\ExamResult::class, 5)->create();
    }
}
