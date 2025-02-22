<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    // Menampilkan daftar video
    public function index()
    {
        $videos = Video::with('user')->latest()->get();
        return view('pages.videos.index', compact('videos'));
    }

    // Menampilkan form tambah video
    public function create()
    {
        $video = Video::where('user_id', Auth::id())->first();
        return view('pages.videos.create', compact('video'));
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
            'user_id' => Auth::id(),
            'status' => 'pending',
        ]);

        return redirect()->route('video.create')->with('success', 'Video berhasil ditambahkan');
    }

    public function show(Video $video)
    {
        return view('pages.videos.show', compact('video'));
    }
    // Admin mengubah status video (lulus / tidak lulus)
    public function updateStatus(Request $request, Video $video)
    {
        $request->validate([
            'status' => 'required|in:lulus,tidak lulus',
        ]);

        $video->update(['status' => $request->status]);

        return redirect()->route('video.index')->with('success', 'Status video berhasil diperbarui');
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
