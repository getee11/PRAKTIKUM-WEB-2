<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Profil' ?></title>
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
        }
        .neo-card {
            background: var(--bg-color);
            border-radius: 24px;
            box-shadow: 10px 10px 20px var(--shadow-dark), -10px -10px 20px var(--shadow-light);
            border: none;
            margin-bottom: 24px;
        }
        .neo-inset {
            background: var(--bg-color);
            border-radius: 12px;
            box-shadow: inset 6px 6px 12px var(--shadow-dark), inset -6px -6px 12px var(--shadow-light);
            padding: 16px;
            margin-bottom: 16px;
        }
        .neo-btn {
            background: var(--bg-color);
            border: none;
            border-radius: 50px;
            box-shadow: 6px 6px 12px var(--shadow-dark), -6px -6px 12px var(--shadow-light);
            color: var(--accent-peach);
            font-weight: 600;
            padding: 10px 25px;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        .neo-btn:hover {
            color: #fff;
        }
        .neo-btn:active {
            box-shadow: inset 4px 4px 8px var(--shadow-dark), inset -4px -4px 8px var(--shadow-light);
        }
        .neo-badge {
            background: var(--bg-color);
            box-shadow: 4px 4px 8px var(--shadow-dark), -4px -4px 8px var(--shadow-light);
            color: var(--accent-peach);
            border-radius: 50px;
            padding: 8px 16px;
            font-size: 0.9rem;
            display: inline-block;
            margin: 5px;
            font-weight: 500;
        }
        .neo-img {
            border-radius: 50%;
            box-shadow: 6px 6px 12px var(--shadow-dark), -6px -6px 12px var(--shadow-light);
            border: 4px solid var(--bg-color);
        }
        .text-peach {
            color: var(--accent-peach);
        }
    </style>
</head>
<body>
    <nav class="container pt-4 pb-2">
        <div class="d-flex justify-content-center gap-3">
            <a href="<?= base_url('/') ?>" class="neo-btn" style="padding: 8px 20px;">Beranda</a>
            <a href="<?= base_url('profil') ?>" class="neo-btn" style="padding: 8px 20px; color: #fff; box-shadow: inset 4px 4px 8px var(--shadow-dark), inset -4px -4px 8px var(--shadow-light);">Profil</a>
        </div>
    </nav>
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h1 class="fw-bold m-0" style="color: var(--text-main);">Profil <span class="text-peach">& Pengalaman</span></h1>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card neo-card p-4 text-center">
                    <div class="mb-4">
                        <img src="<?= base_url(esc($profil['gambar'])) ?>" alt="Foto Profil" class="neo-img" style="width: 150px; height: 150px; object-fit: cover;">
                    </div>
                    <h4 class="fw-bold mb-1" style="color: var(--text-main);"><?= esc($profil['nama']) ?></h4>
                    <p class="mb-4 text-peach fw-medium"><?= esc($profil['nim']) ?></p>
                    
                    <div class="neo-inset text-start">
                        <small class="d-block text-peach fw-bold mb-1">Asal Prodi</small>
                        <span style="color: var(--text-main);"><?= esc($profil['asal_prodi']) ?></span>
                    </div>
                    <div class="neo-inset text-start">
                        <small class="d-block text-peach fw-bold mb-1">Hobi</small>
                        <span style="color: var(--text-main);"><?= esc($profil['hobi']) ?></span>
                    </div>
                    
                    <div class="mt-4 text-start">
                        <h5 class="fw-bold text-peach mb-3">Skills</h5>
                        <div>
                            <?php foreach ($profil['skills'] as $skill): ?>
                                <span class="neo-badge"><?= esc($skill) ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-8">
                <div class="row g-4">
                    <?php foreach ($pengalaman as $item): ?>
                        <div class="col-md-6">
                            <div class="card neo-card h-100 p-4 d-flex flex-column">
                                <h5 class="fw-bold mb-2" style="color: var(--text-main);"><?= esc($item['judul']) ?></h5>
                                <p class="small fw-bold mb-3 text-peach"><?= esc($item['waktu']) ?></p>
                                <p class="flex-grow-1" style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6;">
                                    <?= esc(substr($item['deskripsi'], 0, 100)) ?>...
                                </p>
                                <a href="<?= base_url('detail/' . $item['id']) ?>" class="neo-btn w-100 mt-3">Lihat Detail</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
