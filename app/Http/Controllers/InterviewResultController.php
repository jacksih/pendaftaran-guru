<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InterviewResult;
use App\Models\User;

class InterviewResultController extends Controller {
    public function index() {
        $users = User::with('interviewResult')->get(); // Ambil semua user dengan hasil wawancaranya
        return view('pages.interview.index', compact('users'));
    }

    public function create(Request $request) {
        $user =User::findOrFail($request->user_id);
        return view('pages.interview.create', compact('user'));
    }


    public function store(Request $request) {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'notes' => 'nullable|string',
            'status' => 'required|in:Lulus,Tidak Lulus',
        ]);

        InterviewResult::create($request->all());

        return redirect()->route('interview.index')->with('success', 'Hasil wawancara berhasil disimpan.');
    }

    public function edit($id) {
        $result = InterviewResult::findOrFail($id);
        return view('pages.interview.edit', compact('result'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'notes' => 'nullable|string',
            'status' => 'required|in:Lulus,Tidak Lulus',
        ]);

        $result = InterviewResult::findOrFail($id);
        $result->update($request->all());

        return redirect()->route('interview.index')->with('success', 'Hasil wawancara berhasil diperbarui.');
    }

    public function destroy($id) {
        InterviewResult::destroy($id);
        return redirect()->route('interview.index')->with('success', 'Hasil wawancara berhasil dihapus.');
    }

    public function showUserResult() {
        $user = auth()->user();
        $result = $user->interviewResult;

        return view('pages.interview.show', compact('result'));
    }
}
