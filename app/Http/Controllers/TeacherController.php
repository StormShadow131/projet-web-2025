<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display all available teachers
     * @return Factory|View|Application|object
     */
    public function index()
    {
        // Get all teachers from database
        $teachers = Teacher::all();

        // Return the view
        return view('pages.teachers.index', compact('teachers'));

    }
    /**
     * Display a specific teacher
     * @param Teacher $teacher
     * @return Application|Factory|object|View
     */
    public function show(Teacher $teacher)
    {
        // Return the view
        return view('pages.teachers.show', [
            'teacher' => $teacher
        ]);
    }

    // Registers a new teacher in database
    public function store(Request $request)
    {
        // Validate form fields
        $request->validate([
            'school_id' => 'required|int|max:1',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ]);

        // Create a new teacher
        Teacher::create($request->all());

        // Redirect and print a success message
        return redirect()->route('dashboard')->with('success', 'Enseignant créé avec succès !');
    }

    // Modify teacher
    public function update(Request $request, Teacher $teacher)
    {
        // Validate form fields
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'birthday' => 'required|date',
        ]);

        $teacher->update($request->all());

        // Redirect and print a success message
        return redirect()->route('dashboard')->with('success', 'Enseignant modifié avec succès !');
    }

    // Delete teacher
    public function delete(Teacher $teacher)
    {

        $teacher->delete();

        // Redirect and print a success message
        return redirect()->route('dashboard')->with('success', 'Enseignant supprimé avec succès !');
    }

}
