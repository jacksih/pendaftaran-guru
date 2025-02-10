<?php

namespace App\Http\Controllers;

use App\Models\Period;
use App\Models\Timeline;
use Illuminate\Http\Request;


class TimelineController extends Controller
{
    // Menampilkan form untuk membuat periode dan timeline
    public function create($periodId)
    {
        $period = Period::findOrFail($periodId);
        return view('pages.periode.timeline.create', compact('period'));
    }
    // Menyimpan periode dan timeline
       // Menyimpan timeline ke periode tertentu
    public function store(Request $request, $periodId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        $timeline = new Timeline($request->all());
        $timeline->period_id = $periodId;
        $timeline->save();

        return redirect()->route('period.index')->with('success', 'Timeline added to period successfully');
    }


    // Menampilkan timeline yang sedang berlangsung untuk pengguna
    public function showTimelines()
    {
        $timelines = Timeline::where('start_date', '<=', now())
        ->where('end_date', '>=', now())
        ->get();


        return view('pages.periode.timeline.show', compact('timelines'));
    }

    // Menampilkan form untuk mengedit timeline
    public function edit($periodId, $timelineId)
    {
        $period = Period::findOrFail($periodId);
        $timeline = Timeline::findOrFail($timelineId);
        return view('pages.periode.timeline.edit', compact('period', 'timeline'));
    }

    // Memperbarui timeline yang ada
    public function update(Request $request, $periodId, $timelineId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        $timeline = Timeline::findOrFail($timelineId);
        $timeline->update($request->all());

        return redirect()->route('period.index')->with('success', 'Timeline updated successfully');
    }

    // Menghapus timeline
    public function destroy($periodId, $timelineId)
    {
        $timeline = Timeline::findOrFail($timelineId);
        $timeline->delete();

        return redirect()->route('period.index')->with('success', 'Timeline deleted successfully');
    }
}
