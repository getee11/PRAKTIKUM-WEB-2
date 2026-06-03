<?php

namespace App\Controllers;

use App\Models\PengalamanModel;

class Detail extends BaseController
{
    public function index($id): string
    {
        $pengalamanModel = new PengalamanModel();
        $data['pengalaman'] = $pengalamanModel->getPengalamanById($id);
        
        if ($data['pengalaman'] === null) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pengalaman tidak ditemukan');
        }
        
        return view('detail', $data);
    }
}
