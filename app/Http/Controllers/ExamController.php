<?php

namespace App\Http\Controllers;
use App\Models\Question;

use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function show()
    {
        $questions = Question::inRandomOrder()->limit(100)->get();
        return view('pages.tes.ujian.show', compact('questions'));
    }

    public function submit(Request $request)
    {
        $answers = $request->input('answers');
        $score = 0;

        foreach ($answers as $questionId => $answer) {
            $question = Question::find($questionId);
            if ($question && $question->correct_option === $answer) {
                $score++;
            }
        }

        return view('pages.tes.ujian.result', ['score' => $score, 'total' => count($answers)]);
    }
}
