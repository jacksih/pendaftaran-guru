@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="card">
    <!-- /.card-header -->
    <div class="card-header">
        <h4>{{ $period->name }}</h4>
    </div>
    <div class="card-body">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah-timeline-{{ $period->id }}">Tambah Timeline</button>
        <table id="contoh" class="table table-bordered mt-4">
            <thead>
              <tr>
                <th>Timeline name</th>
                <th>Mulai</th>
                <th>Berakhir</th>
                <th>Aksi</th>
              </tr>
            </thead>

            @foreach($period->timelines as $timeline)
            <tbody>
                <tr>
                    <td>{{ $timeline->name }}</td>
                    <td>{{ $timeline->start_date }}</td>
                    <td>{{ $timeline->end_date }}</td>
                    <td>
                        <a href="#" class="text-blue-500" data-toggle="modal" data-target="#modal-edit-timeline-{{ $timeline->id }}"><i class="fas fa-edit">Edit</i></a>
                        <form action="{{ route('timeline.destroy', [$period->id, $timeline->id]) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 ml-4"><i class="fas fa-trash">Delete</i></button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>


  <!-- Modal Tambah Timeline -->
  <div class="modal fade" id="modal-tambah-timeline-{{ $period->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Timeline</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form untuk tambah timeline -->
                <form action="{{ route('timeline.store', $period->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Timeline</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-4">
                        <label for="start_date" >Mulai</label>
                        <input type="datetime-local" name="start_date" id="start_date" class="form-control" required>
                    </div>
                    <div class="mb-4">
                        <label for="end_date" >Berakhir</label>
                        <input type="datetime-local" name="end_date" id="end_date" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      <!-- /.modal Tambah Timeline -->

      @foreach($period->timelines as $timeline)
      <!-- Modal Edit Timeline -->
      <div class="modal fade" id="modal-edit-timeline-{{ $timeline->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Timeline</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form untuk edit timeline -->
                    <form action="{{ route('timeline.update', [$period->id, $timeline->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nama Timeline</label>
                            <input type="text" name="name" class="form-control" value="{{ $timeline->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="start_date">Mulai</label>
                            <input type="date" name="start_date" class="form-control" value="{{ $timeline->start_date }}" required>
                        </div>
                        <div class="form-group">
                            <label for="end_date">Berakhir</label>
                            <input type="date" name="end_date" class="form-control" value="{{ $timeline->end_date }}" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      <!-- /.modal Edit Timeline -->
      @endforeach

@endsection
