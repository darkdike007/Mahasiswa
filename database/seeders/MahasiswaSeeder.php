<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        mahasiswa::factory()->count(20)->create();
    }
}
