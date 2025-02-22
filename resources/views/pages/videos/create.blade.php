@extends('layouts.app')

@section('title', 'Edit soal')

@section('content')

<div class="container">
    <h2>Upload Video</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($video)
        <h4>Video yang telah diunggah:</h4>
        <p><strong>Judul:</strong> {{ $video->title }}</p>

        @if(preg_match('/\/d\/(.*?)\//', $video->google_drive_link, $matches))
            <iframe src="https://drive.google.com/file/d/{{ $matches[1] }}/preview"
                    width="400" height="300" allow="autoplay" allowfullscreen></iframe>
        @else
            <p class="text-danger">Link tidak valid</p>
        @endif
    @else
        <form action="{{ route('videos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul Video</label>
                <input type="text" class="form-control" name="title" required>
            </div>

            <div class="mb-3">
                <label for="google_drive_link" class="form-label">Link Google Drive</label>
                <input type="url" class="form-control" name="google_drive_link" required>
            </div>

            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    @endif
</div>

@endsection
