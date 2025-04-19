<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Penduduk;
use App\Models\Visitor;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $banjars = ["Anggasari", "Wanasari", "Sadnyasari", "Palerejo", "Puniasari", "Danasari", "Palalinggah"];
        
        for ($i = 1; $i <= 10; $i++) {
            DB::table('users')->insert([
                'username' => 'user' . $i,
                'password' => Hash::make('123qwe'), // Hashing password untuk keamanan
                'banjar' => $banjars[array_rand($banjars)], // Pilih banjar secara acak
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        User::create([
           'username' => 'admin',
           'password' => Hash::make('123qwe'),
           'banjar' => 'Semua Banjar' 
        ]);

        

        
        // Inisialisasi Faker
        $faker = Faker::create('id_ID');

        // Daftar tempat lahir
        $placesOfBirth = [
            'Denpasar', 'Badung', 'Kuta', 'Ubud', 'Ekasari', 'Singaraja', 'Gianyar', 'Klungkung', 'Karangasem'
        ];

        // Jumlah total penduduk yang ingin dibuat
        $totalData = 500;

        // Variabel penanda untuk No KK dan NIK
        $nikBase = 3201000000000000; // Format dasar NIK 16 digit
        $kkBase = 3201000000; // Format dasar KK 10 digit

        for ($i = 0; $i < $totalData; $i++) {
            // Setiap kelipatan 5 orang memiliki No KK yang sama
            if ($i % 5 == 0) {
                $noKK = $kkBase + $i; // Nomor KK unik (10 digit)
            }

            // NIK unik untuk setiap individu
            $nik = $nikBase + $i;

            // Tentukan apakah ini Kepala Keluarga
            $isHeadOfFamily = ($i % 5 == 0);

            // Generate NIK Ayah dan Ibu (unik)
            $nikAyah = $nikBase + $i + 1000;
            $nikIbu = $nikBase + $i + 2000;

            Penduduk::create([
                'image'=> '', 
                'no_kk' => $noKK, // 10 digit
                'nik' => $nik, // 16 digit
                'nama' => $faker->name,
                'nama_ayah' => $faker->firstName,
                'nama_ibu' => $faker->firstName,
                'nik_ayah' => $nikAyah, // NIK Ayah unik
                'nik_ibu' => $nikIbu, // NIK Ibu unik
                'alamat' => $faker->address,
                'banjar' => $faker->randomElement(['Anggasari', 'Sadnyasari', 'Wanasari', 'Palerejo', 'Danasari', 'Puniasari', 'Palalinggah']),
                'pendidikan' => $faker->randomElement(['SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3']),
                'umur' => $faker->numberBetween(18, 65),
                'pekerjaan' => $faker->jobTitle,
                'kawin' => $faker->randomElement(['Kawin', 'Belum Kawin']),
                'hubungan_keluarga' => $isHeadOfFamily ? 'Kepala Keluarga' : $faker->randomElement(['Istri', 'Anak', 'Saudara']),
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'agama' => $faker->randomElement(['Islam', 'Kristen', 'Hindu', 'Buddha', 'Katholik']),
                'status_penduduk' => $faker->randomElement(['Aktif', 'Tidak Aktif']),
                'akta_kelahiran' => $nik + 5000, // Akta Kelahiran unik
                'tempat_lahir' => $faker->randomElement($placesOfBirth),
                'tgl_lahir' => $faker->date('Y-m-d'),
                'pendidikan_sedang_ditempuh' => $faker->randomElement(['SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3']),
                'warga_negara' => 'Indonesia',
                'status_dasar' => $faker->randomElement(['Hidup', 'Mati', 'Pindah', 'Hilang', 'Pergi'])
            ]);
        }

        // Menambahkan data banjar ke tabel 'banjars'
        $banjars = ['Anggasari', 'Sadnyasari', 'Wanasari', 'Palerejo', 'Danasari', 'Puniasari', 'Palalinggah'];

        foreach ($banjars as $banjar) {
            DB::table('banjars')->insert([
                'banjar' => $banjar,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

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

    // Fungsi untuk menghasilkan nomor dengan panjang 16 digit
    private function generateLongNumber($startValue)
    {
        return str_pad($startValue, 16, '0', STR_PAD_LEFT); // Nomor unik untuk setiap individu
    }

    // Fungsi untuk menghasilkan TTL dalam format "Ekasari, tanggal lahir"
    private function generateTTL($faker, $placesOfBirth)
    {
        // Pilih tempat lahir secara acak dari daftar
        $place = $faker->randomElement($placesOfBirth);

        // Generate tanggal lahir secara acak
        $birthDate = $faker->date('Y-m-d'); // Menghasilkan tanggal lahir acak

        // Gabungkan tempat dan tanggal lahir
        return "{$place}, {$birthDate}";
    }



    
    
}