@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-centered">
        {{-- <div class="column is-3">
            <sidebar></sidebar>
        </div> --}}
        <div class="column is-9 is-narrow">
            <course-add token="{{ csrf_token() }}" storage_path="{{ storage_path() }}"></course-add>
        </div>
    </div>
</div>
@endsection
