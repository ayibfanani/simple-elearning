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

    public function show($id)
    {
        $data = [
            'course' => [
                'id' => 1,
                'title' => 'The art of Startup',
                'description' => 'Test',
                'content' => '<p>Non arcu risus quis varius quam quisque. Dictum varius duis at consectetur lorem. Posuere sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper. </p>
                <p>Metus aliquam eleifend mi in nulla posuere sollicitudin aliquam ultrices. In hac habitasse platea dictumst vestibulum rhoncus est pellentesque elit. Accumsan lacus vel facilisis volutpat. Non sodales neque sodales ut etiam.
                    Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis feugiat vivamus.</p>
                <h3 class="has-text-centered">How to properly center tags in bulma?</h3>
                <p> Proper centering of tags in bulma is done with class: <pre>level-item</pre>
                    Voluptat ut farmacium tellus in metus vulputate. Feugiat in fermentum posuere urna nec. Pharetra convallis posuere morbi leo urna molestie.
                    Accumsan lacus vel facilisis volutpat est velit egestas. Fermentum leo vel orci porta. Faucibus interdum posuere lorem ipsum.</p>',
                'backdrop' => 'https://bulma.io/images/placeholders/1280x960.png',
                'created_at' => '5 Days',
                'updated_at' => '5 Days',
                'author' => [
                  'name' => 'Ayib Fanani',
                  'email' => 'ayibfanani@gmail.com',
                  'avatar' => 'https://bulma.io/images/placeholders/96x96.png'
                ],
                'comments' => [
                    [
                        'name' => 'Barbara Middleton',
                        'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porta eros lacus, nec ultricies elit blandit non. Suspendisse pellentesque mauris sit amet dolor blandit rutrum. Nunc in tempus turpis.'
                    ],
                    [
                        'name' => 'Sean Brown',
                        'body' => 'Donec sollicitudin urna eget eros malesuada sagittis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam blandit nisl a nulla sagittis, a lobortis leo feugiat.'
                    ]
                ]
            ],
        ];

        return view('courses.show', $data);
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
