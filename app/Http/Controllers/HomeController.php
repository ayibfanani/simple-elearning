<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = request('query') ?? '';
        $lecturer_id = request('lecturer') ?? '';
        $user = auth()->user();
        $courses = Course::with(['user', 'comments'])
            ->orderBy('created_at', 'desc')
            ->when($lecturer_id, function ($l) use ($lecturer_id) {
                $l->where('user_id', $lecturer_id);
            })
            ->when($query, function ($q) use ($query) {
                $q->where('title', 'LIKE', "%$query%")
                    ->orWhere('subtitle', 'LIKE', "%$query%")
                    ->orWhere('content', 'LIKE', "%$query%");
            })
            ->paginate(12);

        $lecturers = User::with('role')->whereHas('role', function ($r) {
            return $r->whereIn('key', ['admin', 'lecturer']);
        })->get();

        $data = [
            'user' => $user->toArray(),
            'courses' => $courses,
            'lecturers' => $lecturers->toArray(),
            'favorite_courses' => $user->favorites->pluck('id')->toArray()
        ];

        return view('home', $data);
    }

    public function getFavorites()
    {
        $user = auth()->user();
        $courses = $user->favorites()->with('comments')->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user->toArray(),
            'courses' => $courses
        ];

        return view('courses.favorite', $data);
    }

    public function favorite(Request $request, $course_id)
    {
        $request['course_id'] = $course_id;
        $request->validate([
            'course_id' => 'required|exists:courses,id'
        ]);

        $user = auth()->user();
        $user->favorites()->attach($request->course_id);

        return redirect()->back()->withStatus('Course has been added to favorite lists!');
    }

    public function unfavorite($course_id)
    {
        $user = auth()->user();
        $user->favorites()->detach($course_id);

        return redirect()->back()->withMessage('Course has been removed from favorite lists!');
    }
}
