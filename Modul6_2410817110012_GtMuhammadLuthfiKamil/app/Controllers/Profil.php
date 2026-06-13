<?php

namespace App\Controllers;

use App\Models\ProfilModel;
use App\Models\PengalamanModel;

class Profil extends BaseController
{
    public function index(): string
    {
        $profilModel = new ProfilModel();
        $pengalamanModel = new PengalamanModel();
        
        $data['profil'] = $profilModel->getProfil();
        $data['pengalaman'] = $pengalamanModel->getAllPengalaman();
        
        return view('profil', $data);
    }
}
