<?php

namespace Database\Seeders;

use App\Models\Characteristic;
use App\Models\CharacteristicValue;
use App\Models\Indicator;
use App\Models\Period;
use App\Models\PeriodValue;
use App\Models\Row;
use App\Models\RowValue;
use App\Models\Subject;
use App\Models\Unit;
use App\Models\User;
use App\Models\Visitor;
use App\Models\Year;
use Illuminate\Database\Seeder;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tahunan = Period::create([
            'name' => 'Tahunan',
        ]);
        PeriodValue::create([
            'name' => 'Tahun',
            'period_id' => $tahunan->id,
        ]);

        $bulanan = Period::create([
            'name' => 'Bulanan',
        ]);
        PeriodValue::create([
            'name' => 'Januari',
            'period_id' => $bulanan->id,
        ]);
        PeriodValue::create([
            'name' => 'Februari',
            'period_id' => $bulanan->id,
        ]);
        PeriodValue::create([
            'name' => 'Maret',
            'period_id' => $bulanan->id,
        ]);
        PeriodValue::create([
            'name' => 'April',
            'period_id' => $bulanan->id,
        ]);
        PeriodValue::create([
            'name' => 'Mei',
            'period_id' => $bulanan->id,
        ]);
        PeriodValue::create([
            'name' => 'Juni',
            'period_id' => $bulanan->id,
        ]);
        PeriodValue::create([
            'name' => 'Juli',
            'period_id' => $bulanan->id,
        ]);
        PeriodValue::create([
            'name' => 'Agustus',
            'period_id' => $bulanan->id,
        ]);
        PeriodValue::create([
            'name' => 'September',
            'period_id' => $bulanan->id,
        ]);
        PeriodValue::create([
            'name' => 'Oktober',
            'period_id' => $bulanan->id,
        ]);
        PeriodValue::create([
            'name' => 'November',
            'period_id' => $bulanan->id,
        ]);
        PeriodValue::create([
            'name' => 'Desember',
            'period_id' => $bulanan->id,
        ]);
        $triwulanan = Period::create([
            'name' => 'Triwulanan',
        ]);
        PeriodValue::create([
            'name' => 'Triwulan 1',
            'period_id' => $triwulanan->id,
        ]);
        PeriodValue::create([
            'name' => 'Triwulan 2',
            'period_id' => $triwulanan->id,
        ]);
        PeriodValue::create([
            'name' => 'Triwulan 3',
            'period_id' => $triwulanan->id,
        ]);
        PeriodValue::create([
            'name' => 'Triwulan 4',
            'period_id' => $triwulanan->id,
        ]);
        $semesteran = Period::create([
            'name' => 'Semesteran',
        ]);
        PeriodValue::create([
            'name' => 'Semester 1',
            'period_id' => $semesteran->id,
        ]);
        PeriodValue::create([
            'name' => 'Semester 2',
            'period_id' => $semesteran->id,
        ]);

        foreach (Period::all() as $p) {
            $p->update([
                'code' => sprintf("%03d", $p->id),
            ]);
        }

        foreach (PeriodValue::all() as $p) {
            $p->update([
                'code' => sprintf("%03d", $p->id),
            ]);
        }

        $jeniskelamin = Characteristic::create([
            'name' => 'Jenis Kelamin',
        ]);
        CharacteristicValue::create([
            'name' => 'Laki-Laki',
            'characteristic_id' => $jeniskelamin->id,
        ]);
        CharacteristicValue::create([
            'name' => 'Perempuan',
            'characteristic_id' => $jeniskelamin->id,
        ]);
        CharacteristicValue::create([
            'name' => 'Total',
            'characteristic_id' => $jeniskelamin->id,
        ]);

        $pendidikan = Characteristic::create([
            'name' => 'Pendidikan',
        ]);
        CharacteristicValue::create([
            'name' => '< SD Sederajat',
            'characteristic_id' => $pendidikan->id,
        ]);
        CharacteristicValue::create([
            'name' => 'SD Sederajat',
            'characteristic_id' => $pendidikan->id,
        ]);
        CharacteristicValue::create([
            'name' => 'SMP Sederajat',
            'characteristic_id' => $pendidikan->id,
        ]);
        CharacteristicValue::create([
            'name' => 'SMA Sederajat',
            'characteristic_id' => $pendidikan->id,
        ]);
        CharacteristicValue::create([
            'name' => 'Diploma Sederajat',
            'characteristic_id' => $pendidikan->id,
        ]);
        CharacteristicValue::create([
            'name' => 'S1/S2/S3 Sederajat',
            'characteristic_id' => $pendidikan->id,
        ]);

        foreach (Characteristic::all() as $p) {
            $p->update([
                'code' => sprintf("%03d", $p->id),
            ]);
        }

        foreach (CharacteristicValue::all() as $p) {
            $p->update([
                'code' => sprintf("%03d", $p->id),
            ]);
        }

        $area = Row::create([
            'name' => 'RT RW',
        ]);
        RowValue::create([
            'name' => 'Rt 01 Rw 01 Dusun Gilin 1',
            'row_id' => $area->id,
        ]);
        RowValue::create([
            'name' => 'Rt 02 Rw 01 Dusun Pasar',
            'row_id' => $area->id,
        ]);
        RowValue::create([
            'name' => 'Rt 03 Rw 01 Dusun Pasar',
            'row_id' => $area->id,
        ]);
        RowValue::create([
            'name' => 'Rt 04 Rw 01 Dusun Pasar',
            'row_id' => $area->id,
        ]);
        RowValue::create([
            'name' => 'Rt 05 Rw 02 Dusun Sekolaan',
            'row_id' => $area->id,
        ]);
        RowValue::create([
            'name' => 'Rt 06 Rw 02 Dusun Sekolaan',
            'row_id' => $area->id,
        ]);
        RowValue::create([
            'name' => 'Rt 07 Rw 02 Dusun Mudinan I',
            'row_id' => $area->id,
        ]);
        RowValue::create([
            'name' => 'Rt 08 Rw 02 Dusun Mudinan Ii',
            'row_id' => $area->id,
        ]);
        RowValue::create([
            'name' => 'Rt 09 Rw 02 Dusun Mudinan Ii',
            'row_id' => $area->id,
        ]);
        RowValue::create([
            'name' => 'Rt 10 Rw 01 Dusun Pesisir',
            'row_id' => $area->id,
        ]);
        RowValue::create([
            'name' => 'Rt 11 Rw 01 Dusun Pesisir',
            'row_id' => $area->id,
        ]);
        RowValue::create([
            'name' => 'Rt 12 Rw 03 Dusun Darungan I',
            'row_id' => $area->id,
        ]);
        RowValue::create([
            'name' => 'Rt 13 Rw 03 Dusun Darungan Ii',
            'row_id' => $area->id,
        ]);
        RowValue::create([
            'name' => 'Rt 14 Rw 03 Dusun Darungan Ii',
            'row_id' => $area->id,
        ]);
        RowValue::create([
            'name' => 'Rt 15 Rw 01 Dusun Gilin Ii',
            'row_id' => $area->id,
        ]);
        RowValue::create([
            'name' => 'Rt 16 Rw 03 Dusun Darungan I',
            'row_id' => $area->id,
        ]);
        RowValue::create([
            'name' => 'Rt 17 Rw 03 Dusun Darungan I',
            'row_id' => $area->id,
        ]);
        RowValue::create([
            'name' => 'Rt 18 Rw 01 Dusun Pesisir',
            'row_id' => $area->id,
        ]);

        $kelompok = Row::create([
            'name' => 'Kelompok Umur',
        ]);
        RowValue::create([
            'name' => '0 - 4',
            'row_id' => $kelompok->id,
        ]);
        RowValue::create([
            'name' => '5 - 9',
            'row_id' => $kelompok->id,
        ]);
        RowValue::create([
            'name' => '10 - 14',
            'row_id' => $kelompok->id,
        ]);
        RowValue::create([
            'name' => '15 - 19',
            'row_id' => $kelompok->id,
        ]);
        RowValue::create([
            'name' => '20 - 24',
            'row_id' => $kelompok->id,
        ]);
        RowValue::create([
            'name' => '25 - 29',
            'row_id' => $kelompok->id,
        ]);
        RowValue::create([
            'name' => '30 - 34',
            'row_id' => $kelompok->id,
        ]);
        RowValue::create([
            'name' => '35 - 39',
            'row_id' => $kelompok->id,
        ]);
        RowValue::create([
            'name' => '40 - 44',
            'row_id' => $kelompok->id,
        ]);
        RowValue::create([
            'name' => '45 - 49',
            'row_id' => $kelompok->id,
        ]);
        RowValue::create([
            'name' => '50 - 54',
            'row_id' => $kelompok->id,
        ]);
        RowValue::create([
            'name' => '55 - 59',
            'row_id' => $kelompok->id,
        ]);
        RowValue::create([
            'name' => '60 - 64',
            'row_id' => $kelompok->id,
        ]);
        RowValue::create([
            'name' => '65+',
            'row_id' => $kelompok->id,
        ]);
        RowValue::create([
            'name' => 'Total',
            'row_id' => $kelompok->id,
        ]);

        $kesehatan = Row::create([
            'name' => 'Sarana Kesehatan',
        ]);
        RowValue::create([
            'name' => 'Rumah Sakit',
            'row_id' => $kesehatan->id,
        ]);
        RowValue::create([
            'name' => 'Rumah Sakit Bersalin',
            'row_id' => $kesehatan->id,
        ]);
        RowValue::create([
            'name' => 'Puskesmas',
            'row_id' => $kesehatan->id,
        ]);
        RowValue::create([
            'name' => 'Puskesmas Pembantu',
            'row_id' => $kesehatan->id,
        ]);
        RowValue::create([
            'name' => 'Poliklinik/Balai Pengobatan',
            'row_id' => $kesehatan->id,
        ]);
        RowValue::create([
            'name' => 'Tempat Praktek Dokter',
            'row_id' => $kesehatan->id,
        ]);
        RowValue::create([
            'name' => 'Rumah Bersalin',
            'row_id' => $kesehatan->id,
        ]);
        RowValue::create([
            'name' => 'Tempat Praktek Bidan',
            'row_id' => $kesehatan->id,
        ]);
        RowValue::create([
            'name' => 'Poskesdes',
            'row_id' => $kesehatan->id,
        ]);
        RowValue::create([
            'name' => 'Polindes',
            'row_id' => $kesehatan->id,
        ]);
        RowValue::create([
            'name' => 'Apotek',
            'row_id' => $kesehatan->id,
        ]);
        RowValue::create([
            'name' => 'Toko Khusus Obat/Jamu',
            'row_id' => $kesehatan->id,
        ]);

        $spendidikan = Row::create([
            'name' => 'Sarana Pendidikan',
        ]);
        RowValue::create([
            'name' => 'PAUD',
            'row_id' => $spendidikan->id,
        ]);
        RowValue::create([
            'name' => 'TK',
            'row_id' => $spendidikan->id,
        ]);
        RowValue::create([
            'name' => 'RA/BA',
            'row_id' => $spendidikan->id,
        ]);
        RowValue::create([
            'name' => 'SD',
            'row_id' => $spendidikan->id,
        ]);
        RowValue::create([
            'name' => 'MI',
            'row_id' => $spendidikan->id,
        ]);
        RowValue::create([
            'name' => 'SMP',
            'row_id' => $spendidikan->id,
        ]);
        RowValue::create([
            'name' => 'MTs',
            'row_id' => $spendidikan->id,
        ]);
        RowValue::create([
            'name' => 'SMA',
            'row_id' => $spendidikan->id,
        ]);
        RowValue::create([
            'name' => 'MA',
            'row_id' => $spendidikan->id,
        ]);
        RowValue::create([
            'name' => 'SMK',
            'row_id' => $spendidikan->id,
        ]);
        RowValue::create([
            'name' => 'Akademi/Perguruan Tinggi',
            'row_id' => $spendidikan->id,
        ]);
        RowValue::create([
            'name' => 'SDLB',
            'row_id' => $spendidikan->id,
        ]);
        RowValue::create([
            'name' => 'SMPLB',
            'row_id' => $spendidikan->id,
        ]);
        RowValue::create([
            'name' => 'SMALB',
            'row_id' => $spendidikan->id,
        ]);
        RowValue::create([
            'name' => 'Pondok Pesantren',
            'row_id' => $spendidikan->id,
        ]);
        RowValue::create([
            'name' => 'Madrasah Diniyah',
            'row_id' => $spendidikan->id,
        ]);
        RowValue::create([
            'name' => 'Seminari/Sejenisnya',
            'row_id' => $spendidikan->id,
        ]);

        $koperasi = Row::create([
            'name' => 'Sarana Koperasi',
        ]);
        RowValue::create([
            'name' => 'KUD',
            'row_id' => $koperasi->id,
        ]);
        RowValue::create([
            'name' => 'Koperasi Industri Kecil dan Kerajinan Rakyat (Kopinkra)/Usaha mikro',
            'row_id' => $koperasi->id,
        ]);
        RowValue::create([
            'name' => 'Koperasi Simpan Pinjam (Kospin)',
            'row_id' => $koperasi->id,
        ]);
        RowValue::create([
            'name' => 'Koperasi Lainnya',
            'row_id' => $koperasi->id,
        ]);

        $desa = Row::create([
            'name' => 'Desa',
        ]);
        RowValue::create([
            'name' => 'Pajurangan',
            'row_id' => $desa->id,
        ]);

        foreach (Row::all() as $p) {
            $p->update([
                'code' => sprintf("%03d", $p->id),
            ]);
        }

        foreach (RowValue::all() as $p) {
            $p->update([
                'code' => sprintf("%03d", $p->id),
            ]);
        }

        Subject::create([
            'name' => 'Kependudukan',
            'icon' => '/assets/img/project/img/kependudukan.png',
        ]);
        Subject::create([
            'name' => 'Pendidikan',
            'icon' => '/assets/img/project/img/pendidikan.png',
        ]);
        Subject::create([
            'name' => 'Kesehatan',
            'icon' => '/assets/img/project/img/kesehatan.png',
        ]);
        Subject::create([
            'name' => 'Ekonomi',
            'icon' => '/assets/img/project/img/ekonomi.png',
        ]);
        Subject::create([
            'name' => 'Infrastruktur',
            'icon' => '/assets/img/project/img/infrastruktur.png',
        ]);
        Subject::create([
            'name' => 'Pemerintahan dan Desa',
            'icon' => '/assets/img/project/img/pemerintahan dan desa.png',
        ]);
        Subject::create([
            'name' => 'Pertanian',
            'icon' => '/assets/img/project/img/pertanian.png',
        ]);

        foreach (Subject::all() as $p) {
            $p->update([
                'code' => sprintf("%03d", $p->id),
            ]);
        }

        Unit::create(['name' => 'Jiwa']);

        foreach (Unit::all() as $p) {
            $p->update([
                'code' => sprintf("%03d", $p->id),
            ]);
        }

        Indicator::create([
            'name' => 'Jumlah Penduduk Menurut Jenis Kelamin di Desa Pajurangan',
            'row_id' => $desa->id,
            'characteristic_id' => $jeniskelamin->id,
            'period_id' => $tahunan->id,
            'subject_id' => 1,
            'unit_id' => 1,
            'source' => 'Data Desa',
        ]);
        Indicator::create([
            'name' => 'Jumlah Penduduk Menurut RT RW dan Jenis Kelamin di Desa Pajurangan',
            'row_id' => $area->id,
            'characteristic_id' => $jeniskelamin->id,
            'period_id' => $triwulanan->id,
            'subject_id' => 1,
            'unit_id' => 1,
            'source' => 'Data Desa',
        ]);
        Indicator::create([
            'name' => 'Jumlah Penduduk Menurut Kelompok Umur dan Jenis Kelamin di Desa Pajurangan',
            'row_id' => $kelompok->id,
            'characteristic_id' => $jeniskelamin->id,
            'period_id' => $tahunan->id,
            'subject_id' => 1,
            'unit_id' => 1,
            'source' => 'Data Desa',
        ]);
        Indicator::create([
            'name' => 'Jumlah Penduduk Menurut Pendidikan dan Jenis Kelamin di Desa Pajurangan',
            'row_id' => $pendidikan->id,
            'characteristic_id' => $jeniskelamin->id,
            'period_id' => $tahunan->id,
            'subject_id' => 1,
            'unit_id' => 1,
            'source' => 'Data Desa',
        ]);
        Indicator::create([
            'name' => 'Jumlah Sarana Kesehatan di Desa Pajurangan',
            'row_id' => $kesehatan->id,
            'characteristic_id' => null,
            'period_id' => $tahunan->id,
            'subject_id' => 3,
            'unit_id' => null,
            'source' => 'Survei Potensi Desa BPS Kabupaten Probolinggo',
        ]);
        Indicator::create([
            'name' => 'Jumlah Sarana Pendidikan di Desa Pajurangan',
            'row_id' => $spendidikan->id,
            'characteristic_id' => null,
            'period_id' => $tahunan->id,
            'subject_id' => 2,
            'unit_id' => null,
            'source' => 'Survei Potensi Desa BPS Kabupaten Probolinggo',
        ]);
        Indicator::create([
            'name' => 'Jumlah Koperasi di Desa Pajurangan',
            'row_id' => $koperasi->id,
            'characteristic_id' => null,
            'period_id' => $tahunan->id,
            'subject_id' => 4,
            'unit_id' => null,
            'source' => 'Survei Potensi Desa BPS Kabupaten Probolinggo',
        ]);

        foreach (Indicator::all() as $p) {
            $p->update([
                'code' => sprintf("%03d", $p->id),
            ]);
        }

        Year::create([
            'name' => '2020'
        ]);
        Year::create([
            'name' => '2021'
        ]);
        Year::create([
            'name' => '2022'
        ]);
        Year::create([
            'name' => '2023'
        ]);
        Year::create([
            'name' => '2024'
        ]);
        Year::create([
            'name' => '2025'
        ]);
        Year::create([
            'name' => '2026'
        ]);

        foreach (Year::all() as $p) {
            $p->update([
                'code' => sprintf("%03d", $p->id),
            ]);
        }

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456')
        ]);

        Visitor::create([
            'number' => 453
        ]);
    }
}
