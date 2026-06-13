<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BukuModel;

class BukuController extends BaseController
{
    protected $bukuModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }

    // Display list of books
    public function index()
    {
        $data = [
            'title' => 'Daftar Buku',
            'buku'  => $this->bukuModel->findAll(),
            'alert' => session()->getFlashdata('alert'),
        ];

        return view('buku/index', $data);
    }

    // Show create form
    public function create()
    {
        $data = [
            'title' => 'Tambah Buku',
            'validation' => session()->getFlashdata('validation') ?? null,
        ];

        return view('buku/create', $data);
    }

    // Store new book
    public function store()
    {
        $data = $this->request->getPost();

        if (!$this->bukuModel->insert($data)) {
            return redirect()->to('/buku/create')->withInput()->with('validation', $this->bukuModel->errors());
        }

        return redirect()->to('/buku')->with('alert', 'Data buku berhasil ditambahkan!');
    }

    // Show detail/edit form
    public function show($id)
    {
        $buku = $this->bukuModel->find($id);

        if (!$buku) {
            return redirect()->to('/buku')->with('alert', 'Data buku tidak ditemukan!');
        }

        $data = [
            'title' => 'Detail Buku',
            'buku'  => $buku,
        ];

        return view('buku/show', $data);
    }

    // Show edit form
    public function edit($id)
    {
        $buku = $this->bukuModel->find($id);

        if (!$buku) {
            return redirect()->to('/buku')->with('alert', 'Data buku tidak ditemukan!');
        }

        $data = [
            'title' => 'Edit Buku',
            'buku'  => $buku,
            'validation' => session()->getFlashdata('validation') ?? null,
        ];

        return view('buku/edit', $data);
    }

    // Update book
    public function update($id)
    {
        $data = $this->request->getPost();

        if (!$this->bukuModel->update($id, $data)) {
            return redirect()->to('/buku/edit/' . $id)->withInput()->with('validation', $this->bukuModel->errors());
        }

        return redirect()->to('/buku')->with('alert', 'Data buku berhasil diperbarui!');
    }

    // Delete book
    public function delete($id)
    {
        $this->bukuModel->delete($id);

        return redirect()->to('/buku')->with('alert', 'Data buku berhasil dihapus!');
    }
}
