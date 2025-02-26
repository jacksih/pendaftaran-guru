@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Hasil Ujian</h2>

    <!-- Filter berdasarkan User -->
    <form method="GET" action="{{ route('exams.results') }}" class="mb-4">
        <label for="user_id" class="form-label">Pilih User:</label>
        <select name="user_id" id="user_id" class="form-control">
            <option value="">Semua User</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary mt-2">Filter</button>
    </form>

    <!-- Tabel Hasil Ujian -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama User</th>
                <th>Skor</th>
                <th>Status</th>
                <th>Tanggal Ujian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $index => $result)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $result->user->name }}</td>
                    <td>{{ $result->total_score }}%</td>
                    <td>
                        <span class="badge {{ $result->status == 'lulus' ? 'bg-success' : 'bg-danger' }}">
                            {{ ucfirst($result->status) }}
                        </span>
                    </td>
                    <td>{{ $result->created_at->format('d M Y, H:i') }}</td>
                    <td>
                        <a href="{{ route('exams.result', $result->id) }}" class="btn btn-info btn-sm">Lihat Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    {{ $results->links() }}
</div>
@endsection
