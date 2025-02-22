@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="card">
    @if(auth()->user()->role == 'admin')
    <div>admin</div>
    <div class="card-header">
      <h3 class="card-title">DataTable with default features</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th style="width: 10px">No</th>
          <th>Name</th>
          <th>Email</th>
          <th>Platform(s)</th>
          <th>CSS grade</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>X</td>
            </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    @else
    <div class="card-body">
      <p>You are logged in as a user</p>
    </div>
    @endif
    <!-- /.card-body -->
  </div>


<!-- /.card -->
@endsection
