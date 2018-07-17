@extends('layouts.app')

@section('content')
    <login action="{{ route('login') }}" token="{{ csrf_token() }}"></login>
@endsection
