<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Agama;
use App\Models\Banjar;
use App\Models\Visitor;
use App\Models\Penduduk;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\HubunganKeluarga;
use App\Models\PendidikanSedang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        
        Agama::create(['agama' => 'Islam']);
        Agama::create(['agama' => 'Kristen']);
        Agama::create(['agama' => 'Katolik']);
        Agama::create(['agama' => 'Hindu']);
        Agama::create(['agama' => 'Buddha']);
        Agama::create(['agama' => 'Konghucu']);
        

        Pekerjaan::create(['nama_pekerjaan' => 'BELUM/TIDAK BEKERJA']);  
        Pekerjaan::create(['nama_pekerjaan' => 'MENGURUS RUMAH TANGGA']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PELAJAR/MAHASISWA']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PENSIUNAN']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PEGAWAI NEGERI SIPIL(PNS)']);  
        Pekerjaan::create(['nama_pekerjaan' => 'TENTARA NASIONAL INDONESIA(TNI)']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PEGAWAI NEGERI SIPIL(PNS)']);  
        Pekerjaan::create(['nama_pekerjaan' => 'KEPOLISIAN RI(POLRI)']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PERDAGANGAN']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PETANI/PEKEBUN']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PERTERNAK']); 
        Pekerjaan::create(['nama_pekerjaan' => 'NELAYAN/PERIKANAN']);  
        Pekerjaan::create(['nama_pekerjaan' => 'INDUSTRI']);  
        Pekerjaan::create(['nama_pekerjaan' => 'KONSTRUKSI']);  
        Pekerjaan::create(['nama_pekerjaan' => 'TRANSPORTASI']);  
        Pekerjaan::create(['nama_pekerjaan' => 'KARYAWAN SWASTA']);  
        Pekerjaan::create(['nama_pekerjaan' => 'KARYAWAN BUMN']);  
        Pekerjaan::create(['nama_pekerjaan' => 'KARYAWAN BUMD']);  
        Pekerjaan::create(['nama_pekerjaan' => 'KARYAWAN HONORER']);  
        Pekerjaan::create(['nama_pekerjaan' => 'BURUH HARIAN LEPAS']);  
        Pekerjaan::create(['nama_pekerjaan' => 'BURUH TANI/PERKEBUNAN']);  
        Pekerjaan::create(['nama_pekerjaan' => 'BURUH NELAYAN/PERIKANAN']);  
        Pekerjaan::create(['nama_pekerjaan' => 'BURUH PETERNAKAN']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PEMBANTU RUMAH TANGGA']);  
        Pekerjaan::create(['nama_pekerjaan' => 'TUKANG CUKUR']);  
        Pekerjaan::create(['nama_pekerjaan' => 'TUKANG LISTRIK']);  
        Pekerjaan::create(['nama_pekerjaan' => 'TUKANG BATU']);  
        Pekerjaan::create(['nama_pekerjaan' => 'TUKANG KAYU']);  
        Pekerjaan::create(['nama_pekerjaan' => 'TUKANG SOL SEPATU']);  
        Pekerjaan::create(['nama_pekerjaan' => 'TUKANG LAS/PANDAI BESI']);  
        Pekerjaan::create(['nama_pekerjaan' => 'TUKANG JAHIT']);  
        Pekerjaan::create(['nama_pekerjaan' => 'TUKANG GIGI']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PENATA RIAS']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PENATA BUSANA']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PENATA RAMBUT']);  
        Pekerjaan::create(['nama_pekerjaan' => 'MEKANIK']);  
        Pekerjaan::create(['nama_pekerjaan' => 'SENIMAN']);  
        Pekerjaan::create(['nama_pekerjaan' => 'TABIB']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PARAJI']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PERANCANG BUSANA']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PENTERJEMAH']);  
        Pekerjaan::create(['nama_pekerjaan' => 'IMAM MASJID']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PENDETA']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PASTOR']);  
        Pekerjaan::create(['nama_pekerjaan' => 'WARTAWAN']);  
        Pekerjaan::create(['nama_pekerjaan' => 'USTADZ/MUBALIGH']);  
        Pekerjaan::create(['nama_pekerjaan' => 'JURU MASAK']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PROMOTOR ACARA']);  
        Pekerjaan::create(['nama_pekerjaan' => 'ANGGOTA DPR-RI']);  
        Pekerjaan::create(['nama_pekerjaan' => 'ANGGOTA DPD']);  
        Pekerjaan::create(['nama_pekerjaan' => 'ANGGOTA BPK']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PRESIDEN']);  
        Pekerjaan::create(['nama_pekerjaan' => 'WAKIL PRESIDEN']);  
        Pekerjaan::create(['nama_pekerjaan' => 'ANGGOTA MAHKAHMAH KONSTITUSI']);  
        Pekerjaan::create(['nama_pekerjaan' => 'ANGGOTA KABINET KEMENTERIAN']);  
        Pekerjaan::create(['nama_pekerjaan' => 'DUTA BESAR']);  
        Pekerjaan::create(['nama_pekerjaan' => 'GUBERNUR']);  
        Pekerjaan::create(['nama_pekerjaan' => 'WAKIL GUBERNUR']);  
        Pekerjaan::create(['nama_pekerjaan' => 'BUPATI']);  
        Pekerjaan::create(['nama_pekerjaan' => 'WAKIL BUPATI']);  
        Pekerjaan::create(['nama_pekerjaan' => 'WALIKOTA']);  
        Pekerjaan::create(['nama_pekerjaan' => 'WAKIL WALIKOTA']);  
        Pekerjaan::create(['nama_pekerjaan' => 'ANGGOTA DPRD PROVINSI']);  
        Pekerjaan::create(['nama_pekerjaan' => 'ANGGOTA DPRD KABUPATEN/KOTA']);  
        Pekerjaan::create(['nama_pekerjaan' => 'DOSEN']);  
        Pekerjaan::create(['nama_pekerjaan' => 'GURU']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PILOT']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PENGACARA']);  
        Pekerjaan::create(['nama_pekerjaan' => 'NOTARIS']);  
        Pekerjaan::create(['nama_pekerjaan' => 'ARSITEK']);  
        Pekerjaan::create(['nama_pekerjaan' => 'AKUNTAN']);  
        Pekerjaan::create(['nama_pekerjaan' => 'KONSULTAN']);  
        Pekerjaan::create(['nama_pekerjaan' => 'DOKTER']);  
        Pekerjaan::create(['nama_pekerjaan' => 'BIDAN']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PERAWAT']);  
        Pekerjaan::create(['nama_pekerjaan' => 'APOTEKER']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PSIKIATER/PSIKOLOG']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PENYIAR TELEVISI']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PENYIAR RADIO']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PELAUT']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PENELITI']);  
        Pekerjaan::create(['nama_pekerjaan' => 'SOPIR']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PIALANG']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PARANORMAL']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PEDAGANG']);  
        Pekerjaan::create(['nama_pekerjaan' => 'PERANGKAT DESA']);  
        Pekerjaan::create(['nama_pekerjaan' => 'KEPALA DESA']);  
        Pekerjaan::create(['nama_pekerjaan' => 'BIARAWATI']);  
        Pekerjaan::create(['nama_pekerjaan' => 'WIRASWASTA']);  
        Pekerjaan::create(['nama_pekerjaan' => 'LAINNYA']);


        Pendidikan::create(['pendidikan' => 'TIDAK/BELUM SEKOLAH']);
        Pendidikan::create(['pendidikan' => 'BELUM TAMAT SD/SEDERAJAT']);
        Pendidikan::create(['pendidikan' => 'TAMAT SD/SEDERAJAT']);
        Pendidikan::create(['pendidikan' => 'SLTP/SEDERAJAT']);
        Pendidikan::create(['pendidikan' => 'SLTA/SEDERAJAT']);
        Pendidikan::create(['pendidikan' => 'DIPLOMA I/II']);
        Pendidikan::create(['pendidikan' => 'AKADEMI/DIPLOMA III/S. MUDA']);
        Pendidikan::create(['pendidikan' => 'DIPLOMA IV/STRATA I']);
        Pendidikan::create(['pendidikan' => 'STRATA II']);
        Pendidikan::create(['pendidikan' => 'STRATA III']);


        PendidikanSedang::create(['pendidikan_sedang' => 'BELUM MASUK TK/KELOMPOK BERMAIN']);
        PendidikanSedang::create(['pendidikan_sedang' => 'SEDANG TK/KELOMPOK BERMAIN']);
        PendidikanSedang::create(['pendidikan_sedang' => 'TIDAK PERNAH SEKOLAH']);
        PendidikanSedang::create(['pendidikan_sedang' => 'SEDANG SD/SEDERAJAT']);
        PendidikanSedang::create(['pendidikan_sedang' => 'TIDAK TAMAT SD/SEDERAJAT']);
        PendidikanSedang::create(['pendidikan_sedang' => 'SEDANG SLTP/SEDERAJAP']);
        PendidikanSedang::create(['pendidikan_sedang' => 'TIDAK TAMAT SLTP/SEDERAJAT']);
        PendidikanSedang::create(['pendidikan_sedang' => 'SEDANG SLTA/SEDERAJAT']);
        PendidikanSedang::create(['pendidikan_sedang' => 'TIDAK TAMAT SLTA/SEDERAJAT']);
        PendidikanSedang::create(['pendidikan_sedang' => 'SEDANG D-1/SEDERAJAT']);
        PendidikanSedang::create(['pendidikan_sedang' => 'SEDANG D-2/SEDERAJAT']);
        PendidikanSedang::create(['pendidikan_sedang' => 'SEDANG D-3/SEDERAJAT']);
        PendidikanSedang::create(['pendidikan_sedang' => 'SEDANG S-1/SEDERAJAT']);
        PendidikanSedang::create(['pendidikan_sedang' => 'SEDANG S-2/SEDERAJAT']);
        PendidikanSedang::create(['pendidikan_sedang' => 'SEDANG S-3/SEDERAJAT']);
        PendidikanSedang::create(['pendidikan_sedang' => 'SEDANG SLB A/SEDERAJAT']);
        PendidikanSedang::create(['pendidikan_sedang' => 'SEDANG SLB B/SEDERAJAT']);
        PendidikanSedang::create(['pendidikan_sedang' => 'SEDANG SLB C/SEDERAJAT']);
        PendidikanSedang::create(['pendidikan_sedang' => 'TIDAK DAPAT MEMBACA DAN MENULIS HURUF LATIN']);
        PendidikanSedang::create(['pendidikan_sedang' => 'TIDAK SEDANG SEKOLAH']);



        HubunganKeluarga::create(['hubungan_keluarga' => 'KEPALA KELUARGA']);
        HubunganKeluarga::create(['hubungan_keluarga' => 'SUAMI']);
        HubunganKeluarga::create(['hubungan_keluarga' => 'ISTRI']);
        HubunganKeluarga::create(['hubungan_keluarga' => 'ANAK']);
        HubunganKeluarga::create(['hubungan_keluarga' => 'MENANTU']);
        HubunganKeluarga::create(['hubungan_keluarga' => 'CUCU']);
        HubunganKeluarga::create(['hubungan_keluarga' => 'ORANGTUA']);
        HubunganKeluarga::create(['hubungan_keluarga' => 'MERTUA']);
        HubunganKeluarga::create(['hubungan_keluarga' => 'FAMILI LAIN']);
        HubunganKeluarga::create(['hubungan_keluarga' => 'PEMBANTU']);
        HubunganKeluarga::create(['hubungan_keluarga' => 'LAINNYA']);



        Banjar::create(['banjar' => 'ANGGASARI']);
        Banjar::create(['banjar' => 'ADNYASARI']);
        Banjar::create(['banjar' => 'KARANGSARI']);
        Banjar::create(['banjar' => 'PALALINGGAH']);
        Banjar::create(['banjar' => 'PALAREJO']);
        Banjar::create(['banjar' => 'PALASARI']);
        Banjar::create(['banjar' => 'PARWATASARI']);
        Banjar::create(['banjar' => 'SADNYASARI']);
        Banjar::create(['banjar' => 'WANASARI']);
        Banjar::create(['banjar' => 'WARGASARI']);

        User::create([
           'username' => 'admin',
           'password' => Hash::make('123qwe'),
           'banjar' => 'Semua Banjar' 
        ]);
        $dates = [
            '2023-01-01', '2023-02-01', '2023-03-01',
            '2023-04-01', '2023-05-01', '2023-06-01', '2023-07-01'
        ];
        foreach ($dates as $date) {
            Visitor::create([
                'date' => $date,
                'count' => rand(20, 100),
                'ip_address' => '192.168.1.' . rand(1, 255),
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
            ]);
        }
        DB::table('jenis_surats')->insert([
            [
                'jenis_surat' => 'Surat Keterangan Domisili',
                'keterangan' => 'Orang tersebut diatas sepanjang pengetahuan saya memang benar berdomisili di Desa Ekasari',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'jenis_surat' => 'Surat Keterangan Usaha',
                'keterangan' => 'Orang tersebut diatas sepanjang pengetahuan saya memang benar memiliki usaha',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'jenis_surat' => 'Surat Keterangan Tidak Mampu',
                'keterangan' => 'Warga tersebut adalah benar penduduk Desa Ekasari dan menurut sepengetahuan kami benar yang bersangkutan adalah keluarga tidak mampu/miskin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'jenis_surat' => 'Surat Keterangan Penghasilan',
                'keterangan' => 'Orang tersebut diatas sepanjang pengetahuan saya memang benar berpenghasilan',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }

    
    
}