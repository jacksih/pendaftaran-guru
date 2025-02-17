@extends('layouts.app')

@section('title', 'Edit soal')

@section('content')

<div class="container">
    <h2>Edit Soal</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('questions.update', $question->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Judul Soal</label>
            <input type="text" name="title" class="form-control" value="{{ $question->title }}" required>
        </div>

        <div class="mb-3">
            <label for="question_text" class="form-label">Teks Soal</label>
            <textarea name="question_text" class="form-control" rows="3" required>{{ $question->question_text }}</textarea>
        </div>

        <div class="mb-3">
            <label for="question_image" class="form-label">Gambar Soal (Opsional)</label>
            @if ($question->question_image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $question->question_image) }}" alt="Soal" width="200">
                </div>
            @endif
            <input type="file" name="question_image" class="form-control">
        </div>

        <div class="mb-3">
            <label for="option_a" class="form-label">Pilihan A</label>
            <input type="text" name="option_a" class="form-control" value="{{ $question->option_a }}" required>
        </div>

        <div class="mb-3">
            <label for="option_b" class="form-label">Pilihan B</label>
            <input type="text" name="option_b" class="form-control" value="{{ $question->option_b }}" required>
        </div>

        <div class="mb-3">
            <label for="option_c" class="form-label">Pilihan C</label>
            <input type="text" name="option_c" class="form-control" value="{{ $question->option_c }}" required>
        </div>

        <div class="mb-3">
            <label for="option_d" class="form-label">Pilihan D</label>
            <input type="text" name="option_d" class="form-control" value="{{ $question->option_d }}" required>
        </div>

        <div class="mb-3">
            <label for="correct_option" class="form-label">Jawaban Benar</label>
            <select name="correct_option" class="form-select" required>
                <option value="A" {{ $question->correct_option == 'A' ? 'selected' : '' }}>A</option>
                <option value="B" {{ $question->correct_option == 'B' ? 'selected' : '' }}>B</option>
                <option value="C" {{ $question->correct_option == 'C' ? 'selected' : '' }}>C</option>
                <option value="D" {{ $question->correct_option == 'D' ? 'selected' : '' }}>D</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Soal</button>
    </form>
</div>

@endsection
