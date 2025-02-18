<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    // Menampilkan daftar video
    public function index()
    {
        $videos = Video::latest()->get();
        return view('pages.videos.index', compact('videos'));
    }

    // Menampilkan form tambah video
    public function create()
    {
        return view('pages.videos.create');
    }

    // Menyimpan video ke database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'google_drive_link' => 'required|url',
        ]);

        Video::create([
            'title' => $request->title,
            'google_drive_link' => $request->google_drive_link,
        ]);

        return redirect()->route('dashboard')->with('success', 'Video berhasil ditambahkan');
    }

    // Fungsi untuk mengubah link menjadi embed
    private function getEmbedUrl($url)
    {
        if (preg_match('/\/d\/(.*?)\//', $url, $matches)) {
            return "https://drive.google.com/file/d/{$matches[1]}/preview";
        }
        return null;
    }
}
