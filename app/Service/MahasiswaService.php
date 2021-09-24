<?php

namespace App\Service;
use App\Models\mahasiswa;

class MahasiswaService
{
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
    
    public function destroyMhs(string $id)
    {
        $mahasiswa_edit = mahasiswa::find($id);
        $mahasiswa_edit->delete();
    }
}
