<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cohort;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCohorts = Cohort::count();
        $totalStudents = Student::count();
        $totalTeachers = Teacher::count();

        // Static nombre
        $totalGroupes = 5;

        return view('pages.dashboard.dashboard-admin', compact(
            'totalCohorts',
            'totalStudents',
            'totalTeachers',
            'totalGroupes'
        ));
    }

    public function dashboard()
    {
        $teacher = Auth::user();
        $currentYear = now()->year;

        $cohorts = $teacher->cohorts()->where('year', $currentYear)->get();

        return view('pages.dashboard.dashboard-teacher', compact('cohorts'));
    }

}
