<?php

namespace App\Http\Controllers;
use App\Models\Question;

use Illuminate\Http\Request;

use App\Models\Answer;
use App\Models\ExamAttempt;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller {
    public function start() {
        $questions = Question::all();
        return view('pages.exams.take', compact('questions'));
    }

    public function submit(Request $request) {
        $user = Auth::user();
        $totalScore = 0;

        foreach ($request->input('answers') as $questionId => $answer) {
            $question = Question::find($questionId);
            $score = null;

            if ($question->type == 'multiple_choice') {
                $isCorrect = $question->correct_option == $answer;
                $score = $isCorrect ? 10 : 0;
                $totalScore += $score;
            }

            Answer::create([
                'user_id' => $user->id,
                'question_id' => $questionId,
                'selected_option' => $question->type == 'multiple_choice' ? $answer : null,
                'answer_text' => $question->type == 'essay' ? $answer : null,
                'score' => $score,
            ]);
        }

        $examAttempt = ExamAttempt::create([
            'user_id' => $user->id,
            'total_score' => $totalScore,
            'status' => $totalScore >= 70 ? 'lulus' : 'tidak lulus'
        ]);

        return redirect()->route('exams.start', $examAttempt->id);
    }

    public function result($id) {
        $examAttempt = ExamAttempt::findOrFail($id);
        return view('pages.exams.result', compact('examAttempt'));
    }

    public function results(Request $request)
{
    $users = User::all(); // Ambil semua user
    $userId = $request->input('user_id'); // Ambil user_id dari request

    $query = ExamAttempt::query()->with('user');

    if ($userId) {
        $query->where('user_id', $userId);
    }

    $results = $query->paginate(10);

    return view('pages.exams.index', compact('results', 'users', 'userId'));
}

}

