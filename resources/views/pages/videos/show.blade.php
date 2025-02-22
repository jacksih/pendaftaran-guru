@extends('layouts.app')

@section('title', 'Daftar Video User')

@section('content')

<div class="card">
    @if(preg_match('/\/d\/(.*?)\//', $video->google_drive_link, $matches))
        <iframe src="https://drive.google.com/file/d/{{ $matches[1] }}/preview"
        height="700"
        allow="autoplay" allowfullscreen></iframe>
    @else
        <p class="text-danger">Link tidak valid</p>
    @endif

    <form method="POST" action="{{ route('video.status', $video->id) }}">
        @csrf
        @method('PUT')
        <select name="status" class="form-select d-inline w-auto">
            <option value="pending" {{ $video->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="lulus" {{ $video->status == 'lulus' ? 'selected' : '' }}>Lulus</option>
            <option value="tidak lulus" {{ $video->status == 'tidak lulus' ? 'selected' : '' }}>Tidak Lulus</option>
        </select>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection
