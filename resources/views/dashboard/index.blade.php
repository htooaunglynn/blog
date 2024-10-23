@extends('dashboard.layout.index')

@section('title')
    <title>Dashboard</title>
@endsection

@section('main')
    @session('success')
        <div class="mb-4 rounded-lg bg-green-200 p-4 text-sm text-green-600" role="alert">
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endsession
@endsection
