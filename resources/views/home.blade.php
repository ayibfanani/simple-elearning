@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-centered">
        {{-- <div class="column is-3">
            <sidebar></sidebar>
        </div> --}}
        <div class="column is-9 is-narrow">
            <home encoded_user="{{ json_encode($user) }}"></home>
        </div>
    </div>
</div>
@endsection
