<?php

namespace App\Exports;

use App\Models\Penduduk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PendudukExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $filters;

    public function __construct($filters)
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        $query = Penduduk::query();

        if (!empty($this->filters['search'])) {
            $query->where(function ($q) {
                $q->where('nama', 'like', '%' . $this->filters['search'] . '%')
                  ->orWhere('nik', 'like', '%' . $this->filters['search'] . '%');
            });
        }

        if (!empty($this->filters['status'])) {
            $query->where('status_penduduk', $this->filters['status']);
        }

        if (!empty($this->filters['jenis_kelamin'])) {
            $query->where('jenis_kelamin', $this->filters['jenis_kelamin']);
        }

        if (!empty($this->filters['banjar'])) {
            $query->where('banjar', $this->filters['banjar']);
        }

        if (!empty($this->filters['umur'])) {
            // Contoh filter umur
            $query->where('umur', $this->filters['umur']);
        }

        return $query->get();
    }


    public function headings(): array
    {
        return ['id','no_kk', 'nik', 'nama', 'nama_ayah', 'nama_ibu', 'nik_ayah', 'nik_ibu', 'alamat', 'banjar','pendidikan','umur', 'kawin', 'hubungan_keluarga','jenis_kelamin', 'agama', 'status_penduduk', 'akta_kelahiran', 'ttl', 'pendidikan_sedang_ditempuh', 'pekerjaan', 'warga_negara', 'dibuat', 'diupdate'];
    }
    



    
}