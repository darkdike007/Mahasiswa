<?php

namespace App\Service;
use App\Models\mahasiswa;

class MahasiswaService
{
    /**
     * Fungsi menambahkan data mahasiswa ke dalam database
     */
    public function storeMhs(
        string $nim, 
        string $nama):mahasiswa
    {
        $mahasiswa_save = new mahasiswa();
        $mahasiswa_save->nim = $nim;
        $mahasiswa_save->nama = $nama;
        $mahasiswa_save->save();

        return $mahasiswa_save;
    }

    /**
     * Fungsi mengedit data mahasiswa yang ada di dalam database
     */
    public function updateMhs(
        int $id,
        string $nim, 
        string $nama):mahasiswa
    {
        $mahasiswa_edit = mahasiswa::find($id);
        $mahasiswa_edit->nim = $nim;
        $mahasiswa_edit->nama = $nama;
        $mahasiswa_edit->save();

        return $mahasiswa_edit;
    }
    
    /**
     * Fungsi menghapus data mahasiswa yang ada di database
     */
    public function destroyMhs(string $id)
    {
        $mahasiswa_edit = mahasiswa::find($id);
        $mahasiswa_edit->delete();
    }
}
