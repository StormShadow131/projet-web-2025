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

//        $user = auth()->user();
//        $role = $user->school()->pivot->role;
//
//        // Redirect to dashboard admin view
//        if ($role == 'admin') {
//            return view('pages.dashboard.dashboard-admin', compact(
//                'totalCohorts',
//                'totalStudents',
//                'totalTeachers',
//                'totalGroupes'
//            ));
//        }
//        // Redirect to dashboard teacher view
//        elseif ($role == 'teacher') {
//            return view('pages.dashboard.dashboard-teacher');
//        }
//        // Redirect to dashboard student view
//        elseif ($role == 'student') {
//            return view('pages.dashboard.dashboard-student');
//        }
//        // No role
//        else {
//            abort(403);
//        }
        return view('pages.dashboard.dashboard-admin', compact(
            'totalCohorts',
            'totalStudents',
            'totalTeachers',
            'totalGroupes'
        ));
    }

    public function dashboard()
    {
        // Get the current user
        $teacher = Auth::user();

        // Get the current year
        $currentYear = now()->year;

        // Get the teacher's cohorts for the current year
        $cohorts = $teacher->cohorts()->where('year', $currentYear)->get();

        // Return the view
        return view('pages.dashboard.dashboard-teacher', compact('cohorts'));
    }

}
