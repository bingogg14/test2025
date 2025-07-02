@props([
    'score',
    'sum',
    'status',
    'statusLabel'
])

@extends('layouts.default')

@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="max-w-md mx-auto mt-8 p-6 bg-white shadow-md rounded-lg">
                <h2 class="text-2xl font-bold mb-4">Game Result</h2>

                {{-- Score / Sum / Status --}}
                <div class="space-y-2">
                    <p class="text-gray-700">
                        <span class="font-semibold">Score:</span>
                        @isset($score)
                            <span>{{ $score }}</span>
                        @endisset
                    </p>
                    
                    <p class="text-gray-700">
                        <span class="font-semibold">Sum:</span>
                        @isset($sum)
                            <span>{{ $sum }}</span>
                        @endisset
                    </p>
                    <p class="text-gray-700">
                        <span class="font-semibold">Status:</span>
                        @isset($status)
                            <span class="{{ $status === \App\Enums\StatusGame::WIN->value ? 'text-green-600' : 'text-red-600' }} font-medium">
                                {{ ucfirst($statusLabel) }}
                            </span>
                        @endisset
                    </p>
                </div>
            </div>
            
            @include('layouts.partials.buttons')
        </div>
@endsection
