@extends('layouts.app')

@section('title', 'Edit Periode')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <form action="{{ route('period.update', $period->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" >Period Name</label>
                    <input type="text" name="name" id="name" value="{{ $period->name }}" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label for="start_date" >Start Date</label>
                    <input type="date" name="start_date" id="start_date" value="{{ $period->start_date }}" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label for="end_date" >End Date</label>
                    <input type="date" name="end_date" id="end_date" value="{{ $period->end_date }}" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Period</button>
            </form>
        </div>
    </div>
</div>

@endsection
