@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Periode</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <a href="{{ route('period.create') }}" class="text-blue-500 mt-4 inline-block"><i class="fas fa-plus">Tambah Periode</i></a>

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
            <td>1.</td>
            <td>{{ $period->name }}</td>
            <td>{{ $period->start_date}}</td>
            <td>{{ $period->end_date }}</td>
            <td>
                <a href="{{ route('period.edit', $period->id) }}" class="text-blue-500"><i class="fas fa-edit">Edit</i></a>

                <form action="{{ route('period.destroy', $period->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" ><i class="fas fa-trash">Delete</i></button>
                </form>
            </td>
            <td><button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl">
                Timeline
            </button></td>
        </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  @foreach($periods as $period)
  <div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">TimeLine {{ $period->name }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="contoh" class="table table-bordered">
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
                                    <a href="{{ route('timeline.edit', [$period->id, $timeline->id]) }}" class="text-blue-500"><i class="fas fa-edit">Edit</i></a>
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
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="{{ route('timeline.create', $period->id) }}" class="text-blue-500 mt-4 inline-block"><i class="fas fa-plus">Tambah Timeline</i></a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @endforeach
    <!-- /.modal -->





@endsection
