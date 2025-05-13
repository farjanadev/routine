<x-app-layout>
   <x-slot name="header">
        <div class="flex justify-center items-center h-16">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Routine List
            </h2>
        </div>
    </x-slot>


    @if (session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 border border-green-200 rounded">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
        <div class="mb-4 p-4 bg-red-100 text-red-800 border border-red-200 rounded">
            {{ session('error') }}
        </div>
    @endif


    <div class="py-6">
    <a href="{{ route('routines.create') }}" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded shadow">
        ➕ Add Routine
    </a>

    <div class="mt-6 bg-white p-4 rounded shadow">
        <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">Subject</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Teacher</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Day</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Time</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($routines as $routine)
                    <tr class="border-t border-gray-200 hover:bg-gray-50">
                        <td class="border px-4 py-2">{{ $routine->subject }}</td>
                        <td class="border px-4 py-2">{{ $routine->teacher }}</td>
                        <td class="border px-4 py-2">{{ $routine->day }}</td>
                        <td class="border px-4 py-2">{{ $routine->start_time }} - {{ $routine->end_time }}</td>
                        <td class="border px-4 py-2 text-center">
                            <a href="{{ route('routines.edit', $routine->id) }}" class="text-blue-600 hover:underline mr-3">✏️ Edit</a>
                            <form action="{{ route('routines.destroy', $routine->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this routine?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">🗑️ Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">No routines available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</x-app-layout>
