<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Show login page
    public function login()
    {
        $data = [
            'title'      => 'Login',
            'validation' => session()->getFlashdata('validation') ?? null,
            'alert'      => session()->getFlashdata('alert') ?? null,
            'success'    => session()->getFlashdata('success') ?? null,
        ];
        return view('auth/login', $data);
    }

    // Process login
    public function authenticate()
    {
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/login')->withInput()->with('validation', $this->validator);
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Set session
            session()->set([
                'user_id'   => $user['id'],
                'username'  => $user['username'],
                'email'     => $user['email'],
                'logged_in' => true,
            ]);

            return redirect()->to('/dashboard');
        }

        return redirect()->to('/login')->withInput()->with('alert', 'Email atau password salah!');
    }

    // Show register page
    public function register()
    {
        $data = [
            'title' => 'Register',
            'validation' => session()->getFlashdata('validation') ?? null,
        ];
        return view('auth/register', $data);
    }

    // Process registration
    public function store()
    {
        $rules = [
            'username'         => 'required|string|min_length[3]',
            'email'            => 'required|valid_email|is_unique[user.email]',
            'password'         => 'required|min_length[6]',
            'password_confirm' => 'required|matches[password]',
        ];

        $messages = [
            'username' => [
                'required'   => 'Username wajib diisi.',
                'min_length' => 'Username minimal 3 karakter.',
            ],
            'email' => [
                'required'   => 'Email wajib diisi.',
                'valid_email' => 'Format email tidak valid.',
                'is_unique'  => 'Email sudah terdaftar.',
            ],
            'password' => [
                'required'   => 'Password wajib diisi.',
                'min_length' => 'Password minimal 6 karakter.',
            ],
            'password_confirm' => [
                'required' => 'Konfirmasi password wajib diisi.',
                'matches'  => 'Konfirmasi password tidak cocok.',
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->to('/register')->withInput()->with('validation', $this->validator);
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        $this->userModel->insert($data);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
