@extends('layouts.app')

@section('title', 'Edit soal')

@section('content')

<div class="container">
    <h2>Tambah Hasil Wawancara</h2>

    <form action="{{ route('interview.store') }}" method="POST">
        @csrf

        <input type="hidden" name="user_id" value="{{ $user->id }}">

        <div class="mb-3">
            <label class="form-label">Nama User</label>
            <input type="text" class="form-control" value="{{ $user->name }}" disabled>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="Lulus">Lulus</option>
                <option value="Tidak Lulus">Tidak Lulus</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Catatan</label>
            <textarea name="notes" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('interview.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
