@extends('layouts.app')

@section('title', 'Edit soal')

@section('content')

<h2>Hasil Wawancara Anda</h2>
<p>{{ $interviewResult->result }}</p>
{{-- <p><strong>Diumumkan pada:</strong> {{ $interviewResult->created_at->format('d M Y') }}</p> --}}


@endsection
