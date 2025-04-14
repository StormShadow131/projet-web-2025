<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class CohortController extends Controller
{
    /**
     * Display all available cohorts
     * @return Factory|View|Application|object
     */
    public function index()
    {
        // Get all cohorts from database
        $cohorts = Cohort::all();

        // Send variable to view
        return view('pages.cohorts.index', compact('cohorts'));
    }


    /**
     * Display a specific cohort
     * @param Cohort $cohort
     * @return Application|Factory|object|View
     */
    public function show(Cohort $cohort)
    {

        return view('pages.cohorts.show', [
            'cohort' => $cohort
        ]);
    }

    // Registers a new cohort in database
    public function store(Request $request)
    {
        // Validate form fields
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Create a new cohort
        Cohort::create($request->all());

        // Redirect and print a success message
        return redirect()->route('dashboard')->with('success', 'Promotion créée avec succès !');
    }

    // Modify cohort
    public function update(Request $request, Cohort $cohort)
    {
        // Validate form fields
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $cohort->update($request->all());

        // Redirect and print a success message
        return redirect()->route('dashboard')->with('success', 'Promotion modifiée avec succès !');
    }

    // Delete cohort
    public function delete(Cohort $cohort)
    {

        $cohort->delete();

        // Redirect and print a success message
        return redirect()->route('dashboard')->with('success', 'Promotion supprimée avec succès !');
    }

}
