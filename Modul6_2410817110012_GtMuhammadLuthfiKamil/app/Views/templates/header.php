<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Modul 6 - CodeIgniter' ?></title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --bg-color: #0f172a;
            --glass-bg: rgba(30, 41, 59, 0.7);
            --glass-border: rgba(255, 255, 255, 0.1);
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
            --primary-glow: rgba(56, 189, 248, 0.5);
            --accent-color: #38bdf8;
        }
        body {
            font-family: 'Outfit', sans-serif;
            background: radial-gradient(circle at top left, #1e1b4b, #0f172a 40%, #020617 100%);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
            background-attachment: fixed;
        }
        main {
            flex: 1;
            animation: fadeInUp 0.8s ease-out;
        }
        /* Glassmorphism Classes */
        .glass-navbar {
            background: rgba(15, 23, 42, 0.6) !important;
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--glass-border);
        }
        .glass-card {
            background: var(--glass-bg) !important;
            backdrop-filter: blur(16px);
            border: 1px solid var(--glass-border) !important;
            color: var(--text-main);
            border-radius: 16px;
        }
        .glass-card .card-body {
            color: var(--text-main);
        }
        .glass-card .text-muted {
            color: var(--text-muted) !important;
        }
        .text-gradient {
            background: linear-gradient(135deg, #38bdf8, #818cf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .navbar-brand {
            font-weight: 700;
            letter-spacing: 1px;
            color: #fff !important;
        }
        .nav-link {
            color: #cbd5e1 !important;
            transition: color 0.3s;
            font-weight: 500;
        }
        .nav-link:hover {
            color: var(--accent-color) !important;
        }
        /* Buttons */
        .btn-primary {
            background: linear-gradient(135deg, #38bdf8, #2563eb);
            border: none;
            transition: all 0.3s ease;
            color: #fff;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px var(--primary-glow);
            color: #fff;
        }
        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid var(--glass-border);
            color: var(--text-main);
            transition: all 0.3s;
        }
        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
        }
        .btn-outline-secondary {
            color: var(--text-main);
            border-color: var(--glass-border);
            transition: all 0.3s;
        }
        .btn-outline-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            border-color: rgba(255, 255, 255, 0.2);
        }
        /* Hover Cards */
        .card-hover {
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.4s;
        }
        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.5), 0 0 15px var(--primary-glow);
            border-color: rgba(56, 189, 248, 0.3) !important;
        }
        /* Animations */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        /* Utilities */
        .hr-glass {
            border-color: rgba(255,255,255,0.1);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark glass-navbar sticky-top">
        <div class="container">
            <a class="navbar-brand text-gradient" href="<?= base_url('/') ?>">Modul 6 CI4</a>
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link px-3" href="<?= base_url('/') ?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="<?= base_url('profil') ?>">Profil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <main class="py-5">
