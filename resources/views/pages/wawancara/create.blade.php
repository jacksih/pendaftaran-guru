@extends('layouts.app')

@section('title', 'Edit soal')

@section('content')


<h2>Hasil Wawancara untuk {{ $users->name }}</h2>

<form method="POST" action="{{ route('interview_results.store') }}">
    @csrf
    <input type="hidden" name="user_id" value="{{ $users->id }}">

    <label for="result">Hasil Wawancara:</label>
    <textarea id="result" name="result" rows="4" cols="50" required>{{ old('result') }}</textarea>

    <br><br>
    <button type="submit">Simpan Hasil</button>
</form>

<a href="{{ route('interview_results.index') }}">Kembali ke Daftar</a>


@endsection
