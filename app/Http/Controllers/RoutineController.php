<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Routine;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $routines = Routine::all();
        return view('routines.index', compact('routines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('routines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'teacher' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        Routine::create($request->only([
            'subject',
            'teacher',
            'day',
            'start_time',
            'end_time',
        ]));

        // Routine::create($request->all());

        return redirect()->route('routines.index')->with('success', 'Routine added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      
           $routine = Routine::findOrFail($id); // ✅ Find routine by ID or fail
           return view('routines.edit', compact('routine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'subject' => 'required',
            'teacher' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        // ✅ Find the routine by ID first
        $routine = Routine::findOrFail($id);

        // ✅ Then update it
        $routine->update($request->only([
            'subject', 'teacher', 'day', 'start_time', 'end_time',
        ]));

        return redirect()->route('routines.index')->with('success', 'Routine updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $routine = Routine::findOrFail($id); // ✅ Get the routine first

        $routine->delete(); // ✅ Now delete it

        return redirect()->route('routines.index')->with('success', 'Routine deleted.');
    }
}
