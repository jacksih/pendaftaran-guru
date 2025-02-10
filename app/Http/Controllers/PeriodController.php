<?php
// PeriodController.php
namespace App\Http\Controllers;

use App\Models\Period;
use App\Models\Timeline;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    // Menampilkan form untuk membuat periode
    public function create()
    {
        return view('pages.periode.create');
    }

    // Menyimpan periode baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Membuat periode baru
        $period = Period::create($request->all());

        return redirect()->route('period.index')->with('success', 'Period created successfully');
    }

    // Menampilkan semua periode
    public function index()
    {
        $periods = Period::with('timelines')->get();
        return view('pages.periode.index', compact('periods'));
    }

    // Menampilkan form untuk mengedit periode
    public function edit($id)
    {
        $period = Period::findOrFail($id);
        return view('pages.periode.edit', compact('period'));
    }

    // Memperbarui periode yang ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        $period = Period::findOrFail($id);
        $period->update($request->all());

        return redirect()->route('period.index')->with('success', 'Period updated successfully');
    }

    // Menghapus periode
    public function destroy($id)
    {
        $period = Period::findOrFail($id);
        $period->timelines()->delete(); // Menghapus semua timeline terkait
        $period->delete();

        return redirect()->route('period.index')->with('success', 'Period deleted successfully');
    }
}
