@extends('layouts.app')

@section('title', 'Edit soal')

@section('content')

<div class="container">
    <h2>Hasil Wawancara</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Status</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->interviewResult)
                            <span class="badge {{ $user->interviewResult->status == 'Lulus' ? 'bg-success' : 'bg-danger' }}">
                                {{ $user->interviewResult->status }}
                            </span>
                        @else
                            <span class="badge bg-secondary">Belum Ada</span>
                        @endif
                    </td>
                    <td>{{ $user->interviewResult->notes ?? '-' }}</td>
                    <td>
                        @if ($user->interviewResult)
                            <a href="{{ route('interview.edit', $user->interviewResult->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('interview.destroy', $user->interviewResult->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus hasil wawancara ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        @else
                            <a href="{{ route('interview.create', ['user_id' => $user->id]) }}" class="btn btn-primary btn-sm">Tambah</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection
