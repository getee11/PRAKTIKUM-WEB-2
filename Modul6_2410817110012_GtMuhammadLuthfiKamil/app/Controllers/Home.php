<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Home extends BaseController
{
    protected $mahasiswaModel;

    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Beranda',
            'profil' => $this->mahasiswaModel->getProfil()
        ];
        return view('beranda', $data);
    }

    public function profil()
    {
        $data = [
            'title' => 'Profil',
            'profil' => $this->mahasiswaModel->getProfil(),
            'pengalaman' => $this->mahasiswaModel->getPengalaman()
        ];
        return view('profil', $data);
    }

    public function detail($id)
    {
        $pengalaman = $this->mahasiswaModel->getPengalamanById($id);
        
        if (empty($pengalaman)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data pengalaman tidak ditemukan.');
        }

        $data = [
            'title' => 'Detail Pengalaman',
            'pengalaman' => $pengalaman
        ];
        
        return view('detail', $data);
    }
}
