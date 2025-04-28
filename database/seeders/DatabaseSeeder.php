<?php

namespace Database\Seeders;

use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Agama;
use App\Models\AuthorSurat;
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
        AuthorSurat::create([
            'author' => 'Kepala Desa'
        ]);
        AuthorSurat::create([
            'author' => 'Sekretaris Desa'
        ]);
        
        JenisKelamin::create([
            'jenis_kelamin'=> 'LAKI-LAKI',
        ]);
        JenisKelamin::create([
            'jenis_kelamin'=> 'PEREMPUAN',
        ]);

        StatusPenduduk::create([
            'status_penduduk' => 'TETAP',
        ]);
        StatusPenduduk::create([
            'status_penduduk' => 'TIDAK TETAP',
        ]);

        StatusDasar::create(['status_dasar' => 'HIDUP']);
        StatusDasar::create(['status_dasar' => 'MATI']);
        StatusDasar::create(['status_dasar' => 'PINDAH']);
        StatusDasar::create(['status_dasar' => 'HILANG']);
        StatusDasar::create(['status_dasar' => 'PERGI']);
        
        Agama::create(['agama' => 'ISLAM']);
        Agama::create(['agama' => 'KRISTEN']);
        Agama::create(['agama' => 'KATOLIK']);
        Agama::create(['agama' => 'HINDU']);
        Agama::create(['agama' => 'BUDDHA']);
        Agama::create(['agama' => 'KONGHUCU']);

        Kawin::create(['status' =>'KAWIN TERCATAT']);
        Kawin::create(['status' =>'KAWIN BELUM TERCATAT']);
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
           'banjar_id' => 1,
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

        $faker = Faker::create('id_ID');

        $banjarIds = range(1, 10);
        $pendidikanIds = range(1, 7);
        $kawinIds = range(1, 4);
        $hubunganKeluargaIds = range(1, 5);
        $jenisKelaminIds = [1, 2];
        $agamaIds = range(1, 6);
        $statusPendudukIds = range(1, 3);
        $pendidikanSedangIds = range(1, 7);
        $pekerjaanIds = range(1, 15);
        $wargaNegaraIds = [1, 2];
        $statusDasarIds = range(1, 4);
        $golonganDarah = ['A', 'B', 'AB', 'O', '-'];

        $noKKs = [];
        for ($i = 0; $i < 100; $i++) {
            $noKKs[] = '51030' . $faker->unique()->numerify('##########');
        }

        for ($i = 0; $i < 100; $i++) {

            $jenisKelaminId = $faker->randomElement($jenisKelaminIds);
            $tglLahir = $faker->dateTimeBetween('-80 years', '-1 day')->format('Y-m-d');
            $umur = Carbon::parse($tglLahir)->age;
            $kawinId = $umur < 15 ? 2 : $faker->randomElement($kawinIds);

            $hubunganKeluargaId = 5;
            if ($umur >= 18 && $kawinId != 2) {
                $hubunganKeluargaId = $jenisKelaminId == 1 ? 1 : 2;
            } elseif ($umur < 18) {
                $hubunganKeluargaId = 3;
            } elseif ($umur >= 18 && $umur <= 40) {
                $hubunganKeluargaId = $faker->randomElement([3, 4]);
            }

            $aktaNikah = null;
            $tglPerkawinan = null;
            $aktaPerceraian = null;
            $tglPerceraian = null;

            if ($kawinId == 1 && $umur >= 17) {
                $maxYearsAgo = max(1, $umur - 17);
                $tglPerkawinan = $faker->dateTimeBetween("-{$maxYearsAgo} years", 'now')->format('Y-m-d');
                $aktaNikah = $faker->numerify('###/NKH/') . Carbon::parse($tglPerkawinan)->format('Y');
            } elseif ($kawinId == 3 && $umur >= 18) {
                $maxYearsAgo = max(1, $umur - 17);
                $tglPerkawinan = $faker->dateTimeBetween("-{$maxYearsAgo} years", '-1 year')->format('Y-m-d');
                $tglPerceraian = $faker->dateTimeBetween($tglPerkawinan, 'now')->format('Y-m-d');
                $aktaNikah = $faker->numerify('###/NKH/') . Carbon::parse($tglPerkawinan)->format('Y');
                $aktaPerceraian = $faker->numerify('###/PRC/') . Carbon::parse($tglPerceraian)->format('Y');
            }

            $pendidikanId = 1;
            $pendidikanSedangId = 1;
            if ($umur >= 7 && $umur < 13) {
                $pendidikanId = $faker->randomElement([1, 2]);
                $pendidikanSedangId = 2;
            } elseif ($umur >= 13 && $umur < 16) {
                $pendidikanId = $faker->randomElement([1, 2, 3]);
                $pendidikanSedangId = 3;
            } elseif ($umur >= 16 && $umur < 19) {
                $pendidikanId = $faker->randomElement([1, 2, 3, 4]);
                $pendidikanSedangId = 4;
            } elseif ($umur >= 19 && $umur < 23) {
                $pendidikanId = $faker->randomElement([1, 2, 3, 4, 5]);
                $pendidikanSedangId = 5;
            } elseif ($umur >= 23) {
                $pendidikanId = $faker->randomElement($pendidikanIds);
                $pendidikanSedangId = $faker->randomElement([1, 5, 6, 7]);
            }

            if ($jenisKelaminId == 1) {
                $firstName = $faker->randomElement(['I ', '']) . $faker->randomElement(['Wayan', 'Made', 'Nyoman', 'Ketut', 'Kadek', 'Komang', 'Gede', 'Putu']);
                $middleName = $faker->randomElement(['', ' ' . $faker->randomElement(['Agus', 'Putra', 'Adi', 'Darma', 'Dwi', 'Eka', 'Budi', 'Yoga', 'Aditya', 'Surya'])]);
                $lastName = $faker->randomElement(['', ' ' . $faker->randomElement(['Suardika', 'Wirawan', 'Sudarsana', 'Artha', 'Dharma', 'Wijaya', 'Purnama', 'Sudiarta', 'Yasa', 'Darmawan'])]);
            } else {
                $firstName = $faker->randomElement(['Ni ', '']) . $faker->randomElement(['Wayan', 'Made', 'Nyoman', 'Ketut', 'Kadek', 'Komang', 'Luh', 'Putu']);
                $middleName = $faker->randomElement(['', ' ' . $faker->randomElement(['Ayu', 'Dewi', 'Sri', 'Putri', 'Eka', 'Ratih', 'Diah', 'Ari', 'Suartini', 'Lestari'])]);
                $lastName = $faker->randomElement(['', ' ' . $faker->randomElement(['Suandewi', 'Sekarini', 'Maharani', 'Sari', 'Yanti', 'Puspita', 'Saraswati', 'Putri', 'Astuti', 'Widiastuti'])]);
            }

            $nama = trim($firstName . $middleName . $lastName);

            Penduduk::create([
                'image' => null,
                'no_kk' => $faker->randomElement($noKKs),
                'nik' => '5103' . $faker->unique()->numerify('##########'),
                'nama' => $nama,
                'nama_ayah' => 'I ' . $faker->randomElement(['Wayan', 'Made', 'Nyoman', 'Ketut']) . ' ' . $faker->lastName,
                'nama_ibu' => 'Ni ' . $faker->randomElement(['Wayan', 'Made', 'Nyoman', 'Ketut']) . ' ' . $faker->lastName,
                'nik_ayah' => '5103' . $faker->numerify('##########'),
                'nik_ibu' => '5103' . $faker->numerify('##########'),
                'alamat' => $faker->streetAddress,
                'banjar_id' => $faker->randomElement($banjarIds),
                'pendidikan_id' => $pendidikanId,
                'pendidikan_sedang_id' => $pendidikanSedangId,
                'umur' => $umur,
                'kawin_id' => $kawinId,
                'hubungan_keluarga_id' => $hubunganKeluargaId,
                'jenis_kelamin_id' => $jenisKelaminId,
                'agama_id' => $faker->randomElement($agamaIds),
                'status_penduduk_id' => $faker->randomElement($statusPendudukIds),
                'pekerjaan_id' => $umur >= 15 ? $faker->randomElement($pekerjaanIds) : 1,
                'warga_negara_id' => $faker->randomElement($wargaNegaraIds),
                'status_dasar_id' => $faker->randomElement($statusDasarIds),
                'golongan_darah' => $faker->randomElement($golonganDarah),
                'tempat_lahir' => $faker->city,
                'tgl_lahir' => $tglLahir,
                'akta_nikah' => $aktaNikah,
                'tgl_perkawinan' => $tglPerkawinan,
                'akta_perceraian' => $aktaPerceraian,
                'tgl_perceraian' => $tglPerceraian,
            ]);
        }
        
    }

    
    
}