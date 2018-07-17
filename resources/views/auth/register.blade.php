@extends('layouts.app')

@section('content')
    <register action="{{ route('register') }}" token="{{ csrf_token() }}"></register>
@endsection
