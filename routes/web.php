<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\AdministrasiController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ExamController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('pages.dashboard.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['admin'])->group(function () {
        // Menampilkan semua periode
        Route::get('/periods', [PeriodController::class, 'index'])->name('period.index');

        // Menampilkan form untuk membuat periode
        Route::get('/periods/create', [PeriodController::class, 'create'])->name('period.create');

        // Menyimpan periode baru
        Route::post('/periods', [PeriodController::class, 'store'])->name('period.store');

        // Menampilkan form untuk mengedit periode
        Route::get('/periods/{period}/edit', [PeriodController::class, 'edit'])->name('period.edit');

        // Memperbarui periode yang ada
        Route::put('/periods/{period}', [PeriodController::class, 'update'])->name('period.update');

        // Menghapus periode
        Route::delete('/periods/{period}', [PeriodController::class, 'destroy'])->name('period.destroy');

        // Menampilkan form untuk membuat timeline ke periode tertentu
        Route::get('/periods/{period}/timelines/create', [TimelineController::class, 'create'])->name('timeline.create');

        // Menyimpan timeline untuk periode tertentu
        Route::post('/periods/{period}/timelines', [TimelineController::class, 'store'])->name('timeline.store');

        // Menampilkan form untuk mengedit timeline
        Route::get('/periods/{period}/timelines/{timeline}/edit', [TimelineController::class, 'edit'])->name('timeline.edit');

        // Memperbarui timeline
        Route::put('/periods/{period}/timelines/{timeline}', [TimelineController::class, 'update'])->name('timeline.update');

        // Menghapus timeline
        Route::delete('/periods/{period}/timelines/{timeline}', [TimelineController::class, 'destroy'])->name('timeline.destroy');

        // Menampilkan semua data administrasi
        Route::get('/administrasi', [AdministrasiController::class, 'index'])->name('administrasi.index');

        // Menampilkan data administrasi
        Route::get('/administrasi/{administrasi}', [AdministrasiController::class, 'show'])->name('administrasi.show');

        //menampilkan data soal
        Route::get('/tes', [QuestionController::class, 'index'])->name('questions.index');

        // Menampilkan form untuk membuat soal
        Route::get('/tes/create', [QuestionController::class, 'create'])->name('questions.create');

        // Menyimpan soal baru
        Route::post('/tes', [QuestionController::class, 'store'])->name('questions.store');

        // edit soal
        Route::get('/tes/{question}/edit', [QuestionController::class, 'edit'])->name('questions.edit');

        // update soal
        Route::put('/tes/{question}', [QuestionController::class, 'update'])->name('questions.update');

        // delete soal
        Route::delete('/tes/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');
    });

    // Menampilkan form untuk membuat data administrasi
    Route::get('/formulir-administrasi', [AdministrasiController::class, 'create'])->name('administrasi.create');

    // Menyimpan data administrasi
    Route::post('/administrasi', [AdministrasiController::class, 'store'])->name('administrasi.store');

    Route::get('/user/timelines', [TimelineController::class, 'showTimelines'])->name('timeline.show');

    //menampilkan ujian
    Route::get('/ujian', [ExamController::class, 'show'])->name('exam.show');

    //submit ujian
    Route::post('/ujian', [ExamController::class, 'submit'])->name('exam.submit');
});



require __DIR__.'/auth.php';
