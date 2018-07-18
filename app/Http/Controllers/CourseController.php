<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;

class CourseController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $courses = Course::with('comments')->where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user->toArray(),
            'courses' => $courses
        ];

        return view('courses.index', $data);
    }

    public function show($id)
    {
        $user = auth()->user();
        $user = User::with('role')->find($user->id);
        $course = Course::with(['user', 'comments'])->find($id);

        $data = [
            'user' => $user->toArray(),
            'course' => $course->toArray(),
            'favorite_courses' => $user->favorites->pluck('id')->toArray()
        ];

        return view('courses.show', $data);
    }

    public function create()
    {
        $data = [
            'storage_path' => storage_path(),
        ];

        return view('courses.add', $data);
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:200',
            'subtitle' => 'required',
            'content' => 'required',
            'duration' => 'required|min:1',
            'attachments' => 'nullable|array',
            'thumb' => 'nullable|url'
        ];

        if (!empty($request->attachments)) {
            $rules['attachments.*'] = 'required|file';
        }

        $request->validate($rules);

        $course = \DB::transaction(function () use ($request) {
            $attachments = $this->_getCompiledAttachments($request);

            $user = auth()->user();
            $course = Course::create([
                'user_id' => $user->id,
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'duration' => $request->duration,
                'content' => $request->content,
                'thumb' => $request->thumb,
                'attachments' => $attachments
            ]);

            if (!empty($course)) {
                return true;
            }

            return false;
        });

        if (!empty($course)) {
            return redirect()->route('courses.index')->withStatus('Course has been posted!');
        }

        return redirect()->back()->withErrors('Oops, looks like something wrong!');
    }

    public function edit($id)
    {
        $user = auth()->user();
        $course = Course::with(['user', 'comments'])->where('user_id', $user->id)->find($id);

        $data = [
            'course' => $course->toArray(),
            'storage_path' => storage_path()
        ];

        return view('courses.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|max:200',
            'subtitle' => 'required',
            'content' => 'required',
            'duration' => 'required|min:1',
            'attachments' => 'nullable|array',
            'thumb' => 'nullable|url'
        ];

        if (!empty($request->attachments)) {
            $rules['attachments.*'] = 'required|file';
        }

        $request->validate($rules);

        $course = \DB::transaction(function () use ($request, $id) {
            $attachments = $this->_getCompiledAttachments($request);

            $user = auth()->user();
            $course = Course::where('user_id', $user->id)->find($id);
            $course->fill([
                'user_id' => $user->id,
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'duration' => $request->duration,
                'content' => $request->content,
                'thumb' => $request->thumb,
                'attachments' => $attachments
            ]);

            return $course->save();
        });

        if ($course) {
            return redirect()->route('courses.index')->withStatus('Course has been updated!');
        }

        return redirect()->back()->withErrors('Oops, looks like something wrong!');
    }

    public function delete($id)
    {
        $user = auth()->user();
        $course = Course::where('user_id', $user->id)->find($id);

        abort_if(empty($course), 404);

        $is_deleted = \DB::transaction(function () use ($course) {
            $course->comments()->delete();
            if ($course->delete()) {
                return true;
            }

            return false;
        });

        if ($is_deleted) {
            return redirect()->back()->withMessage('Course has been deleted');
        }

        return redirect()->back()->withErrors('Oops, looks like something wrong!');
    }

    public function download($encrypted_path)
    {
        $path = decrypt($encrypted_path);

        return response()->download(storage_path("app/$path"));
    }

    private function _getCompiledAttachments(Request $request)
    {
        $attachments = [];

        if (!empty($request->attachments)) {
            foreach ($request->attachments as $file) {
                $mime_type = $file->getClientMimeType();
                $type = explode('/', $mime_type)[0];
                $path = Storage::putFile(str_plural($type), $file);
                $name = explode('/', $path)[1];

                $attachment = [
                    'type' => $type,
                    'name' => $name
                ];

                array_push($attachments, $attachment);
            }
        }

        return $attachments;
    }
}
