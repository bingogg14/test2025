@props(['link'])

@extends('layouts.default')

@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <a href="{{ $link }}">{{ $link }}</a>
        </div>
    </div>
@endsection
