<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Routine') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-md rounded">
                <form action="{{ route('routines.update', $routine->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Subject</label>
                        <input type="text" name="subject" value="{{ old('subject', $routine->subject) }}" class="mt-1 block w-full border border-gray-300 rounded p-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Teacher</label>
                        <input type="text" name="teacher" value="{{ old('teacher', $routine->teacher) }}" class="mt-1 block w-full border border-gray-300 rounded p-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Day</label>
                        <input type="text" name="day" value="{{ old('day', $routine->day) }}" class="mt-1 block w-full border border-gray-300 rounded p-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Start Time</label>
                        <input type="time" name="start_time" value="{{ old('start_time', $routine->start_time) }}" class="mt-1 block w-full border border-gray-300 rounded p-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">End Time</label>
                        <input type="time" name="end_time" value="{{ old('end_time', $routine->end_time) }}" class="mt-1 block w-full border border-gray-300 rounded p-2" required>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-info px-4 py-2 rounded shadow">Update Routine</button>
                        <a href="{{ route('routines.index') }}" class="ml-4 text-gray-600 hover:underline">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
