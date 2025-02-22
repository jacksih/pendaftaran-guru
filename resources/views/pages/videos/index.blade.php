

@extends('layouts.app')

@section('title', 'Daftar Video User')

@section('content')

<div class="container">
    <h2>Daftar Video User</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama User</th>
                <th>Judul Video</th>
                <th>Status</th>
                <td>lihat</td>
            </tr>
        </thead>
        <tbody>
            @foreach($videos as $video)
                <tr>
                    <td>{{ $video->user->name }}</td>
                    <td>{{ $video->title }}</td>
                    <td><strong>{{ ucfirst($video->status) }}</strong></td>
                
                    <td>
                        <a href="{{ route('video.show', $video->id) }}"> lihta</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
