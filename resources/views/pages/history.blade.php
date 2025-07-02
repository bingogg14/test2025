@props(['history'])

@extends('layouts.default')

@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="max-w-md mx-auto mt-8 p-6 bg-white shadow-md rounded-lg">
                <h2 class="text-2xl font-bold mb-4">History</h2>
                    <ul>
                        <li class="flex justify-between items-center px-6 py-3 border-b last:border-b-0">
                            <span class="text-gray-600 text-sm">Date (d.m.Y H:i)</span>
                            <span class="text-gray-800">Score</span>
                            <span class="text-gray-800">Sum</span>
                            <span class="text-gray-800">Status</span>
                        </li>
                        @forelse($history as $item)
                            <li class="flex justify-between items-center px-6 py-3 border-b last:border-b-0">
                                <span class="text-gray-600 text-sm">{{ $item->created_at->format('d.m.Y H:i') }}</span>
                                <span class="text-gray-800">{{ $item->score }}</span>
                                <span class="text-gray-800">{{ $item->sum }}</span>
                                <span class="{{ $item->status === \App\Enums\StatusGame::WIN ? 'text-green-600' : 'text-red-600' }} font-medium">
                                  {{ ucfirst($item->status->getLabel()) }}
                                </span>
                            </li>
                        @empty
                            <li class="px-6 py-4 text-center text-gray-500">No history yet.</li>
                        @endforelse
                    </ul>
                @include('layouts.partials.buttons')
            </div>
        </div>
    </div>
@endsection
