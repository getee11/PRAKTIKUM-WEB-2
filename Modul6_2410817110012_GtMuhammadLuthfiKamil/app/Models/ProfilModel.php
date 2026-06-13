<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
    protected $table = 'profil';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'nim', 'gambar', 'asal_prodi', 'hobi', 'skills'];

    public function getProfil()
    {
        return [
            'nama' => 'Gt Muhammad Luthfi Kamil',
            'nim' => '2410817110012',
            'gambar' => 'https://via.placeholder.com/200x200.png?text=Foto+Profil',
            'asal_prodi' => 'Teknik Informatika',
            'hobi' => 'Coding, Membaca, Gaming',
            'skills' => ['HTML', 'CSS', 'JavaScript', 'PHP', 'CodeIgniter', 'MySQL']
        ];
    }
}
