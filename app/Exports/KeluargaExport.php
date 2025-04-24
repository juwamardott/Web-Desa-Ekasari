<?php

namespace App\Exports;

use App\Models\Penduduk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KeluargaExport implements FromCollection, WithHeadings, WithMapping
{
    protected $filters;

    public function __construct($filters)
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        // Membuat query awal untuk Penduduk
        $query = Penduduk::with([
            'banjar', 
            'pendidikan', 
            'kawin', 
            'hubungan_keluarga', 
            'jenis_kelamin', 
            'agama', 
            'status_penduduk', 
            'pendidikan_sedang', 
            'pekerjaan', 
            'warga_negara',
            'status_dasar'
        ])->where('hubungan_keluarga_id', 1);

        // Menambahkan filter pencarian berdasarkan input jika ada
        if (!empty($this->filters['search'])) {
            $query->where(function ($q) {
                $q->where('nama', 'like', '%' . $this->filters['search'] . '%')
                  ->orWhere('nik', 'like', '%' . $this->filters['search'] . '%');
            });
        }

        // Menambahkan filter status jika ada
        if (!empty($this->filters['status'])) {
            $query->where('status_penduduk_id', $this->filters['status']);
        }

        // Menambahkan filter jenis kelamin jika ada
        if (!empty($this->filters['jenis_kelamin'])) {
            $query->where('jenis_kelamin_id', $this->filters['jenis_kelamin']);
        }

        // Menambahkan filter banjar jika ada
        if (!empty($this->filters['banjar'])) {
            $query->where('banjar_id', $this->filters['banjar']);
        }

        // Menambahkan filter umur jika ada
        if (!empty($this->filters['umur'])) {
            $query->where('umur', $this->filters['umur']);
        }

        // Menambahkan filter status dasar jika ada
        if (!empty($this->filters['status_dasar'])) {
            $query->where('status_dasar_id', $this->filters['status_dasar']);
        }

        return $query->get();
    }

    public function map($penduduk): array
    {
        return [
            'id' => $penduduk->id,
            'no_kk' => $penduduk->no_kk,
            'nik' => $penduduk->nik,
            'nama' => $penduduk->nama,
            'nama_ayah' => $penduduk->nama_ayah,
            'nama_ibu' => $penduduk->nama_ibu,
            'nik_ayah' => $penduduk->nik_ayah,
            'nik_ibu' => $penduduk->nik_ibu,
            'alamat' => $penduduk->alamat,
            'banjar' => $penduduk->banjar ? $penduduk->banjar->banjar : '',
            'pendidikan' => $penduduk->pendidikan ? $penduduk->pendidikan->pendidikan : '',
            'umur' => $penduduk->umur,
            'status_kawin' => $penduduk->kawin ? $penduduk->kawin->status : '',
            'hubungan_keluarga' => $penduduk->hubungan_keluarga ? $penduduk->hubungan_keluarga->hubungan_keluarga : '',
            'jenis_kelamin' => $penduduk->jenis_kelamin ? $penduduk->jenis_kelamin->jenis_kelamin : '',
            'agama' => $penduduk->agama ? $penduduk->agama->agama : '',
            'status_penduduk' => $penduduk->status_penduduk ? $penduduk->status_penduduk->status_penduduk : '',
            'akta_kelahiran' => $penduduk->akta_kelahiran,
            'tempat_lahir' => $penduduk->tempat_lahir,
            'tgl_lahir' => $penduduk->tgl_lahir,
            'pendidikan_sedang' => $penduduk->pendidikan_sedang ? $penduduk->pendidikan_sedang->pendidikan_sedang : '',
            'pekerjaan' => $penduduk->pekerjaan ? $penduduk->pekerjaan->nama_pekerjaan : '',
            'warga_negara' => $penduduk->warga_negara ? $penduduk->warga_negara->warga_negara : '',
            'negara_asal' => $penduduk->negara_asal,
            'status_dasar' => $penduduk->status_dasar ? $penduduk->status_dasar->status_dasar : '',
            'anak_ke' => $penduduk->anak_ke,
            'no_telepon' => $penduduk->no_telepon,
            'email' => $penduduk->email,
            'akta_nikah' => $penduduk->akta_nikah,
            'akta_perceraian' => $penduduk->akta_perceraian,
            'tgl_perkawinan' => $penduduk->tgl_perkawinan,
            'tgl_perceraian' => $penduduk->tgl_perceraian,
            'golongan_darah' => $penduduk->golongan_darah,
            'dibuat' => $penduduk->created_at,
            'diupdate' => $penduduk->updated_at,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'No KK',
            'NIK',
            'Nama',
            'Nama Ayah',
            'Nama Ibu',
            'NIK Ayah',
            'NIK Ibu',
            'Alamat',
            'Banjar',
            'Pendidikan',
            'Umur',
            'Status Kawin',
            'Hubungan Keluarga',
            'Jenis Kelamin',
            'Agama',
            'Status Penduduk',
            'Akta Kelahiran',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Pendidikan Sedang',
            'Pekerjaan',
            'Warga Negara',
            'Negara Asal',
            'Status Dasar',
            'Anak Ke',
            'No Telepon',
            'Email',
            'Akta Nikah',
            'Akta Perceraian',
            'Tanggal Perkawinan',
            'Tanggal Perceraian',
            'Golongan Darah',
            'Dibuat',
            'Diupdate'
        ];
    }
}