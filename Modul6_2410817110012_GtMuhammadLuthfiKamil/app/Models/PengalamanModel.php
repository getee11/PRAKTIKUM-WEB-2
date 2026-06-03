<?php

namespace App\Models;

use CodeIgniter\Model;

class PengalamanModel extends Model
{
    protected $table = 'pengalaman';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'judul', 'deskripsi', 'waktu', 'dokumentasi', 'kesan'];

    public function getAllPengalaman()
    {
        return [
            [
                'id' => 1,
                'judul' => 'Seminar Nasional Teknologi',
                'deskripsi' => 'Mengikuti seminar nasional tentang perkembangan teknologi terbaru di bidang informatika. Seminar ini membahas tentang AI, Machine Learning, dan Big Data.',
                'waktu' => 'September 2024',
                'dokumentasi' => 'https://via.placeholder.com/600x400.png?text=Dokumentasi+Seminar',
                'kesan' => 'Pengalaman yang sangat berharga untuk menambah wawasan tentang teknologi masa depan.'
            ],
            [
                'id' => 2,
                'judul' => 'Lomba Programming Competition',
                'deskripsi' => 'Mengikuti lomba programming competition tingkat universitas dan berhasil meraih juara 3. Lomba ini menguji kemampuan algoritma dan pemecahan masalah.',
                'waktu' => 'Oktober 2024',
                'dokumentasi' => 'https://via.placeholder.com/600x400.png?text=Dokumentasi+Lomba',
                'kesan' => 'Semangat teamwork dan kompetisi sangat terasa. Saya belajar bahwa latihan yang konsisten adalah kunci sukses.'
            ],
            [
                'id' => 3,
                'judul' => 'Praktikum Kerja Lapangan',
                'deskripsi' => 'Melakukan praktikum kerja lapangan di sebuah perusahaan teknologi selama 3 bulan. Saya belajar tentang pengembangan web menggunakan framework modern.',
                'waktu' => 'Januari - Maret 2025',
                'dokumentasi' => 'https://via.placeholder.com/600x400.png?text=Dokumentasi+PKL',
                'kesan' => 'Pengalaman nyata di dunia kerja sangat berbeda dengan teori di kelas. Saya menjadi lebih siap untuk memasuki dunia kerja.'
            ],
            [
                'id' => 4,
                'judul' => 'Workshop Web Development',
                'deskripsi' => 'Mengikuti workshop web development yang membahas tentang React, Node.js, dan database management. Workshop ini dibimbing oleh praktisi industri.',
                'waktu' => 'Mei 2025',
                'dokumentasi' => 'https://via.placeholder.com/600x400.png?text=Dokumentasi+Workshop',
                'kesan' => 'Workshop ini membuka mata saya tentang teknologi web modern. Saya semakin semangat untuk terus belajar dan berkembang.'
            ]
        ];
    }

    public function getPengalamanById($id)
    {
        $pengalaman = $this->getAllPengalaman();
        foreach ($pengalaman as $item) {
            if ($item['id'] == $id) {
                return $item;
            }
        }
        return null;
    }
}
