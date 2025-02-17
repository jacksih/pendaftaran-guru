@extends('layouts.app')

@section('title', 'Data Adminisrasi')

@section('content')

<div class="container">
    <h2 class="text-center mb-4">Data Pendaftar</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Status Pernikahan</th>
                <th>Bahasa Inggris</th>
                <th>Photo</th>
                <th>CV</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($administrasi as $index => $data)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $data->nama_lengkap }}</td>
                <td>{{ $data->tempat_lahir }}</td>
                <td>{{ $data->tanggal_lahir }}</td>
                <td>{{ $data->status_pernikahan }}</td>
                <td>{{ $data->bahasa_inggris }}</td>
                <td><img src="{{ asset('storage/' . $data->photo) }}" width="50"></td>
                <td><a href="{{ asset('storage/' . $data->cv) }}" target="_blank">Download</a></td>
                <td>
                    {{-- <a href="{{ route('admin.detail', $data->id) }}" class="btn btn-info btn-sm">Detail</a> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
