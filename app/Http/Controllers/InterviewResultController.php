<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InterviewResult;
use App\Models\User;

class InterviewResultController extends Controller
{
    public function index()
    {
        $results = User::leftJoin('interview_results', 'users.id', '=', 'interview_results.user_id')
        ->select('users.id', 'users.name', 'interview_results.result')
        ->get();
        return view('pages.wawancara.index', compact('results'));
    }

    public function create()
    {
        $users = User::find('id');

    if (!$users) {
        // Handle the case where the user is not found
        return redirect()->route('interview_results.index')->with('error', 'User not found.');
    }
        return view('pages.wawancara.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'result' => 'required|string',
        ]);

        InterviewResult::create($request->all());

        return redirect()->route('interview_results.index')->with('success', 'Hasil wawancara berhasil disimpan');
    }

    public function show(InterviewResult $interviewResult)
    {
        return view('pages.wawancara.show', compact('interviewResult'));
    }
}
