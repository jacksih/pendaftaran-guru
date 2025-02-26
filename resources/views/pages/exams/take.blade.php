@extends('layouts.app')

@section('title', 'Ujian')


@section('content')
<div class="container">
    @if($questions)
    <h2>ujianselesai</h2>
    @else
    <h2>Ujian Pilihan Ganda</h2>
    <form action="{{ route('exams.submit') }}" method="POST">
        @csrf
        @foreach($questions as $question)
        <div class="mb-4 border p-3 rounded shadow-sm">
            <p><strong>{{ $question->question_text }}</strong></p>

            {{-- Menampilkan gambar jika ada --}}
            @if($question->question_image)
                <img src="{{ asset('storage/' . $question->question_image) }}" alt="Gambar Soal" class="img-fluid mb-3" style="max-width: 400px;">
            @endif

            {{-- Menampilkan pilihan ganda dengan isi lengkap --}}
            @foreach(['A' => $question->option_a, 'B' => $question->option_b, 'C' => $question->option_c, 'D' => $question->option_d] as $key => $value)
            <div class="form-check">
                <input type="radio" class="form-check-input" name="answers[{{ $question->id }}]" value="{{ $key }}" required>
                <label class="form-check-label">
                    <strong>{{ $key }}.</strong> {{ $value }}
                </label>
            </div>
            @endforeach
        </div>
        @endforeach
        <button type="submit" class="btn btn-success">Kirim Jawaban</button>
    </form>
    @endif
</div>
@endsection
