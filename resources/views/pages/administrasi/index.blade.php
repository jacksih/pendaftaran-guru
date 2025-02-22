@extends('layouts.app')

@section('title', 'Data Administrasi')

@section('content')

<div class="card">
    <div class="card-header">
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table id="contoh" class="table table-bordered">
            <thead>
                <th>No</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Status Pernikahan</th>
                <th>Bahasa Inggris</th>
                <th>Photo</th>
                <th>CV</th>
                <th>Aksi</th>
                <th>status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($administrasi as $index => $data)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $data->nama_lengkap }}</td>
                    <td>{{ $data->tempat_lahir }}</td>
                    <td>{{ $data->tanggal_lahir }}</td>
                    <td>{{ $data->status_pernikahan }}</td>
                    <td>{{ $data->bahasa_inggris }}</td>
                    <td><img src="{{ asset('storage/' . $data->photo) }}" width="50"></td>
                    <td><a href="{{ asset('storage/' . $data->cv) }}" target="_blank">Download</a></td>
                    <td>
                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-detail-{{ $data->id }}">Detail</a>
                        <a href="{{ route('administrasi.show', $data->id) }}"> lihat</a>
                    </td>
                    <td><strong>{{ ucfirst($data->status) }}</strong></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@foreach ($administrasi as $data)
