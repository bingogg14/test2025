{{-- Action Buttons --}}
<div class="mt-6 grid grid-cols-2 gap-4">
    <form action="{{ route('game.run') }}" method="POST">
        @csrf
        <button
            type="submit"
            class="w-full py-2 px-4 bg-indigo-600 text-white font-medium rounded-lg shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
        >
            Imfeelinglucky
        </button>
    </form>
    <a
        href="{{ route('game.history') }}"
        class="w-full py-2 px-4 bg-gray-200 text-gray-800 font-medium rounded-lg shadow hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400"
    >
        History
    </a>
    <form action="{{ route('link.store') }}" method="POST">
        @csrf
        @method('PUT')
    <button
        type="submit"
        class="w-full py-2 px-4 bg-green-600 text-white font-medium rounded-lg shadow hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500"
    >
        New Link
    </button>
    </form>
    <form action="{{ route('link.revoke') }}" method="POST">
        @csrf
        @method('DELETE')
    <button
        type="submit"
        class="w-full py-2 px-4 bg-red-600 text-white font-medium rounded-lg shadow hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500"
    >
        Revoke Link
    </button>
    </form>
</div>
