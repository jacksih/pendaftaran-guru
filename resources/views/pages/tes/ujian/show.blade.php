@extends('layouts.app')

@section('title', 'Tambah Periode')

@section('content')

<div class="container">
    <h2>Kerjakan Soal</h2>

    <form action="{{ route('exam.submit') }}" method="POST">
        @csrf
        @foreach ($questions as $index => $question)
            <div class="card mb-4">
                <div class="card-body">
                    <h5>{{ $index + 1 }}. {{ $question->question_text }}</h5>
                    @if ($question->question_image)
                        <img src="{{ asset('storage/' . $question->question_image) }}" alt="Gambar Soal" class="img-fluid mb-3" width="300">
                    @endif

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="A" required>
                        <label class="form-check-label">A. {{ $question->option_a }}</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="B">
                        <label class="form-check-label">B. {{ $question->option_b }}</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="C">
                        <label class="form-check-label">C. {{ $question->option_c }}</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="D">
                        <label class="form-check-label">D. {{ $question->option_d }}</label>
                    </div>
                </div>
            </div>
        @endforeach

        <button type="submit" class="btn btn-success">Kumpulkan Jawaban</button>
    </form>
</div>

@endsection
