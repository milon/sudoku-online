<?php

namespace App\Http\Controllers\Admin;

use App\Models\Submission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubmissionController extends Controller
{
    /**
     * Show all the submission
     *
     * @return View $view
     */
    public function index()
    {
        $submissions = Submission::with(['game', 'player'])->latest()->paginate(15);

        return view('admin.submissions.index', compact('submissions'));
    }
}
