@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-centered">
        {{-- <div class="column is-3">
            <sidebar></sidebar>
        </div> --}}
        <div class="column is-9 is-narrow">
            <home encoded_lecturers="{{ json_encode($lecturers) }}"
                token="{{ csrf_token() }}"
                encoded_user="{{ json_encode($user) }}"
                encoded_courses="{{ json_encode($courses->toArray()['data']) }}"
                encoded_req_query="{{ json_encode(request()->query()) }}"
                encoded_favorite_courses="{{ json_encode($favorite_courses) }}"
            ></home>
            <br>
            {{ $courses->links('vendor.pagination.default') }}
        </div>
    </div>
</div>
@endsection
