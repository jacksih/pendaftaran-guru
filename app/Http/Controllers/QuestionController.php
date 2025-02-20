<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::paginate(10);
        return view('pages.tes.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'question_text' => 'required|string',
            'question_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'correct_option' => 'required|in:A,B,C,D',
        ]);

        $imagePath = null;
        if ($request->hasFile('question_image')) {
            $imagePath = $request->file('question_image')->store('question_images', 'public');
        }

        Question::create([
            'title' => $request->title,
            'question_text' => $request->question_text,
            'question_image' => $imagePath,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'correct_option' => $request->correct_option,
        ]);
        if (Question::count() >= 100) {
            return back()->withErrors(['msg' => 'Maksimal 100 soal telah tercapai.']);
        }

        return redirect()->route('questions.index')->with('success', 'Soal berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'question_text' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'correct_option' => 'required|in:A,B,C,D',
        ]);

        $imagePath = $question->question_image;
        if ($request->hasFile('question_image')) {
            $imagePath = $request->file('question_image')->store('question_images', 'public');
        }

        $question->update([
            'title' => $request->title,
            'question_text' => $request->question_text,
            'question_image' => $imagePath,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'correct_option' => $request->correct_option,
        ]);

        return redirect()->route('questions.index')->with('success', 'Soal berhasil diperbarui');
    }

    public function destroy(Question $question)
    {
        if ($question->question_image) {
            \Storage::disk('public')->delete($question->question_image);
        }
        $question->delete();

        return redirect()->route('questions.index')->with('success', 'Soal berhasil dihapus');
    }
}

