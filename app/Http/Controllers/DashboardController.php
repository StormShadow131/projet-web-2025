<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cohort;
use App\Models\Student;
use App\Models\Teacher;

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
}
