<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Beranda' ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --bg-color: #2b304c;
            --shadow-dark: #1d2134;
            --shadow-light: #394064;
            --accent-peach: #efb99e;
            --text-main: #f0f4f8;
            --text-muted: #8e9bb0;
        }
        body {
            background-color: var(--bg-color);
            color: var(--text-main);
            font-family: 'Outfit', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .neo-card {
            background: var(--bg-color);
            border-radius: 24px;
            box-shadow: 12px 12px 24px var(--shadow-dark), -12px -12px 24px var(--shadow-light);
            border: none;
        }
        .neo-card-peach {
            background: linear-gradient(145deg, #fce0cd, #e6b298);
            border-radius: 24px;
            box-shadow: 12px 12px 24px var(--shadow-dark), -12px -12px 24px var(--shadow-light);
            border: none;
            color: #2b304c;
        }
        .neo-btn {
            background: var(--bg-color);
            border: none;
            border-radius: 50px;
            box-shadow: 6px 6px 12px var(--shadow-dark), -6px -6px 12px var(--shadow-light);
            color: var(--accent-peach);
            font-weight: 600;
            padding: 12px 30px;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-block;
        }
        .neo-btn:hover {
            color: #fff;
        }
        .neo-btn:active {
            box-shadow: inset 4px 4px 8px var(--shadow-dark), inset -4px -4px 8px var(--shadow-light);
        }
        .neo-img {
            border-radius: 50%;
            box-shadow: 10px 10px 20px var(--shadow-dark), -10px -10px 20px var(--shadow-light);
            border: 4px solid var(--bg-color);
        }
        .neo-img-peach {
            border-radius: 50%;
            box-shadow: 10px 10px 20px #c49882, -10px -10px 20px #ffecd8;
            border: 4px solid #f2cfbb;
        }
        .text-peach {
            color: var(--accent-peach);
        }
    </style>
</head>
<body>
    <nav class="container pt-4 pb-2">
        <div class="d-flex justify-content-center gap-3">
            <a href="<?= base_url('/') ?>" class="neo-btn" style="padding: 8px 20px; color: #fff; box-shadow: inset 4px 4px 8px var(--shadow-dark), inset -4px -4px 8px var(--shadow-light);">Beranda</a>
            <a href="<?= base_url('profil') ?>" class="neo-btn" style="padding: 8px 20px;">Profil</a>
        </div>
    </nav>
    <div class="container py-4 flex-grow-1 d-flex justify-content-center align-items-center">
        <div class="card neo-card-peach p-4 p-md-5 w-100" style="max-width: 1000px;">
            <div class="row align-items-center">
                <div class="col-md-5 text-center mb-4 mb-md-0">
                    <img src="<?= base_url(esc($profil['gambar'])) ?>" alt="Foto Profil" class="neo-img-peach" style="width: 280px; height: 280px; object-fit: cover;">
                </div>
                <div class="col-md-7">
                    <p class="fw-bold mb-1" style="color: #8c5b46; font-size: 1.1rem; text-transform: uppercase;">Selamat Datang</p>
                    <h1 class="display-5 fw-bold mb-3" style="color: #2b304c;"><?= esc($profil['nama']) ?></h1>
                    <h4 class="mb-4" style="color: #5a3c2e;">NIM: <?= esc($profil['nim']) ?></h4>
                    <p class="mb-5" style="color: #4a342a; font-size: 1.1rem; line-height: 1.6;">
                        Website portofolio ini dibangun menggunakan konsep MVC CodeIgniter 4 dengan desain Dark Neomorphism.
                    </p>
                    <div>
                        <a href="<?= base_url('profil') ?>" class="neo-btn" style="background: var(--bg-color); color: var(--accent-peach);">Lihat Profil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
