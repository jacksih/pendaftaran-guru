@extends('layouts.app')

@section('title', 'Tes Kemampuan')

@section('content')

<div class="card">
    <div class="card-header">
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah-soal">Tambah Soal</a>
    </div>
    {{-- <a href="{{ route('questions.create') }}" class="btn btn-primary mb-3">Tambah Soal</a> --}}

    <div class="card-body">

        <table id="contoh" class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Judul</th>
                <th>Soal</th>
                <th>Jawaban Benar</th>
                <th>Aksi</th>
                <th>Tampilkan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($questions as $question)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $question->title }}</td>
                    <td>{{ Str::limit($question->question_text, 50) }}</td>
                    <td>{{ $question->correct_option }}</td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit-soal-{{ $question->id }}"><i class="fas fa-edit">Edit</i></a>
                        <form action="{{ route('questions.destroy', $question->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus soal ini?')"><i class="fas fa-trash">Delete</i></button>
                        </form>
                    </td>
                    <td>
                        <a href="#" class="btn btn-info btn-sm btn-lihat-soal"
                           data-toggle="modal"
                           data-target="#modal-lihat-soal-{{ $question->id }}">
                           <i class="fas fa-eye"></i> Lihat Soal
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modal-tambah-soal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah soal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form untuk tambah periode -->
                <form action="{{ route('questions.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Soal</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="question_text" class="form-label">Teks Soal</label>
                        <textarea name="question_text" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="question_image" class="form-label">Gambar Soal (Opsional)</label>
                        <input type="file" name="question_image" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="option_a" class="form-label">Pilihan A</label>
                        <input type="text" name="option_a" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="option_b" class="form-label">Pilihan B</label>
                        <input type="text" name="option_b" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="option_c" class="form-label">Pilihan C</label>
                        <input type="text" name="option_c" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="option_d" class="form-label">Pilihan D</label>
                        <input type="text" name="option_d" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="correct_option" class="form-label">Jawaban Benar</label>
                        <select name="correct_option" class="form-select" required>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach($questions as $question)
    <div class="modal fade" id="modal-edit-soal-{{ $question->id }}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah soal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form untuk tambah periode -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('questions.update', $question->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Soal</label>
                        <input type="text" name="title" class="form-control" value="{{ $question->title }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="question_text" class="form-label">Teks Soal</label>
                        <textarea name="question_text" class="form-control" rows="3" required>{{ $question->question_text }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="question_image" class="form-label">Gambar Soal (Opsional)</label>
                        @if ($question->question_image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $question->question_image) }}" alt="Soal" width="200">
                            </div>
                        @endif
                        <input type="file" name="question_image" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="option_a" class="form-label">Pilihan A</label>
                        <input type="text" name="option_a" class="form-control" value="{{ $question->option_a }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="option_b" class="form-label">Pilihan B</label>
                        <input type="text" name="option_b" class="form-control" value="{{ $question->option_b }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="option_c" class="form-label">Pilihan C</label>
                        <input type="text" name="option_c" class="form-control" value="{{ $question->option_c }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="option_d" class="form-label">Pilihan D</label>
                        <input type="text" name="option_d" class="form-control" value="{{ $question->option_d }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="correct_option" class="form-label">Jawaban Benar</label>
                        <select name="correct_option" class="form-select" required>
                            <option value="A" {{ $question->correct_option == 'A' ? 'selected' : '' }}>A</option>
                            <option value="B" {{ $question->correct_option == 'B' ? 'selected' : '' }}>B</option>
                            <option value="C" {{ $question->correct_option == 'C' ? 'selected' : '' }}>C</option>
                            <option value="D" {{ $question->correct_option == 'D' ? 'selected' : '' }}>D</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Soal</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach ($questions as $question )
<div class="modal fade" id="modal-lihat-soal-{{ $question->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="soal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h3>{{ $question->title }}</h3>
                <p>{{ $question->question_text }}</p>
                <img src="{{ asset('storage/' . $question->question_image) }}" alt="Soal" width="200">
                <ul class="list-group">
                    <li class="list-group-item"><strong>A:</strong> <span>{{ $question->option_a }}</span></li>
                    <li class="list-group-item"><strong>B:</strong> <span>{{ $question->option_b }}</span></li>
                    <li class="list-group-item"><strong>C:</strong> <span>{{ $question->option_c }}</span></li>
                    <li class="list-group-item"><strong>D:</strong> <span>{{ $question->option_d }}</span></li>
                </ul>

                <p class="mt-3"><strong>Jawaban Benar:</strong> <span  class="badge badge-success">{{ $question->correct_option }}</span></p>
            </div>
        </div>
    </div>
</div>

@endforeach
@endsection
