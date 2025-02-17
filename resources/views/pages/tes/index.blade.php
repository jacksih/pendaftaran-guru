@extends('layouts.app')

@section('title', 'Tes Kemampuan')

@section('content')

<div class="container">
    <h2>Daftar Soal</h2>
    <a href="{{ route('questions.create') }}" class="btn btn-primary mb-3">Tambah Soal</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Pertanyaan</th>
                <th>Jawaban Benar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($questions as $question)
                <tr>
                    <td>{{ $question->title }}</td>
                    <td>{{ Str::limit($question->question_text, 50) }}</td>
                    <td>{{ $question->correct_option }}</td>
                    <td>
                        <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('questions.destroy', $question->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus soal ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $questions->links() }}
</div>

@endsection
