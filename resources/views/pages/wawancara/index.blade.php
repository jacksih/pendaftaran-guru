@extends('layouts.app')

@section('title', 'Edit soal')

@section('content')

<h2>Daftar User & Hasil Wawancara</h2>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>Nama User</th>
        <th>Hasil Wawancara</th>
        <th>Aksi</th>
    </tr>
    @foreach($results as $result)
        <tr>
            <td>{{ $result->name }}</td>
            <td>{{ $result->result ?? 'Belum ada hasil' }}</td>
            <td>
                <a href="{{ route('interview_results.create', $result->id) }}">
                    @if($result->result)
                        Edit Hasil
                    @else
                        Tambah Hasil
                    @endif
                </a>
            </td>
        </tr>
    @endforeach
</table>



@endsection
