<?php

namespace App\Http\Controllers;

class CourseController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $data = [
            'user' => $user->toArray()
        ];

        return view('home', $data);
    }

    public function create()
    {
        return view('courses.add');
    }

    public function store()
    {
        return view('home');
    }

    public function edit()
    {
        return view('courses.edit');
    }

    public function update()
    {
        return view('home');
    }

    public function delete()
    {
        return view('home');
    }
}
