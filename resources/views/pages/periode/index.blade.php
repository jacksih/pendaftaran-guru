
@extends('layouts.app')

@section('title', 'Periode')

@section('content')
<div class="card">
    <div class="card-header">
      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah-periode">Tambah Periode</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="contoh" class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Task</th>
            <th>Mulai</th>
            <th>Berakhir</th>
            <th>Aksi</th>
            <th>Timeline</th>
          </tr>
        </thead>
        <tbody>
            @foreach($periods as $period)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $period->name }}</td>
            <td>{{ $period->start_date}}</td>
            <td>{{ $period->end_date }}</td>
            <td>
                <a href="#" class="text-blue-500" data-toggle="modal" data-target="#modal-edit-periode-{{ $period->id }}"><i class="fas fa-edit">Edit</i></a>

                <form action="{{ route('period.destroy', $period->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" ><i class="fas fa-trash">Delete</i></button>
                </form>
            </td>
            <td><button type="button" class="btn btn-default"">
                <a href="{{ route('timeline.index', $period->id) }}" >Timeline</a>
            </button></td>
            <td>
            </td>
        </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal Tambah Periode -->
  <div class="modal fade" id="modal-tambah-periode">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Periode</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form untuk tambah periode -->
                <form action="{{ route('period.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Periode</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Mulai</label>
                        <input type="date" name="start_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date">Berakhir</label>
                        <input type="date" name="end_date" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
  <!-- /.modal -->

  @foreach($periods as $period)
  <!-- Modal Edit Periode -->
  <div class="modal fade" id="modal-edit-periode-{{ $period->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Periode</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form untuk edit periode -->
                <form action="{{ route('period.update', $period->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nama Periode</label>
                        <input type="text" name="name" class="form-control" value="{{ $period->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Mulai</label>
                        <input type="date" name="start_date" class="form-control" value="{{ $period->start_date }}" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date">Berakhir</label>
                        <input type="date" name="end_date" class="form-control" value="{{ $period->end_date }}" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
  <!-- /.modal -->
    @endforeach
    @endsection

