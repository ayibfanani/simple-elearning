@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-centered">
        {{-- <div class="column is-3">
            <sidebar></sidebar>
        </div> --}}
        <div class="column is-9 is-narrow">
            <course-favorites token="{{ csrf_token() }}" encoded_user="{{ json_encode($user) }}" encoded_courses="{{ json_encode($courses->toArray()['data']) }}"></course-favorites>
            <br>
            {{ $courses->links('vendor.pagination.default') }}
        </div>
    </div>
</div>
@endsection
