<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Detail Pengalaman' ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
            box-shadow: 12px 12px 24px var(--shadow-dark), -12px -12px 24px var(--shadow-light);
            border: none;
        }
        .neo-inset {
            background: var(--bg-color);
            border-radius: 16px;
            box-shadow: inset 8px 8px 16px var(--shadow-dark), inset -8px -8px 16px var(--shadow-light);
            padding: 24px;
            margin-bottom: 24px;
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
        .neo-btn-icon {
            background: var(--bg-color);
            border: none;
            border-radius: 50%;
            box-shadow: 6px 6px 12px var(--shadow-dark), -6px -6px 12px var(--shadow-light);
            color: var(--accent-peach);
            width: 45px;
            height: 45px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            text-decoration: none;
        }
        .neo-btn-icon:hover {
            color: #fff;
        }
        .neo-btn-icon:active {
            box-shadow: inset 4px 4px 8px var(--shadow-dark), inset -4px -4px 8px var(--shadow-light);
        }
        .neo-badge {
            background: var(--bg-color);
            box-shadow: 4px 4px 8px var(--shadow-dark), -4px -4px 8px var(--shadow-light);
            color: var(--accent-peach);
            border-radius: 50px;
            padding: 8px 20px;
            font-size: 0.95rem;
            display: inline-block;
            font-weight: 600;
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
            <a href="<?= base_url('profil') ?>" class="neo-btn" style="padding: 8px 20px;">Profil</a>
        </div>
    </nav>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card neo-card p-4 p-md-5">
                    
                    <div class="d-flex align-items-center mb-4">
                        <a href="<?= base_url('profil') ?>" class="neo-btn-icon me-3 flex-shrink-0" title="Kembali">
                            <i class="bi bi-arrow-left fs-5"></i>
                        </a>
                        <h2 class="fw-bold m-0 lh-1" style="color: var(--text-main);"><?= esc($pengalaman['judul']) ?></h2>
                    </div>

                    <div class="mb-4">
                        <span class="neo-badge">
                            <i class="bi bi-calendar-event me-2"></i><?= esc($pengalaman['waktu']) ?>
                        </span>
                    </div>

                    <div class="mb-4 text-center">
                        <img src="<?= esc($pengalaman['dokumentasi']) ?>" alt="Dokumentasi" class="img-fluid w-100" style="border-radius: 16px; box-shadow: 8px 8px 16px var(--shadow-dark), -8px -8px 16px var(--shadow-light); border: 2px solid var(--bg-color); max-height: 400px; object-fit: cover;">
                    </div>

                    <div class="neo-inset">
                        <h4 class="fw-bold text-peach mb-3">Deskripsi Kegiatan</h4>
                        <p style="color: var(--text-muted); line-height: 1.8; font-size: 1.05rem;" class="mb-0">
                            <?= esc($pengalaman['deskripsi']) ?>
                        </p>
                    </div>

                    <div class="neo-inset">
                        <h4 class="fw-bold text-peach mb-3">Kesan & Pesan</h4>
                        <p class="fst-italic mb-0" style="color: var(--text-main); line-height: 1.8; font-size: 1.05rem;">
                            "<?= esc($pengalaman['kesan']) ?>"
                        </p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>
