<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display all available students
     * @return Factory|View|Application|object
     */
    public function index()
    {
        // Get all students from database
        $students = Student::all();

        // Send variable to view
        return view('pages.students.index', compact('students'));

    }
    /**
     * Display a specific student
     * @param Student $student
     * @return Application|Factory|object|View
     */
    public function show(Student $student)
    {

        return view('pages.student.show', [
            'student' => $student
        ]);
    }

    // Registers a new student in database
    public function store(Request $request)
    {
        // Validate form fields
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'birthday' => 'required|date',
        ]);

        // Create a new student
        Student::create($request->all());

        // Redirect and print a success message
        return redirect()->route('dashboard')->with('success', 'Étudiant créé avec succès !');
    }

    // Modify student
    public function update(Request $request, Student $student)
    {
        // Validate form fields
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'birthday' => 'required|date',
        ]);

        $student->update($request->all());

        // Redirect and print a success message
        return redirect()->route('dashboard')->with('success', 'Étudiant modifiée avec succès !');
    }

    // Delete student
    public function delete(Student $student)
    {

        $student->delete();

        // Redirect and print a success message
        return redirect()->route('dashboard')->with('success', 'Étudiant supprimée avec succès !');
    }

}
