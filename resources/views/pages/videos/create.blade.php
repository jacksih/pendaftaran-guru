@extends('layouts.app')

@section('title', 'Edit soal')

@section('content')

<div class="container">
    <h2>Tambah Video Google Drive</h2>
    <form method="POST" action="{{ route('video.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul Video</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="google_drive_link" class="form-label">Link Google Drive</label>
            <input type="url" class="form-control" id="google_drive_link" name="google_drive_link" placeholder="https://drive.google.com/file/d/XXXXX/view" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Video</button>
    </form>
</div>

@endsection
