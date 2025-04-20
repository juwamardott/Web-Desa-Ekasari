<?php

namespace Database\Seeders;

use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Agama;
use App\Models\Kawin;
use App\Models\Banjar;
use App\Models\Visitor;
use App\Models\Penduduk;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\StatusDasar;
use App\Models\WargaNegara;
use Faker\Factory as Faker;
use App\Models\JenisKelamin;
use App\Models\StatusPenduduk;
use Illuminate\Database\Seeder;
use App\Models\HubunganKeluarga;
use App\Models\PendidikanSedang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        JenisKelamin::create([
            'jenis_kelamin'=> 'Laki-laki',
        ]);
        JenisKelamin::create([
            'jenis_kelamin'=> 'Perempuan',
        ]);

        StatusPenduduk::create([
            'status_penduduk' => 'Tetap',
        ]);
        StatusPenduduk::create([
            'status_penduduk' => 'Tidak Tetap',
        ]);

        StatusDasar::create(['status_dasar' => 'Hidup']);
        StatusDasar::create(['status_dasar' => 'Mati']);
        StatusDasar::create(['status_dasar' => 'Pindah']);
        StatusDasar::create(['status_dasar' => 'Hilang']);
        StatusDasar::create(['status_dasar' => 'Pergi']);
        
        Agama::create(['agama' => 'Islam']);
        Agama::create(['agama' => 'Kristen']);
        Agama::create(['agama' => 'Katolik']);
        Agama::create(['agama' => 'Hindu']);
        Agama::create(['agama' => 'Buddha']);
        Agama::create(['agama' => 'Konghucu']);

        Kawin::create(['status' =>'KAWIN']);
        Kawin::create(['status' =>'BELUM KAWIN']);
        Kawin::create(['status' =>'CERAI HIDUP']);
        Kawin::create(['status' =>'CERAI MATI']);

        WargaNegara::create(['warga_negara' => 'WNI']);        
        WargaNegara::create(['warga_negara' => 'WNA']);        

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


        // Penduduk

        $penduduks = [
            [
                'image' => null,
                'no_kk' => 5103041234567890,
                'nik' => 5103042501890001,
                'nama' => 'Wayan Suardana',
                'nama_ayah' => 'Made Suardika',
                'nama_ibu' => 'Nyoman Suartini',
                'nik_ayah' => 5103041005650002,
                'nik_ibu' => 5103044511670003,
                'alamat' => 'Jalan Raya Kuta No. 123',
                'banjar_id' => 1,
                'pendidikan_id' => 4,
                'umur' => 34,
                'kawin_id' => 1,
                'hubungan_keluarga_id' => 1,
                'jenis_kelamin_id' => 1,
                'agama_id' => 1,
                'status_penduduk_id' => 2,
                'akta_kelahiran' => 6574839201,
                'tempat_lahir' => 'Denpasar',
                'tgl_lahir' => '1989-01-25',
                'pendidikan_sedang_id' => 2,
                'pekerjaan_id' => 5,
                'warga_negara_id' => 1,
                'negara_asal' => null,
                'status_dasar_id' => 1,
                'anak_ke' => 1,
                'no_telepon' => '081234567890',
                'email' => 'wayan.suardana@example.com',
                'akta_nikah' => '123/NKH/2015',
                'akta_perceraian' => null,
                'tgl_perkawinan' => '2015-06-12',
                'tgl_perceraian' => null,
                'golongan_darah' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image' => null,
                'no_kk' => 5103041234567890,
                'nik' => 5103045506900002,
                'nama' => 'Ni Kadek Sekarini',
                'nama_ayah' => 'Ketut Wirawan',
                'nama_ibu' => 'Komang Sulastri',
                'nik_ayah' => 5103041708670004,
                'nik_ibu' => 5103044209680005,
                'alamat' => 'Jalan Raya Kuta No. 123',
                'banjar_id' => 1,
                'pendidikan_id' => 5,
                'umur' => 33,
                'kawin_id' => 1,
                'hubungan_keluarga_id' => 2,
                'jenis_kelamin_id' => 2,
                'agama_id' => 1,
                'status_penduduk_id' => 1,
                'akta_kelahiran' => 9876543210,
                'tempat_lahir' => 'Badung',
                'tgl_lahir' => '1990-06-15',
                'pendidikan_sedang_id' => 4,
                'pekerjaan_id' => 7,
                'warga_negara_id' => 1,
                'negara_asal' => null,
                'status_dasar_id' => 1,
                'anak_ke' => 2,
                'no_telepon' => '087654321098',
                'email' => 'kadek.sekarini@example.com',
                'akta_nikah' => '123/NKH/2015',
                'akta_perceraian' => null,
                'tgl_perkawinan' => '2015-06-12',
                'tgl_perceraian' => null,
                'golongan_darah' => 'O',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image' => null,
                'no_kk' => 5103041234567890,
                'nik' => 5103042003880003,
                'nama' => 'I Made Darma',
                'nama_ayah' => 'I Nyoman Sudiasa',
                'nama_ibu' => 'Ni Wayan Suastini',
                'nik_ayah' => 5103041205600006,
                'nik_ibu' => 5103044107630007,
                'alamat' => 'Jalan Raya Legian No. 45',
                'banjar_id' => 2,
                'pendidikan_id' => 6,
                'umur' => 37,
                'kawin_id' => 1,
                'hubungan_keluarga_id' => 3,
                'jenis_kelamin_id' => 1,
                'agama_id' => 1,
                'status_penduduk_id' => 1,
                'akta_kelahiran' => 3456789012,
                'tempat_lahir' => 'Denpasar',
                'tgl_lahir' => '1988-03-20',
                'pendidikan_sedang_id' => 3,
                'pekerjaan_id' => 9,
                'warga_negara_id' => 1,
                'negara_asal' => null,
                'status_dasar_id' => 1,
                'anak_ke' => 1,
                'no_telepon' => '082345678901',
                'email' => 'made.darma@example.com',
                'akta_nikah' => '456/NKH/2012',
                'akta_perceraian' => null,
                'tgl_perkawinan' => '2012-09-25',
                'tgl_perceraian' => null,
                'golongan_darah' => 'B',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image' => null,
                'no_kk' => 5103041234567890,
                'nik' => 5103044508920004,
                'nama' => 'Ni Luh Putu Ayu',
                'nama_ayah' => 'I Ketut Sudiana',
                'nama_ibu' => 'Ni Made Suartini',
                'nik_ayah' => 5103041508670008,
                'nik_ibu' => 5103044411690009,
                'alamat' => 'Jalan Pantai Kuta No. 78',
                'banjar_id' => 3,
                'pendidikan_id' => 6,
                'umur' => 31,
                'kawin_id' => 1,
                'hubungan_keluarga_id' => 4,
                'jenis_kelamin_id' => 2,
                'agama_id' => 1,
                'status_penduduk_id' => 1,
                'akta_kelahiran' => 5678901234,
                'tempat_lahir' => 'Tabanan',
                'tgl_lahir' => '1992-08-05',
                'pendidikan_sedang_id' => 1,
                'pekerjaan_id' => 8,
                'warga_negara_id' => 1,
                'negara_asal' => null,
                'status_dasar_id' => 1,
                'anak_ke' => 2,
                'no_telepon' => '089876543210',
                'email' => 'putu.ayu@example.com',
                'akta_nikah' => null,
                'akta_perceraian' => null,
                'tgl_perkawinan' => null,
                'tgl_perceraian' => null,
                'golongan_darah' => 'AB',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image' => null,
                'no_kk' => 5103041234567890,
                'nik' => 5103041001960005,
                'nama' => 'I Nyoman Jaya',
                'nama_ayah' => 'I Wayan Sudira',
                'nama_ibu' => 'Ni Nyoman Suastini',
                'nik_ayah' => 5103041010700010,
                'nik_ibu' => 5103044203720011,
                'alamat' => 'Jalan Imam Bonjol No. 56',
                'banjar_id' => 4,
                'pendidikan_id' => 3,
                'umur' => 25,
                'kawin_id' => 1,
                'hubungan_keluarga_id' => 5,
                'jenis_kelamin_id' => 1,
                'agama_id' => 1,
                'status_penduduk_id' => 1,
                'akta_kelahiran' => 7890123456,
                'tempat_lahir' => 'Gianyar',
                'tgl_lahir' => '1996-01-10',
                'pendidikan_sedang_id' => 7,
                'pekerjaan_id' => 2,
                'warga_negara_id' => 1,
                'negara_asal' => null,
                'status_dasar_id' => 1,
                'anak_ke' => 1,
                'no_telepon' => '083456789012',
                'email' => 'nyoman.jaya@example.com',
                'akta_nikah' => null,
                'akta_perceraian' => null,
                'tgl_perkawinan' => null,
                'tgl_perceraian' => null,
                'golongan_darah' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('penduduks')->insert($penduduks);
        
    }

    
    
}