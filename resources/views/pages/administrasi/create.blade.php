@extends('layouts.app')

@section('title', 'Formulir administrasi')

@section('content')

<!-- /.row -->

@if($administrasi)

<div class="card">
    <div class="card-header">
        <h3>terimakasih telah mengisi Administrasi silahkan tunggu pengumuman setelah berkas diperiksa dan tahap selanjutnya sesuai timeline</h3>
    </div>
</div>

@else
<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="card-body p-0">
                <div class="bs-stepper">
                    <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                        <div class="step" data-target="#persyaratan-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="persyaratan-part" id="persyaratan-part-trigger">
                                <span class="bs-stepper-circle">1</span>
                                <span class="bs-stepper-label">Persyaratan</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#identitas1-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="identitas1-part" id="identitas1-part-trigger">
                                <span class="bs-stepper-circle">2</span>
                                <span class="bs-stepper-label">Identitas</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#identitas2-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="identitas2-part" id="identitas2-part-trigger">
                                <span class="bs-stepper-circle">3</span>
                                <span class="bs-stepper-label">Identitas</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#tanggungan-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="tanggungan-part" id="tanggungan-part-trigger">
                                <span class="bs-stepper-circle">4</span>
                                <span class="bs-stepper-label">Tanggungan</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#pendidikan-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="pendidikan-part" id="pendidikan-part-trigger">
                                <span class="bs-stepper-circle">5</span>
                                <span class="bs-stepper-label">Pendidikan</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#riwayat-pekerjaan-part">
                            <button button type="button" class="step-trigger" role="tab" aria-controls="riwayat-pekerjaan-part" id="riwayat-pekerjaan-part-trigger">
                                <span class="bs-stepper-circle">6</span>
                                <span class="bs-stepper-label">Riwayat pekerjaan</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#konsep-pribadi-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="konsep-pribadi-part" id="konsep-pribadi-part-trigger">
                                <span class="bs-stepper-circle">7</span>
                                <span class="bs-stepper-label">Konsep Pribadi</span>
                            </button>
                        </div>
                    </div>

                    <div class="bs-stepper-content">
                        <!-- your steps content here -->
                        {{-- persyaratan --}}

                        <form action="{{ route('administrasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div id="persyaratan-part" class="content" role="tabpanel" aria-labelledby="persyaratan-part-trigger">
                            {{-- <div class="card-header">
                                <h3 class="card-title">Syarat dan ketantuan</h3>
                            </div> --}}
                            {{-- <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div> --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" required class="form-control" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label>Sudahkah anda membaca persyaratan dan memahami persyaratan dan berkas yang dituliskan diatas?</label>
                                <select name="persyaratan" class="form-control" required>
                                    <option value="ya">Ya</option>

                                </select>
                            </div>
                            <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                        </div>

                        {{-- identitas 1 --}}
                        <div id="identitas1-part" class="content" role="tabpanel" aria-labelledby="identitas1-part-trigger">
                            <div class="form-group">
                                <label>Nama Lengkap sesuai KTP</label>
                                <input type="text" name="nama_lengkap" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Foto (3x4)</label>
                                <input type="file" name="photo" class="form-control" accept="image/*" required>
                            </div>
                            <div class="form-group">
                                <label>CV (PDF)</label>
                                <input type="file" name="cv" class="form-control" accept="application/pdf" required>
                            </div>
                            <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                            <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                        </div>

                        {{-- identitas 2 --}}
                        <div id="identitas2-part" class="content" role="tabpanel" aria-labelledby="identitas2-part-trigger">
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Nomor KTP</label>
                                <input type="text" name="no_ktp" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Alamat Lengkap(sesuai KTP)</label>
                                <input name="alamat_lengkap" class="form-control" rows="3" required>
                            </div>
                            <div class="form-group">
                                <label>Foto KTP</label>
                                <input type="file" name="foto_ktp" class="form-control" accept="image/*" required>
                            </div>
                            <div class="form-group">
                                <label>No Hp/WhatsApp</label>
                                <input type="text" name="no_wa" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Pendidikan Terakhir</label>
                                <input type="text" name="pendidikan_terakhir" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Jurusan</label>
                                <input type="text" name="jurusan" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Warga Negara</label>
                                <input type="text" name="warga_negara" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Status Pernikahan</label>
                                <select name="status_pernikahan" class="form-control" required>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                    <option value="Cerai">Cerai</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Instagram</label>
                                <input type="text" name="instagram" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Nomor BPJS</label>
                                <input type="text" name="no_bpjs" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Foto Kartu BPJS</label>
                                <input type="file" name="foto_bpjs" class="form-control" accept="image/*" required>
                            </div>
                            <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                            <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                        </div>

                            {{-- tanggungan --}}
                        <div id="tanggungan-part" class="content" role="tabpanel" aria-labelledby="tanggungan-part-trigger">
                            <div class="form-group">
                                <label>Apakah saat ini hidup mandiri?</label>
                                <select name="apakah_hidup_mandiri" class="form-control" required>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jika belum, dari siapakah anda mendapat tanggungan?</label>
                                <input type="text" name="siapa_yang_menanggung_hidup" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Apakah anda mempunyai tanggungan selain suami/istri dan anak-anak Anda?</label>
                                <select name="apakah_mempunyai_tanggungan" class="form-control" required>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jika ya, sebutkan siapa.</label>
                                <input type="text" name="tanggungan" class="form-control" required>
                            </div>
                            <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                            <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                        </div>

                        {{-- pendidikan --}}
                        <div id="pendidikan-part" class="content" role="tabpanel" aria-labelledby="pendidikan-part-trigger">
                            <div class="form-group">
                                <label>Lulus SLTA Tahun</label>
                                <input type="text" name="lulus_sma" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Lulus Diploma Tahun</label>
                                <input type="text" name="lulus_akemi" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Lulus Universitas Tahun</label>
                                <input type="text" name="lulus_universiitas" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Lulus Pasca Sarjana Tahun</label>
                                <input type="text" name="lulus_pasca_sarjana" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Scan Ijazah</label>
                                <input type="file" name="scan_ijazah" class="form-control " accept="application/pdf" required>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kursus - Lembaga - Lama kursus - Tahun pelaksanaan</label>
                                <textarea name="kursus" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Scan Sertifikat Kursus/Pelatihan</label>
                                <input type="file" name="scan_sertifikat_kursus" class="form-control" accept="application/pdf" >
                            </div>
                            <div class="form-group">
                                <label>Penguasaan Bahasa Inggris(Lisan dan Tulisan)</label>
                                <select name="bahasa_inggris" class="form-control" required>
                                    <option value="Baik">Baik</option>
                                    <option value="Cukup">Cukup</option>
                                    <option value="Kurang">Kurang</option>
                                </select>
                                <div class="form-group">
                                    <label>Penguasaan Bahasa Mandarin(Lisan dan Tulisan)</label>
                                    <select name="bahasa_mandarin" class="form-control" required>
                                        <option value="Baik">Baik</option>
                                        <option value="Cukup">Cukup</option>
                                        <option value="Kurang">Kurang</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Penguasaan Bahasa Lain(Lisan dan Tulisan)</label>
                                    <input type="text" name="bahasa_lain" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Pernahkah Anda merasa Berhasil selama menjalani pendidikan? jelaskan</label>
                                    <textarea type="text" name="pernahkah_berhasil" class="form-control" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Pernahkah Anda merasa Gagal selama menjalani pendidikan? jelaskan</label>
                                    <textarea type="text" name="pernahkah_gagal" class="form-control" required></textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                            <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                        </div>

                            {{-- riwayat pekerjaan --}}
                        <div id="riwayat-pekerjaan-part" class="content" role="tabpanel" aria-labelledby="riwayat-pekerjaan-part-trigger">
                            <div class="form-group">
                                <label>Tuliskan riwayat pekerjaan Anda dimana pekerjaan terakhir dicantumkan di urutan tertinggi (Periode - Nama Perusahaan - Jabatan - Gaji/bulan)</label>
                                <input name="riwayat_pekerjaan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Apa yang Anda ketahui tentang yayasan kami?</label>
                                <textarea type="text" name="pengetahuan_yayasan" class="form-control" ></textarea>
                            </div>
                            <div class="form-group">
                                <label>Jika diterima bekerja di yayasan kami, berapa gaji yang Anda harapkan?</label>
                                <input type="text" name="harapan_gaji" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Bagaimana jika gaji yang Yayasan tawarkan lebih rendah dari gaji yang anda inginkan?</label>
                                <input type="text" name="bagaimana_gaji_tidak_sesuai" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Jika tersedia 2 pilihan berikut, manakah yang Anda pilih?</label>
                                <select name="pilihan" class="form-control" required>
                                    <option value="Pelatihan">Mendapat kesempatan pelatihan</option>
                                    <option value="Uang">Mendapat penggantian berupa uang</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ceritakan satu pengalaman nyata dalam organisasi/pekerjaan dimana ada hambatan/masalah/tantangan yang pernah dihadapi. Bagaimana Anda mengatasinya dan bagaimana hasilnya?</label>
                                <textarea name="pengalaman_organisasi_kerja" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Jika ada, ceritakan pengalaman Anda dalam merintis suatu kegiatan/membuat perubahan. Apa dampak dari tindakan tersebut?</label>
                                <textarea name="pengalaman_membuat_perubahan" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Tindakan apa yang pernah Anda lakukan yang memberikan manfaat bagi orang lain dan paling berkesan bagi Anda? Mengapa Anda melakukan itu?</label>
                                <textarea name="tindakan_bermanfaat" class="form-control" required></textarea>
                            </div>
                            <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                            <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                        </div>

                        {{-- konsep pribadi --}}
                        <div id="konsep-pribadi-part" class="content" role="tabpanel" aria-labelledby="konsep-pribadi-part-trigger">

                            <div class="form-group">
                                <label>Bagaimana Anda mengisi waktu luang Anda?</label>
                                <input name="mengisi_waktu_kosong" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Apa tujuan hidup Anda?</label>
                                <input name="tujuan_hidup" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Apa cita-cita Anda untuk Indonesia?</label>
                                <input name="cita_cita_untuk_indonesia" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Apakah Anda pernah mengajar di depan kelas?</label>
                                <select name="pernah_mengajar" class="form-control" required>
                                    <option value="Pernah">Pernah</option>
                                    <option value="Tidak">Tidak Pernah</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jika pernah, jelaskan</label>
                                <textarea name="pengalaman_mengajar" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Apa yang menjadi kekuatan (strength) diri Anda?</label>
                                <textarea name="kekuatan" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Apa kelemahan (weakness) diri Anda?</label>
                                <textarea name="kelemahan" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Apakah anda merokok?</label>
                                <select name="merokok" class="form-control" required>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Apa saja riwayat penyakit yang pernah/sedang Anda derita?</label>
                                <select name="riwayat_penyakit[]" class="form-control" multiple required>
                                    <option value="aAsma">Asma</option>
                                    <option value="Maag">Maag</option>
                                    <option value="Tipes">Tipes</option>
                                    <option value="Tbc">TBC</option>
                                    <option value="Kelainan jantung">Kelainan Jantung</option>
                                    <option value="Hepatitis">Hepatitis</option>
                                    <option value="Sinusitis">Sinusitis</option>
                                    <option value="Gangguan paru-paru">Gangguan Paru-Paru</option>
                                    <option value="Tidak ada">Tidak Ada</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tuliskan alergi yang anda miliki?</label>
                                <textarea name="alergi" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Siapa orang yang Anda kenal bekerja di yayasan ini?</label>
                                <input type="text" name="kenalan_yayasan" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Siapa orang yang Anda kenal bekerja di yayasan ini dan kontak yang dapat dihubungi</label>
                                <input type="text" name="kontak_kenalan" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Apakah orang tua/keluarga anda sudah mengetahui dan setuju jika anda memutuskan untuk menjadi seorang guru pedalaman?</label>
                                <select name="apakah_orangtua_mengetahui" class="form-control" required>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Apakah Anda bersedia ditempatkan di center Yayasan Tangan Pengharapan yang tersebar di seluruh Indonesia (Nias sampai Papua)?</label>
                                <select name="bersedia_ditempatkan" class="form-control" required>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tuliskan dan kemudian unggah Karya Tulis (Esai) orisinil dengan tema "Pengabdian untuk Pedalaman Indonesia" minimal 300 kata</label>
                                <input type="file" name="esai" class="form-control" required>
                            </div>
                            <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endif

@endsection
