<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrasi;
use Illuminate\Support\Facades\Auth;

class AdministrasiController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('status', 'Anda tidak memiliki akses ke halaman tersebut');
        }
        $administrasi = Administrasi::all();
        return view('pages.administrasi.index', compact('administrasi'));
    }

    public function show(Administrasi $administrasi)
    {
        return view('pages.administrasi.show', compact('administrasi'));
    }

    public function create(){
        if (Administrasi::where('user_id', Auth::id())->exists()) {
            return redirect()->route('dashboard')->with('error', 'Anda sudah mengisi formulir.');
        }
        return view('pages.administrasi.create');
    }


    public function store(Request $request)
    {
        // Cek apakah user sudah mengisi formulir sebelumnya
        if (Administrasi::where('user_id', Auth::id())->exists()) {
            return redirect()->route('dashboard')->with('error', 'Anda sudah mengisi formulir.');
        }

        // Validasi Input
        $request->validate([
            'email' => 'required|email',
            'persyaratan' => 'required|string',
            'nama_lengkap' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'cv' => 'required|mimes:pdf|max:5120',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'no_ktp' => 'required|string',
            'alamat_lengkap' => 'required|string',
            'foto_ktp' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'no_wa' => 'required|string',
            'pendidikan_terakhir' => 'required|string',
            'jurusan' => 'required|string',
            'warga_negara' => 'required|string',
            'status_pernikahan' => 'required|in:Menikah,Belum Menikah,Cerai',
            'instagram' => 'nullable|string',
            'no_bpjs' => 'nullable|string',
            'foto_bpjs' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'apakah_hidup_mandiri' => 'required|in:Ya,Tidak',
            'siapa_yang_menanggung_hidup' => 'nullable|string',
            'apakah_mempunyai_tanggungan' => 'required|in:Ya,Tidak',
            'tanggungan' => 'nullable|string',
            'lulus_sma' => 'nullable|string',
            'lulus_akemi' => 'nullable|string',
            'lulus_universiitas' => 'nullable|string',
            'lulus_pasca_sarjana' => 'nullable|string',
            'scan_ijazah' => 'nullable|mimes:pdf|max:5120',
            'kursus' => 'nullable|string',
            'scan_sertifikat_kursus' => 'nullable|mimes:pdf|max:5120',
            'bahasa_inggris' => 'required|in:Baik,Cukup,Kurang',
            'bahasa_mandarin' => 'required|in:Baik,Cukup,Kurang',
            'bahasa_lain' => 'nullable|string',
            'pernahkah_berhasil' => 'nullable|string',
            'pernahkah_gagal' => 'nullable|string',
            'riwayat_pekerjaan' => 'nullable|string',
            'pengetahuan_yayasan' => 'nullable|string',
            'harapan_gaji' => 'nullable|string',
            'bagaimana_gaji_tidak_sesuai' => 'nullable|string',
            'pilihan' => 'required|in:Pelatihan,Uang',
            'pengalaman_organisasi_kerja' => 'nullable|string',
            'pengalaman_membuat_perubahan' => 'nullable|string',
            'tindakan_bermanfaat' => 'nullable|string',
            'mengisi_waktu_kosong' => 'nullable|string',
            'tujuan_hidup' => 'nullable|string',
            'cita_cita_untuk_indonesia' => 'nullable|string',
            'pernah_mengajar' => 'required|in:Pernah,Tidak',
            'pengalaman_mengajar' => 'nullable|string',
            'kekuatan' => 'nullable|string',
            'kelemahan' => 'nullable|string',
            'merokok' => 'required|in:Ya,Tidak',
            'riwayat_penyakit' => 'nullable|array',
            'riwayat_penyakit.*' => 'in:Asma,Maag,Tipes,Tbc,Kelainan jantung,Hepatitis,Sinusitis,Gangguan paru-paru,Tidak ada',
            'alergi' => 'nullable|string',
            'kenalan_yayasan' => 'nullable|string',
            'kontak_kenalan' => 'nullable|string',
            'apakah_orangtua_mengetahui' => 'required|in:Ya,Tidak',
            'bersedia_ditempatkan' => 'required|in:Ya,Tidak',
            'esai' => 'nullable|mimes:pdf|max:5120',
        ]);

        // Simpan file ke storage
        $photoPath = $request->file('photo')->store('photos', 'public');
        $cvPath = $request->file('cv')->store('cv', 'public');
        $fotoKtpPath = $request->file('foto_ktp')->store('foto_ktp', 'public');
        $fotoBpjsPath = $request->file('foto_bpjs')->store('foto_bpjs', 'public');
        $scanIjazahPath = $request->file('scan_ijazah')->store('scan_ijazah', 'public');
        $scanSertifikatKursusPath = $request->file('scan_sertifikat_kursus')->store('scan_sertifikat_kursus', 'public');
        $esaiPath = $request->file('esai')->store('esai', 'public');

        // Simpan ke database
        Administrasi::create([
            'user_id' => Auth::id(),
            'email' => $request->email,
            'persyaratan' => $request->persyaratan,
            'nama_lengkap' => $request->nama_lengkap,
            'photo' => $photoPath,
            'cv' => $cvPath,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_ktp' => $request->no_ktp,
            'alamat_lengkap' => $request->alamat_lengkap,
            'foto_ktp' => $fotoKtpPath,
            'no_wa' => $request->no_wa,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'jurusan' => $request->jurusan,
            'warga_negara' => $request->warga_negara,
            'status_pernikahan' => $request->status_pernikahan,
            'instagram' => $request->instagram,
            'no_bpjs' => $request->no_bpjs,
            'foto_bpjs' => $fotoBpjsPath,
            'apakah_hidup_mandiri' => $request->apakah_hidup_mandiri,
            'siapa_yang_menanggung_hidup' => $request->siapa_yang_menanggung_hidup,
            'apakah_mempunyai_tanggungan' => $request->apakah_mempunyai_tanggungan,
            'tanggungan' => $request->tanggungan,
            'lulus_sma' => $request->lulus_sma,
            'lulus_akemi' => $request->lulus_akemi,
            'lulus_universiitas' => $request->lulus_universiitas,
            'lulus_pasca_sarjana' => $request->lulus_pasca_sarjana,
            'scan_ijazah' => $scanIjazahPath,
            'kursus' => $request->kursus,
            'scan_sertifikat_kursus' => $scanSertifikatKursusPath,
            'bahasa_inggris' => $request->bahasa_inggris,
            'bahasa_mandarin' => $request->bahasa_mandarin,
            'bahasa_lain' => $request->bahasa_lain,
            'pernahkah_berhasil' => $request->pernahkah_berhasil,
            'pernahkah_gagal' => $request->pernahkah_gagal,
            'riwayat_pekerjaan' => $request->riwayat_pekerjaan,
            'pengetahuan_yayasan' => $request->pengetahuan_yayasan,
            'harapan_gaji' => $request->harapan_gaji,
            'bagaimana_gaji_tidak_sesuai' => $request->bagaimana_gaji_tidak_sesuai,
            'pilihan' => $request->pilihan,
            'pengalaman_organisasi_kerja' => $request->pengalaman_organisasi_kerja,
            'pengalaman_membuat_perubahan' => $request->pengalaman_membuat_perubahan,
            'tindakan_bermanfaat' => $request->tindakan_bermanfaat,
            'mengisi_waktu_kosong' => $request->mengisi_waktu_kosong,
            'tujuan_hidup' => $request->tujuan_hidup,
            'cita_cita_untuk_indonesia' => $request->cita_cita_untuk_indonesia,
            'pernah_mengajar' => $request->pernah_mengajar,
            'pengalaman_mengajar' => $request->pengalaman_mengajar,
            'kekuatan' => $request->kekuatan,
            'kelemahan' => $request->kelemahan,
            'merokok' => $request->merokok,
            'riwayat_penyakit' =>json_encode( $request->riwayat_penyakit),
            'alergi' => $request->alergi,
            'kenalan_yayasan' => $request->kenalan_yayasan,
            'kontak_kenalan' => $request->kontak_kenalan,
            'apakah_orangtua_mengetahui' => $request->apakah_orangtua_mengetahui,

            'bersedia_ditempatkan' => $request->bersedia_ditempatkan,
            'esai' => $esaiPath,
        ]);

        return redirect()->route('dashboard')->with('success', 'Formulir berhasil dikirim!');
    }


}

