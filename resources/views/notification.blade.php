<div id="alert-container">
        @if (! empty(session('message')))
            <div class="notification notif is-info">
                <button class="delete"></button>
                @if (is_array(session('message')))
                    @if(session('message.title')) <h4>{!! session('message.title') !!}</h4> @endif
                    {!! session('message.content') !!}
                @else
                    {!! session('message') !!}
                @endif
            </div>
        @endif

        @if (session()->has('status'))
            <div class="notification notif is-success">
                <button class="delete"></button>
                <p>{!! session()->get('status') !!}</p>
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="notification notif is-danger">
                <button class="delete"></button>
                <p><strong>Whoops! There were some problem(s):</strong></p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>