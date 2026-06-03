<?php

namespace App\Controllers;

use App\Models\ProfilModel;

class Beranda extends BaseController
{
    public function index(): string
    {
        $profilModel = new ProfilModel();
        $data['profil'] = $profilModel->getProfil();
        return view('beranda', $data);
    }
}