<!-- Modal Detail -->
<div class="modal fade" id="modal-detail-{{ $data->id }}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Data: {{ $data->nama_lengkap }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Email:</strong> {{ $data->email }}</p>
                <p><strong>Persyaratan:</strong> {{ $data->persyaratan }}</p>
                <p><strong>Nama Lengkap:</strong> {{ $data->nama_lengkap }}</p>
                <p><strong>Photo:</strong><br><img src="{{ asset('storage/'.$data->photo) }}" width="200"></p>
                @if ($data->cv)
                    <a href="{{ route('pdf.preview', ['id' => $data->id, 'type' => 'cv']) }}" target="_blank" class="btn btn-primary">Lihat CV</a>
                @endif
                <p><strong>CV:</strong>
                    <iframe src="{{ asset('storage/cv/' . $data->cv) }}" width="100%" height="500px">
                        Your browser does not support iframes.
                    </iframe>
                </p>
                <p><strong>CV:</strong> <a href="{{ asset('storage/cvs/' . $data->cv) }}" target="_blank">Download</a></p>
                <p><strong>Tempat Lahir:</strong> {{ $data->tempat_lahir }}</p>
                <p><strong>Tanggal Lahir:</strong> {{ $data->tanggal_lahir }}</p>
                <p><strong>No KTP:</strong> {{ $data->no_ktp }}</p>
                <p><strong>Alamat Lengkap:</strong> {{ $data->alamat_lengkap }}</p>
                <p><strong>Foto KTP:</strong><br><img src="{{ asset('storage/'.$data->foto_ktp) }}" width="200"></p>
                <p><strong>No WA:</strong> {{ $data->no_wa }}</p>
                <p><strong>Pendidikan Terakhir:</strong> {{ $data->pendidikan_terakhir }}</p>
                <p><strong>Jurusan:</strong> {{ $data->jurusan }}</p>
                <p><strong>Warga Negara:</strong> {{ $data->warga_negara }}</p>
                <p><strong>Status Pernikahan:</strong> {{ $data->status_pernikahan }}</p>
                <p><strong>Instagram:</strong> {{ $data->instagram }}</p>
                <p><strong>No BPJS:</strong> {{ $data->no_bpjs }}</p>
                <p><strong>Foto BPJS:</strong><br><img src="{{ asset('storage/'.$data->foto_bpjs) }}" width="200"></p>
                <p><strong>Apakah Hidup Mandiri:</strong> {{ $data->apakah_hidup_mandiri }}</p>
                <p><strong>Siapa Yang Menanggung Hidup:</strong> {{ $data->siapa_yang_menanggung_hidup }}</p>
                <p><strong>Apakah Mempunyai Tanggungan:</strong> {{ $data->apakah_mempunyai_tanggungan }}</p>
                <p><strong>Tanggungan:</strong> {{ $data->tanggungan }}</p>
                <p><strong>Lulus SMA:</strong> {{ $data->lulus_sma }}</p>
                <p><strong>Lulus Akemi:</strong> {{ $data->lulus_akemi }}</p>
                <p><strong>Lulus Universitas:</strong> {{ $data->lulus_universiitas }}</p>
                <p><strong>Lulus Pasca Sarjana:</strong> {{ $data->lulus_pasca_sarjana }}</p>
                <p><strong>Scan Ijazah:</strong> <a href="{{ asset('storage/ijazah/' . $data->scan_ijazah) }}" target="_blank">Download</a></p>
                <p><strong>Kursus:</strong> {{ $data->kursus }}</p>
                <p><strong>Scan Sertifikat Kursus:</strong> <a href="{{ asset('storage/sertifikat/' . $data->scan_sertifikat_kursus) }}" target="_blank">Download</a></p>
                <p><strong>Bahasa Inggris:</strong> {{ $data->bahasa_inggris }}</p>
                <p><strong>Bahasa Mandarin:</strong> {{ $data->bahasa_mandarin }}</p>
                <p><strong>Bahasa Lain:</strong> {{ $data->bahasa_lain }}</p>
                <p><strong>Pernahkah Berhasil:</strong> {{ $data->pernahkah_berhasil }}</p>
                <p><strong>Pernahkah Gagal:</strong> {{ $data->pernahkah_gagal }}</p>
                <p><strong>Riwayat Pekerjaan:</strong> {{ $data->riwayat_pekerjaan }}</p>
                <p><strong>Pengetahuan Yayasan:</strong> {{ $data->pengetahuan_yayasan }}</p>
                <p><strong>Harapan Gaji:</strong> {{ $data->harapan_gaji }}</p>
                <p><strong>Bagaimana Gaji Tidak Sesuai:</strong> {{ $data->bagaimana_gaji_tidak_sesuai }}</p>
                <p><strong>Pilihan:</strong> {{ $data->pilihan }}</p>
                <p><strong>Pengalaman Organisasi Kerja:</strong> {{ $data->pengalaman_organisasi_kerja }}</p>
                <p><strong>Pengalaman Membuat Perubahan:</strong> {{ $data->pengalaman_membuat_perubahan }}</p>
                <p><strong>Tindakan Bermanfaat:</strong> {{ $data->tindakan_bermanfaat }}</p>
                <p><strong>Mengisi Waktu Kosong:</strong> {{ $data->mengisi_waktu_kosong }}</p>
                <p><strong>Tujuan Hidup:</strong> {{ $data->tujuan_hidup }}</p>
                <p><strong>Cita-cita Untuk Indonesia:</strong> {{ $data->cita_cita_untuk_indonesia }}</p>
                <p><strong>Pernah Mengajar:</strong> {{ $data->pernah_mengajar }}</p>
                <p><strong>Pengalaman Mengajar:</strong> {{ $data->pengalaman_mengajar }}</p>
                <p><strong>Kekuatan:</strong> {{ $data->kekuatan }}</p>
                <p><strong>Kelemahan:</strong> {{ $data->kelemahan }}</p>
                <p><strong>Merokok:</strong> {{ $data->merokok }}</p>
                <p><strong>Riwayat Penyakit:</strong> {{ $data->riwayat_penyakit }}</p>
                <p><strong>Alergi:</strong> {{ $data->alergi }}</p>
                <p><strong>Kenalan Yayasan:</strong> {{ $data->kenalan_yayasan }}</p>
                <p><strong>Kontak Kenalan:</strong> {{ $data->kontak_kenalan }}</p>
                <p><strong>Apakah Orangtua Mengetahui:</strong> {{ $data->apakah_orangtua_mengetahui }}</p>
                <p><strong>Bersedia Ditempatkan:</strong> {{ $data->bersedia_ditempatkan }}</p>
                <p><strong>Esai:</strong> <a href="{{ asset('storage/esai/' . $data->esai) }}" target="_blank">Download</a></p>
                <p><strong>Created At:</strong> {{ $data->created_at }}</p>
                <p><strong>Updated At:</strong> {{ $data->updated_at }}</p>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
