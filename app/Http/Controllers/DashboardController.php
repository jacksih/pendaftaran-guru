<?php

namespace App\Http\Controllers;

use App\Models\User; // Pastikan User model sudah diimport
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Tampilkan halaman dashboard admin dengan daftar user.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil semua data user dari database
        $users = User::all();

        // Kirim data ke view 'dashboard'
        return view('pages.dashboard.index', compact('users'));
    }
}
