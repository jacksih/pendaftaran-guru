@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Hasil Ujian</h2>

    <div class="card">
        <div class="card-body">
            <h5>Nama: {{ $examAttempt->user->name }}</h5>
            <h5>Skor: {{ $examAttempt->total_score }}%</h5>
            <h5>Status:
                <span class="badge {{ $examAttempt->status == 'lulus' ? 'bg-success' : 'bg-danger' }}">
                    {{ ucfirst($examAttempt->status) }}
                </span>
            </h5>
            <h5>Tanggal Ujian: {{ $examAttempt->created_at->format('d M Y, H:i') }}</h5>
        </div>
    </div>

    <a href="{{ route('exams.results') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Hasil</a>
</div>
@endsection
