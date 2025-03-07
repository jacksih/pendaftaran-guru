<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\AdministrasiController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\InterviewResultController;

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

        // Menyimpan periode baru
        Route::post('/periods', [PeriodController::class, 'store'])->name('period.store');

        // Memperbarui periode yang ada
        Route::put('/periods/{period}', [PeriodController::class, 'update'])->name('period.update');

        // Menghapus periode
        Route::delete('/periods/{period}', [PeriodController::class, 'destroy'])->name('period.destroy');

        // Menampilkan semua timeline untuk periode tertentu
        Route::get('/periods/{period}/timelines', [TimelineController::class, 'index'])->name('timeline.index');

        // Menyimpan timeline untuk periode tertentu
        Route::post('/periods/{period}/timelines', [TimelineController::class, 'store'])->name('timeline.store');

        // Memperbarui timeline
        Route::put('/periods/{period}/timelines/{timeline}', [TimelineController::class, 'update'])->name('timeline.update');

        // Menghapus timeline
        Route::delete('/periods/{period}/timelines/{timeline}', [TimelineController::class, 'destroy'])->name('timeline.destroy');

        // Menampilkan semua data administrasi
        Route::get('/administrasi', [AdministrasiController::class, 'index'])->name('administrasi.index');

        // Menampilkan data administrasi
        Route::get('/administrasi/{administrasi}', [AdministrasiController::class, 'show'])->name('administrasi.show');

        //menyimpan status administrasi
        Route::put('/administrasi/{administrasi}', [AdministrasiController::class, 'updateStatus'])->name('administrasi.status');

        //melihat pdf administrasi
        Route::get('/preview/{id}/pdf/{type}', [AdministrasiController::class, 'preview'])->name('pdf.preview');

        //menampilkan data soal
        Route::get('/tes', [QuestionController::class, 'index'])->name('questions.index');

        // Menyimpan soal baru
        Route::post('/tes', [QuestionController::class, 'store'])->name('questions.store');

        // update soal
        Route::put('/tes/{question}', [QuestionController::class, 'update'])->name('questions.update');

        // delete soal
        Route::delete('/tes/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');

        //menampilkan data hasil ujian
        Route::get('/exam-results', [ExamController::class, 'results'])->name('exams.results');

        //menampilkan hasil ujian
        Route::get('/ujian/hasil/{id}', [ExamController::class, 'result'])->name('exams.result');
        //menampilkan hasil ujian

        //menampilkan video
        Route::get('/video', [VideoController::class, 'index'])->name('video.index');

        //update status video
        Route::put('/video/{video}', [VideoController::class, 'updateStatus'])->name('video.status');

        //menampilkan video yang diupload user
        Route::get('/video/{video}', [VideoController::class, 'show'])->name('video.show');

        Route::get('/admin/hasil-wawancara', [InterviewResultController::class, 'index'])->name('interview.index');
        Route::get('/admin/hasil-wawancara/create', [InterviewResultController::class, 'create'])->name('interview.create');
        Route::post('/admin/hasil-wawancara', [InterviewResultController::class, 'store'])->name('interview.store');
        Route::get('/admin/hasil-wawancara/{id}/edit', [InterviewResultController::class, 'edit'])->name('interview.edit');
        Route::put('/admin/hasil-wawancara/{id}', [InterviewResultController::class, 'update'])->name('interview.update');
        Route::delete('/admin/hasil-wawancara/{id}', [InterviewResultController::class, 'destroy'])->name('interview.destroy');

    });

    // Menampilkan form untuk membuat data administrasi
    Route::get('/formulir-administrasi', [AdministrasiController::class, 'create'])->name('administrasi.create');

    // Menyimpan data administrasi
    Route::post('/administrasi', [AdministrasiController::class, 'store'])->name('administrasi.store');

    //menampilkan timeline
    Route::get('/user/timelines', [TimelineController::class, 'showTimelines'])->name('timeline.show');

    //menampilkan ujian
    Route::get('/ujian', [ExamController::class, 'start'])->name('exam.start');

    //submit ujian
    Route::post('/ujian', [ExamController::class, 'submit'])->name('exam.submit');

    //menambahkan video
    Route::get('/tambah-video', [VideoController::class, 'create'])->name('video.create');

    //menyimpan video
    Route::post('/tambah-video', [VideoController::class, 'store'])->name('video.store');

    //menampilkan hasil wawancara
    Route::get('/hasil-wawancara', [InterviewResultController::class, 'show'])->name('interview_result.show');

    //menampilkan form ujian
    Route::get('/ujian', [ExamController::class, 'start'])->name('exams.start');
    //menyimpan hasil ujian
    Route::post('/ujian/submit', [ExamController::class, 'submit'])->name('exams.submit');

    //Menampilkan hasil wawancara user
    Route::get('/hasil-interview', [InterviewResultController::class, 'showUserResult'])->name('interview.show');
});

require __DIR__.'/auth.php';
