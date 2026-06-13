<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    public function getProfil()
    {
        return [
            'nama' => 'Gt Muhammad Luthfi Kamil',
            'nim' => '2410817110012',
            'gambar' => 'foto_profil.jpeg',
            'asal_prodi' => 'Teknologi Informasi',
            'hobi' => 'Traveling, Gaming, Coffee Hunting, Basket',
            'skills' => ['HTML', 'CSS', 'JavaScript', 'PHP', 'CodeIgniter', 'MySQL']
        ];
    }

    public function getPengalaman()
    {
        return [
            [
                'id' => 1,
                'judul' => 'Seminar Nasional Teknologi',
                'deskripsi' => 'Mengikuti seminar nasional tentang perkembangan teknologi terbaru di bidang informatika. Seminar ini membahas tentang AI, Machine Learning, dan Big Data.',
                'waktu' => 'September 2024',
                'dokumentasi' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800',
                'kesan' => 'Pengalaman yang sangat berharga untuk menambah wawasan tentang teknologi masa depan.'
            ],
            [
                'id' => 2,
                'judul' => 'Lomba Programming Competition',
                'deskripsi' => 'Mengikuti lomba programming competition tingkat universitas dan berhasil meraih juara 3. Lomba ini menguji kemampuan algoritma dan pemecahan masalah.',
                'waktu' => 'Oktober 2024',
                'dokumentasi' => 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=800',
                'kesan' => 'Semangat teamwork dan kompetisi sangat terasa. Saya belajar bahwa latihan yang konsisten adalah kunci sukses.'
            ],
            [
                'id' => 3,
                'judul' => 'Praktikum Kerja Lapangan',
                'deskripsi' => 'Melakukan praktikum kerja lapangan di sebuah perusahaan teknologi selama 3 bulan. Saya belajar tentang pengembangan web menggunakan framework modern.',
                'waktu' => 'Januari - Maret 2025',
                'dokumentasi' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800',
                'kesan' => 'Pengalaman nyata di dunia kerja sangat berbeda dengan teori di kelas. Saya menjadi lebih siap untuk memasuki dunia kerja.'
            ],
            [
                'id' => 4,
                'judul' => 'Workshop Web Development',
                'deskripsi' => 'Mengikuti workshop web development yang membahas tentang React, Node.js, dan database management. Workshop ini dibimbing oleh praktisi industri.',
                'waktu' => 'Mei 2025',
                'dokumentasi' => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?w=800',
                'kesan' => 'Workshop ini membuka mata saya tentang teknologi web modern. Saya semakin semangat untuk terus belajar dan berkembang.'
            ]
        ];
    }

    public function getPengalamanById($id)
    {
        $pengalaman = $this->getPengalaman();
        foreach ($pengalaman as $item) {
            if ($item['id'] == $id) {
                return $item;
            }
        }
        return null;
    }
}
