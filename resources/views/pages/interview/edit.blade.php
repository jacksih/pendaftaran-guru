@extends('layouts.app')

@section('title', 'Edit soal')

@section('content')

<div class="container">
    <h2>Edit Hasil Wawancara</h2>
    <form action="{{ route('interview.update', $result->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Catatan</label>
            <textarea name="notes" class="form-control">{{ $result->notes }}</textarea>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="Lulus" {{ $result->status == 'Lulus' ? 'selected' : '' }}>Lulus</option>
                <option value="Tidak Lulus" {{ $result->status == 'Tidak Lulus' ? 'selected' : '' }}>Tidak Lulus</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>

@endsection
