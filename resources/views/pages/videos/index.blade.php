

@extends('layouts.app')

@section('title', 'Edit soal')

@section('content')

<div class="container">
    <h2>Daftar Video Google Drive</h2>
    <a href="{{ route('video.create') }}" class="btn btn-success mb-3">Tambah Video</a>

    @foreach($videos as $video)
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ $video->title }}</h5>
                @if(preg_match('/\/d\/(.*?)\//', $video->google_drive_link, $matches))
                    <iframe
                        src="https://drive.google.com/file/d/{{ $matches[1] }}/preview"
                        width="560" height="315"
                        allow="autoplay"
                        allowfullscreen>
                    </iframe>
                @else
                    <p class="text-danger">Link tidak valid</p>
                @endif
            </div>
        </div>
    @endforeach
</div>

@endsection
