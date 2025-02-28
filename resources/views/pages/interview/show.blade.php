@extends('layouts.app')

@section('title', 'Edit soal')

@section('content')

<div class="container">
    <h2>Hasil Wawancara</h2>

    @if ($result)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Status:
                    <span class="badge {{ $result->status == 'Lulus' ? 'bg-success' : 'bg-danger' }}">
                        {{ $result->status }}
                    </span>
                </h5>
                <p class="card-text"><strong>Catatan Wawancara:</strong></p>
                <p>{{ $result->notes ?? 'Tidak ada catatan' }}</p>
            </div>
        </div>
    @else
        <div class="alert alert-info">
            Hasil wawancara belum tersedia. Silakan tunggu keputusan admin.
        </div>
    @endif
</div>
@endsection
