<?php

namespace App\Http\Controllers;

use App\Models\GroupStudent;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GroupStudentController extends Controller
{
    public function index()
    {
        $groupStudents = GroupStudent::with(['group', 'student'])->get();

        return Inertia::render('GroupStudents/Index', [
            'groupStudents' => $groupStudents
        ]);
    }
}
