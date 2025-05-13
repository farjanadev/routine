<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add New Routine
        </h2>
    </x-slot>

    <div class="py-6">
        <form action="{{ route('routines.store') }}" method="POST" class="max-w-md mx-auto bg-white p-6 rounded shadow">
            @csrf
            <div>
                <label>Subject</label>
                <input type="text" name="subject" class="w-full border p-2" required>
            </div>
            <div class="mt-4">
                <label>Teacher</label>
                <input type="text" name="teacher" class="w-full border p-2" required>
            </div>
            <div class="mt-4">
                <label>Day</label>
                <select name="day" class="w-full border p-2">
                    <option>Saturday</option>
                    <option>Sunday</option>
                    <option>Monday</option>
                    <option>Tuesday</option>
                    <option>Wednesday</option>
                    <option>Thursday</option>
                </select>
            </div>
            <div class="mt-4">
                <label>Start Time</label>
                <input type="time" name="start_time" class="w-full border p-2" required>
            </div>
            <div class="mt-4">
                <label>End Time</label>
                <input type="time" name="end_time" class="w-full border p-2" required>
            </div>
            <div class="mt-6">
                <button class="bg-green-500 text-primary px-4 py-2 rounded">Save</button>
            </div>
        </form>
    </div>
</x-app-layout>
