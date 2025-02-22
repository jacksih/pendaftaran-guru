<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('administrasis', function (Blueprint $table) {
            $table->id();
            $table->foreignID('user_id')->constrained()->onDelete('cascade');
            $table->string('email');
            $table->string('persyaratan'); // jawaban: ya
            $table->string('nama_lengkap');
            $table->string('photo'); //gambar
            $table->string('cv'); //pdf
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('no_ktp');
            $table->string('alamat_lengkap');
            $table->string('foto_ktp'); //gambar
            $table->string('no_wa');
            $table->string('pendidikan_terakhir');
            $table->string('jurusan');
            $table->string('warga_negara');
            $table->string('status_pernikahan'); // jawaban: menikah/belum menikah/ cerai
            $table->string('instagram');
            $table->string('no_bpjs');
            $table->string('foto_bpjs'); //gambar
            $table->string('apakah_hidup_mandiri'); // jawaban: ya/tidak
            $table->string('siapa_yang_menanggung_hidup'); // jawaban: isian
            $table->string('apakah_mempunyai_tanggungan'); // jawaban: ya/tidak -> tangggungan selain suami/istri dan anak
            $table->string('tanggungan'); // jawaban: isian
            $table->string('lulus_sma'); //tahun lulus sma
            $table->string('lulus_akemi'); //tahun lulus diploma
            $table->string('lulus_universiitas'); //tahum lulus universitas
            $table->string('lulus_pasca_sarjana'); //tahun lulus pasca sarjana
            $table->string('scan_ijazah'); //pdf
            $table->string('kursus'); //jenis kursus - lembaga kursus- lama kursus - tahun pelaksanaan
            $table->string('scan_sertifikat_kursus'); //pdf
            $table->string('bahasa_inggris'); //jawaban: baik/cukup/kurang
            $table->string('bahasa_mandarin'); //jawaban: baik/cukup/kurang
            $table->string('bahasa_lain');
            $table->string('pernahkah_berhasil');
            $table->string('pernahkah_gagal');
            $table->string('riwayat_pekerjaan'); //jawaban: Periode - Nama Perusahaan - Jabatan - Gaji/bulan
            $table->string('pengetahuan_yayasan');
            $table->string('harapan_gaji');
            $table->string('bagaimana_gaji_tidak_sesuai');
            $table->string('pilihan'); // jawaban: pilihan 1/pilihan 2
            $table->string('pengalaman_organisasi_kerja');
            $table->string('pengalaman_membuat_perubahan');
            $table->string('tindakan_bermanfaat');
            $table->string('mengisi_waktu_kosong');
            $table->string('tujuan_hidup');
            $table->string('cita_cita_untuk_indonesia');
            $table->string('pernah_mengajar'); //jawaban: ya/tidak
            $table->string('pengalaman_mengajar');
            $table->string('kekuatan');
            $table->string('kelemahan');
            $table->string('merokok'); //jawaban: ya/tidak
            $table->string('riwayat_penyakit'); //jawaban pilihan
            $table->string('alergi');
            $table->string('kenalan_yayasan');
            $table->string('kontak_kenalan');
            $table->string('apakah_orangtua_mengetahui'); //jawaban: ya/tidak
            $table->string('bersedia_ditempatkan'); //jawaban: ya/tidak
            $table->string('esai'); //pdf
            $table->enum('status', ['pending', 'lulus', 'tidak lulus'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulir');
    }
};
