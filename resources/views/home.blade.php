@extends('layout.layout')

@section('title')
    <title>Home</title>
@endsection

@section('main')
    <x-success />

    @session('logout')
        <div class="mb-4 rounded-lg bg-sky-200 p-4 text-sm text-sky-600" role="alert">
            <span class="font-medium">Good Bye Dear </span> {{ session('logout') }}
        </div>
    @endsession
@endsection
