@extends('layouts.app')

@section('title', 'Tambah Periode')

@section('content')

<div class="container">
    <h2>Hasil Ujian</h2>
    <p>Nilai Anda: <strong>{{ $score }}</strong> dari <strong>{{ $total }}</strong> soal.</p>
    <a href="{{ route('exam.show') }}" class="btn btn-primary">Kerjakan Lagi</a>
</div>

@endsection
