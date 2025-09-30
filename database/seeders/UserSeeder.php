<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ini buat Mentor
        $faker = Faker::create();

        User::create([
            'nama' => 'Dr. Rafiq Alamsyah',
            'kode_mentor' => '001',
            'specialty' => 'Mathematics',
            'email' => $faker->unique()->safeEmail,
            'nomor_hp' => $faker->numerify('########'),
            'jenis_kelamin' => 'pria',
            'role' => 'mentor',
            'password' => bcrypt('password'),
            'umur' => $faker->numberBetween(20,70),
            'description' => 'Dr. Rafiq adalah ahli dalam algoritma dan strukr data. Beliau mengajarkan mahasiswa cara mengoptimalkan proses komputasi dalam pengembangan perangkat lunak. Metode pengajarannya menggabungkan teori dan praktik unk pemahaman yang lebih mendalam.',
            'image_path' => 'storage/Rafiq.jpg',
        ]);

        User::create([
            'nama' => 'Prof. Marcus Henry',
            'specialty' => 'Mathematics',
            'kode_mentor' => '002',
            'email' => $faker->unique()->safeEmail,
            'nomor_hp' => $faker->numerify('########'),
            'jenis_kelamin' => 'pria',
            'role' => 'mentor',
            'password' => bcrypt('password'),
            'umur' => $faker->numberBetween(20,70),
            'description' => 'Prof. Marcus adalah pakar dalam statistika dan probabilitas. Beliau mengajarkan mahasiswa bagaimana menganalisis data besar dan aplikasinya dalam berbagai industri. Prof. Diana berfokus pada pendekatan analitis dalam pengolahan data.',
            'image_path' => 'storage/Diana.jpg',
        ]);

        User::create([
            'nama' => 'Dr. Andre Widjaya',
            'specialty' => 'Mathematics',
            'kode_mentor' => '003',
            'email' => $faker->unique()->safeEmail,
            'nomor_hp' => $faker->numerify('########'),
            'jenis_kelamin' => 'pria',
            'role' => 'mentor',
            'password' => bcrypt('password'),
            'umur' => $faker->numberBetween(20,70),
            'description' => 'Dr. Andre adalah seorang ahli dalam keamanan siber. Beliau mengajarkan mahasiswa cara melindungi sistem informasi dari ancaman dunia maya. Metode pengajaran beliau lebih mengutamakan simulasi serangan dan pertahanan siber.',
            'image_path' => 'storage/Andre.jpg',
        ]);

        User::create([
            'nama' => 'Dr. Sergio Ahmad',
            'specialty' => 'Mathematics',
            'kode_mentor' => '004',
            'email' => $faker->unique()->safeEmail,
            'nomor_hp' => $faker->numerify('########'),
            'jenis_kelamin' => 'pria',
            'role' => 'mentor',
            'password' => bcrypt('password'),
            'umur' => $faker->numberBetween(20,70),
            'description' => 'Dr. Sergio adalah pakar dalam matematika diskrit, terutama teori graf dan optimisasi. Beliau mengajarkan mahasiswa unk memecahkan masalah komputasi kompleks menggunakan teori graf. Dr. Sarah dikenal dengan pendekatan praktisnya dalam pengajaran.',
            'image_path' => 'storage/Sarah.jpg',
        ]);

        User::create([
            'nama' => 'Prof. Farhan Hadi',
            'specialty' => 'Mathematics',
            'kode_mentor' => '005',
            'email' => 'farhan.hadi@gmail.com',
            'nomor_hp' => $faker->numerify('########'),
            'jenis_kelamin' => 'pria',
            'role' => 'mentor',
            'password' => bcrypt('password'),
            'umur' => $faker->numberBetween(20,70),
            'description' => 'Prof. Farhan adalah seorang ahli komputasi kognitif. Beliau mengajarkan penerapan teori kognitif dalam pengembangan perangkat lunak yang lebih initif. Prof. Farhan sering menghubungkan pemrograman dengan cara otak manusia memproses informasi.',
            'image_path' => 'storage/Farhan.jpg',
        ]);

        User::create([
            'nama' => 'Dr. Liana Santoso',
            'specialty' => 'Mathematics',
            'kode_mentor' => '006',
            'email' => $faker->unique()->safeEmail,
            'nomor_hp' => $faker->numerify('########'),
            'jenis_kelamin' => 'wanita',
            'role' => 'mentor',
            'password' => bcrypt('password'),
            'umur' => $faker->numberBetween(20,70),
            'description' => 'Dr. Liana mengkhususkan diri dalam matematika numerik dan penyelesaian persamaan diferensial. Beliau mengajarkan mahasiswa metode komputasi unk menyelesaikan masalah yang kompleks. Dr. Liana fokus pada penerapan teori matematika dalam dunia nyata.',
            'image_path' => 'storage/Liana.jpg',
        ]);

        // Computer

        User::create([
            'nama' => 'Dr. Maya Prasetya',
            'specialty' => 'Computer',
            'kode_mentor' => '007',
            'email' => $faker->unique()->safeEmail,
            'nomor_hp' => $faker->numerify('########'),
            'jenis_kelamin' => 'wanita',
            'role' => 'mentor',
            'password' => bcrypt('password'),
            'umur' => $faker->numberBetween(20,70),
            'description' => 'Dr. Maya adalah seorang ahli dalam ilmu komputer dan kecerdasan buatan. Beliau mengajarkan mahasiswa cara membangun sistem cerdas menggunakan algoritma AI.',
            'image_path' => 'storage/Maya.jpg',
        ]);
        
        User::create([
            'nama' => 'Prof. Alia Setiawati',
            'specialty' => 'Computer',
            'kode_mentor' => '009',
            'email' => $faker->unique()->safeEmail,
            'nomor_hp' => $faker->numerify('########'),
            'jenis_kelamin' => 'wanita',
            'role' => 'mentor',
            'password' => bcrypt('password'),
            'umur' => $faker->numberBetween(20,70),
            'description' => 'Prof. Alia adalah seorang ahli dalam rekayasa perangkat lunak dan pemrograman komputer. Beliau mengajarkan mahasiswa cara merancang dan mengembangkan sistem perangkat lunak yang kompleks.',
            'image_path' => 'storage/Alia.jpg',
        ]);
        
        User::create([
            'nama' => 'Dr. Dimas Haryanto',
            'specialty' => 'Computer',
            'kode_mentor' => '010',
            'email' => $faker->unique()->safeEmail,
            'nomor_hp' => $faker->numerify('########'),
            'jenis_kelamin' => 'pria',
            'role' => 'mentor',
            'password' => bcrypt('password'),
            'umur' => $faker->numberBetween(20,70),
            'description' => 'Dr. Dimas mengkhususkan diri dalam jaringan komputer dan keamanan siber. Beliau mengajarkan mahasiswa cara melindungi sistem jaringan dari ancaman luar dan dalam.',
            'image_path' => 'storage/Dimas.jpg',
        ]);
        
        User::create([
            'nama' => 'Prof. Ivan Kusuma',
            'specialty' => 'Computer',
            'kode_mentor' => '011',
            'email' => $faker->unique()->safeEmail,
            'nomor_hp' => $faker->numerify('########'),
            'jenis_kelamin' => 'pria',
            'role' => 'mentor',
            'password' => bcrypt('password'),
            'umur' => $faker->numberBetween(20,70),
            'description' => 'Prof. Ivan adalah seorang ahli dalam analitik data dan statistik terapan di ilmu komputer.',
            'image_path' => 'storage/Ivan.jpg',
        ]);
        
        User::create([
            'nama' => 'Dr. Lila Hariani',
            'specialty' => 'Computer',
            'kode_mentor' => '012',
            'email' => $faker->unique()->safeEmail,
            'nomor_hp' => $faker->numerify('########'),
            'jenis_kelamin' => 'wanita',
            'role' => 'mentor',
            'password' => bcrypt('password'),
            'umur' => $faker->numberBetween(20,70),
            'description' => 'Dr. Lila mengkhususkan diri dalam metode statistik untuk analisis sosial dan riset pasar.',
            'image_path' => 'storage/Lila.jpg',
        ]);
    }
}
