@extends('layouts.app')

@section('title', 'Tambah Periode')

@section('content')

<div class="container">
    <h2>Tambah Soal Baru</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('questions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul Soal</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="question_text" class="form-label">Teks Soal</label>
            <textarea name="question_text" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="question_image" class="form-label">Gambar Soal (Opsional)</label>
            <input type="file" name="question_image" class="form-control">
        </div>

        <div class="mb-3">
            <label for="option_a" class="form-label">Pilihan A</label>
            <input type="text" name="option_a" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="option_b" class="form-label">Pilihan B</label>
            <input type="text" name="option_b" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="option_c" class="form-label">Pilihan C</label>
            <input type="text" name="option_c" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="option_d" class="form-label">Pilihan D</label>
            <input type="text" name="option_d" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="correct_option" class="form-label">Jawaban Benar</label>
            <select name="correct_option" class="form-select" required>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>

@endsection
