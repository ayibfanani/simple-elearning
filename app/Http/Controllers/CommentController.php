<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Course;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $course_id)
    {
        $request['course_id'] = $course_id;
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'body' => 'required'
        ]);

        $user = auth()->user();
        $course = Course::find($course_id);
        $course->comments()->create([
            'user_id' => $user->id,
            'name' => $user->name,
            'body' => $request->body
        ]);

        return redirect()->back()->withStatus('Comment has been added!');
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        abort_if(empty($comment), 404);

        if ($comment->delete()) {
            return redirect()->back()->withMessage('Comment has been deleted!');
        }

        return redirect()->back()->withErrors('Oops, looks like something wrong!');
    }
}
