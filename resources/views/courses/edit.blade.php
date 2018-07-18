@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-centered">
        {{-- <div class="column is-3">
            <sidebar></sidebar>
        </div> --}}
        <div class="column is-9 is-narrow">
            <course-edit token="{{ csrf_token() }}" encoded_course="{{ json_encode($course) }}" storage_path="{{ storage_path() }}"></course-edit>
        </div>
    </div>
</div>
@endsection
