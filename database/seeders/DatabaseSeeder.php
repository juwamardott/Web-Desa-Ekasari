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
        
        // Prepare arrays for relational fields
        $banjarIds = range(1, 10);
        $pendidikanIds = range(1, 7);
        $kawinIds = range(1, 4); // 1: Kawin, 2: Belum Kawin, 3: Cerai Hidup, 4: Cerai Mati
        $hubunganKeluargaIds = range(1, 5); // 1: Kepala Keluarga, 2: Istri, 3: Anak, 4: Menantu, 5: Lainnya
        $jenisKelaminIds = [1, 2]; // 1: Laki-laki, 2: Perempuan
        $agamaIds = range(1, 6); // 1: Hindu, 2: Islam, 3: Kristen, 4: Katolik, 5: Buddha, 6: Konghucu
        $statusPendudukIds = range(1, 3); // 1: Tetap, 2: Tidak Tetap, 3: Pindah
        $pendidikanSedangIds = range(1, 7);
        $pekerjaanIds = range(1, 15);
        $wargaNegaraIds = [1, 2]; // 1: WNI, 2: WNA
        $statusDasarIds = range(1, 4); // 1: Hidup, 2: Mati, 3: Pindah, 4: Hilang
        $golonganDarah = ['A', 'B', 'AB', 'O', '-'];
        
        // Prepare 1000 KK numbers
        $noKKs = [];
        for ($i = 0; $i < 1000; $i++) {
            $noKKs[] = '51030' . $faker->unique()->numerify('##########');
        }
        
        $penduduks = [];
        
        // Generate 5000 penduduk records
        for ($i = 0; $i < 5000; $i++) {
            $jenisKelaminId = $faker->randomElement($jenisKelaminIds);
            $tglLahir = $faker->dateTimeBetween('-80 years', '-1 day')->format('Y-m-d');
            $umur = Carbon::parse($tglLahir)->age;
            $kawinId = $umur < 15 ? 2 : $faker->randomElement($kawinIds);
            
            // Determine realistic relationship based on age and marital status
            $hubunganKeluargaId = 5; // Default to 'Lainnya'
            if ($umur >= 18 && $kawinId != 2) {
                $hubunganKeluargaId = $jenisKelaminId == 1 ? 1 : 2; // Kepala Keluarga or Istri
            } elseif ($umur < 18) {
                $hubunganKeluargaId = 3; // Anak
            } elseif ($umur >= 18 && $umur <= 40) {
                $hubunganKeluargaId = $faker->randomElement([3, 4]); // Anak or Menantu
            }
            
            // Marriage-related fields
            $aktaNikah = null;
            $tglPerkawinan = null;
            $aktaPerceraian = null;
            $tglPerceraian = null;
            
            if ($kawinId == 1 && $umur >= 17) { // Married
                // Calculate max years to subtract for marriage date (can't be married before age 17)
                $maxYearsAgo = max(1, $umur - 17);
                $tglPerkawinan = $faker->dateTimeBetween("-{$maxYearsAgo} years", 'now')->format('Y-m-d');
                $aktaNikah = $faker->numerify('###/NKH/') . Carbon::parse($tglPerkawinan)->format('Y');
            } elseif ($kawinId == 3 && $umur >= 18) { // Divorced
                // Calculate max years to subtract for marriage date (can't be married before age 17)
                $maxYearsAgo = max(1, $umur - 17);
                $tglPerkawinan = $faker->dateTimeBetween("-{$maxYearsAgo} years", '-1 year')->format('Y-m-d');
                $tglPerceraian = $faker->dateTimeBetween($tglPerkawinan, 'now')->format('Y-m-d');
                $aktaNikah = $faker->numerify('###/NKH/') . Carbon::parse($tglPerkawinan)->format('Y');
                $aktaPerceraian = $faker->numerify('###/PRC/') . Carbon::parse($tglPerceraian)->format('Y');
            }
            
            // Choose education level based on age
            $pendidikanId = 1; // Default to lowest
            if ($umur >= 7 && $umur < 13) {
                $pendidikanId = $faker->randomElement([1, 2]); // SD or less
                $pendidikanSedangId = 2; // SD
            } elseif ($umur >= 13 && $umur < 16) {
                $pendidikanId = $faker->randomElement([1, 2, 3]); // Up to SMP
                $pendidikanSedangId = 3; // SMP
            } elseif ($umur >= 16 && $umur < 19) {
                $pendidikanId = $faker->randomElement([1, 2, 3, 4]); // Up to SMA
                $pendidikanSedangId = 4; // SMA
            } elseif ($umur >= 19 && $umur < 23) {
                $pendidikanId = $faker->randomElement([1, 2, 3, 4, 5]); // Up to S1
                $pendidikanSedangId = 5; // S1
            } elseif ($umur >= 23) {
                $pendidikanId = $faker->randomElement($pendidikanIds); // Any education level
                $pendidikanSedangId = $faker->randomElement([1, 5, 6, 7]); // Not in school or higher education
            } else {
                $pendidikanSedangId = 1; // Not in school yet
            }
            
            // Generate Balinese names based on gender
            $firstName = '';
            $middleName = '';
            $lastName = '';
            
            if ($jenisKelaminId == 1) { // Male
                $firstName = $faker->randomElement(['I ', '']) . $faker->randomElement(['Wayan', 'Made', 'Nyoman', 'Ketut', 'Kadek', 'Komang', 'Gede', 'Putu']);
                $middleName = $faker->randomElement(['', ' ' . $faker->randomElement(['Agus', 'Putra', 'Adi', 'Darma', 'Dwi', 'Eka', 'Budi', 'Yoga', 'Aditya', 'Surya'])]);
                $lastName = $faker->randomElement(['', ' ' . $faker->randomElement(['Suardika', 'Wirawan', 'Sudarsana', 'Artha', 'Dharma', 'Wijaya', 'Purnama', 'Sudiarta', 'Yasa', 'Darmawan'])]);
            } else { // Female
                $firstName = $faker->randomElement(['Ni ', '']) . $faker->randomElement(['Wayan', 'Made', 'Nyoman', 'Ketut', 'Kadek', 'Komang', 'Luh', 'Putu']);
                $middleName = $faker->randomElement(['', ' ' . $faker->randomElement(['Ayu', 'Dewi', 'Sri', 'Putri', 'Eka', 'Ratih', 'Diah', 'Ari', 'Suartini', 'Lestari'])]);
                $lastName = $faker->randomElement(['', ' ' . $faker->randomElement(['Suandewi', 'Sekarini', 'Maharani', 'Sari', 'Yanti', 'Puspita', 'Saraswati', 'Putri', 'Astuti', 'Widiastuti'])]);
            }
            
            $nama = trim($firstName . $middleName . $lastName);
            
            // For parents, generate similar names with appropriate prefix
            $namaAyah = 'I ' . $faker->randomElement(['Wayan', 'Made', 'Nyoman', 'Ketut']) . ' ' . $faker->randomElement(['Suardika', 'Wirawan', 'Sudarsana', 'Artha', 'Dharma', 'Wijaya', 'Purnama', 'Sudiarta', 'Yasa', 'Darmawan']);
            $namaIbu = 'Ni ' . $faker->randomElement(['Wayan', 'Made', 'Nyoman', 'Ketut']) . ' ' . $faker->randomElement(['Suandewi', 'Sekarini', 'Maharani', 'Sari', 'Yanti', 'Puspita', 'Saraswati', 'Putri', 'Astuti', 'Widiastuti']);
            
            // Select job based on age
            $pekerjaanId = 1; // Default to not working
            if ($umur >= 15) {
                $pekerjaanId = $faker->randomElement($pekerjaanIds);
            }
            
            $baliRegencies = ['Denpasar', 'Badung', 'Gianyar', 'Tabanan', 'Klungkung', 'Bangli', 'Karangasem', 'Buleleng', 'Jembrana'];
            
            // Generate random NIK, ensuring it doesn't match others
            $nik = '5103' . $faker->unique()->numerify('##########');
            
            $penduduks[] = [
                'image' => null,
                'no_kk' => $faker->randomElement($noKKs),
                'nik' => $nik,
                'nama' => $nama,
                'nama_ayah' => $namaAyah,
                'nama_ibu' => $namaIbu,
                'nik_ayah' => '5103' . $faker->numerify('##########'),
                'nik_ibu' => '5103' . $faker->numerify('##########'),
                'alamat' => $faker->randomElement(['Jalan', 'Jl.', 'Gang', 'Gg.']) . ' ' . $faker->streetName() . ' No. ' . $faker->buildingNumber(),
                'banjar_id' => $faker->randomElement($banjarIds),
                'pendidikan_id' => $pendidikanId,
                'umur' => $umur,
                'kawin_id' => $kawinId,
                'hubungan_keluarga_id' => $hubunganKeluargaId,
                'jenis_kelamin_id' => $jenisKelaminId,
                'agama_id' => $faker->randomElement($agamaIds),
                'status_penduduk_id' => $faker->randomElement($statusPendudukIds),
                'akta_kelahiran' => $faker->numerify('##########'),
                'tempat_lahir' => $faker->randomElement($baliRegencies),
                'tgl_lahir' => $tglLahir,
                'pendidikan_sedang_id' => $pendidikanSedangId,
                'pekerjaan_id' => $pekerjaanId,
                'warga_negara_id' => $faker->randomElement($wargaNegaraIds, [1 => 95, 2 => 5]),
                'negara_asal' => $faker->randomElement([null, 'Malaysia', 'Singapura', 'Australia', 'Amerika Serikat', 'Jepang', 'China', 'Belanda', 'Inggris', 'Jerman']),
                'status_dasar_id' => $faker->randomElement($statusDasarIds, [1 => 95, 2 => 2, 3 => 2, 4 => 1]),
                'anak_ke' => $faker->numberBetween(1, 5),
                'no_telepon' => '08' . $faker->numerify('##########'),
                'email' => strtolower(str_replace(' ', '.', $nama)) . '@' . $faker->randomElement(['example.com', 'gmail.com', 'yahoo.com', 'hotmail.com']),
                'akta_nikah' => $aktaNikah,
                'akta_perceraian' => $aktaPerceraian,
                'tgl_perkawinan' => $tglPerkawinan,
                'tgl_perceraian' => $tglPerceraian,
                'golongan_darah' => $faker->randomElement($golonganDarah),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            
            // Insert in batches of 500 to avoid memory issues
            if (($i + 1) % 500 == 0 || $i == 4999) {
                DB::table('penduduks')->insert($penduduks);
                $penduduks = [];
            }
        }
        
    }

    
    
}