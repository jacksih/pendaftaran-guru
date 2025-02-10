@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="text-lg font-semibold mb-4">Active Timelines</div>

            @if($timelines->isEmpty())
                <p>No active timelines available.</p>
            @else
                <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b dark:border-gray-700">Timeline Name</th>
                            <th class="px-4 py-2 border-b dark:border-gray-700">Start Date</th>
                            <th class="px-4 py-2 border-b dark:border-gray-700">End Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($timelines as $timeline)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-4 py-2 border-b dark:border-gray-700">{{ $timeline->name }}</td>
                                <td class="px-4 py-2 border-b dark:border-gray-700">{{ $timeline->start_date }}</td>
                                <td class="px-4 py-2 border-b dark:border-gray-700">{{ $timeline->end_date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
