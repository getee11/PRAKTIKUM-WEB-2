<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table            = 'buku';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['judul', 'penulis', 'penerbit', 'tahun_terbit'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;

    // Validation rules
    protected $validationRules = [
        'judul'        => 'required|string|min_length[1]',
        'penulis'      => 'required|string|min_length[1]',
        'penerbit'     => 'required|string|min_length[1]',
        'tahun_terbit' => 'required|integer|greater_than[1800]|less_than[2024]',
    ];

    // Custom validation messages in Indonesian
    protected $validationMessages = [
        'judul' => [
            'required'    => 'Judul wajib diisi.',
            'string'      => 'Judul harus berupa teks.',
            'min_length'  => 'Judul tidak boleh kosong.',
        ],
        'penulis' => [
            'required'    => 'Penulis wajib diisi.',
            'string'      => 'Penulis harus berupa teks.',
            'min_length'  => 'Penulis tidak boleh kosong.',
        ],
        'penerbit' => [
            'required'    => 'Penerbit wajib diisi.',
            'string'      => 'Penerbit harus berupa teks.',
            'min_length'  => 'Penerbit tidak boleh kosong.',
        ],
        'tahun_terbit' => [
            'required'     => 'Tahun Terbit wajib diisi.',
            'integer'      => 'Tahun Terbit harus berupa angka.',
            'greater_than' => 'Tahun Terbit harus lebih besar dari 1800.',
            'less_than'    => 'Tahun Terbit harus lebih kecil dari 2024.',
        ],
    ];
}
