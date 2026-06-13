<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Modul 7') ?> — Pustaka</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;1,400&family=JetBrains+Mono:wght@400&family=Saira+Condensed:wght@400&display=swap" rel="stylesheet">
    <style>
        :root {
            --c-primary:#ffffff;
            --c-ink:#ffffff;
            --c-body:#cccccc;
            --c-body-strong:#e6e6e6;
            --c-muted:#999999;
            --c-muted-soft:#666666;
            --c-hairline:#262626;
            --c-hairline-strong:#3a3a3a;
            --c-canvas:#000000;
            --c-surface-soft:#0d0d0d;
            --c-surface-card:#141414;
            --c-surface-elevated:#1f1f1f;
            --c-on-dark:#ffffff;
            --c-link:#c3d9f3;
            --c-warning:#d4a017;
            --c-success:#5fa657;
            --c-danger:#ff3b30;
            --c-danger-bg:rgba(255,59,48,.12);
            --c-success-bg:rgba(95,166,87,.12);
            --r-none:0px;
            --r-pill:9999px;
            --sp-xxs:4px;--sp-xs:8px;--sp-sm:12px;--sp-md:16px;--sp-lg:24px;--sp-xl:40px;--sp-xxl:64px;--sp-section:120px;
            --f-display:'Saira Condensed',sans-serif;
            --f-body:'Cormorant Garamond',serif;
            --f-mono:'JetBrains Mono',monospace;
        }
        *,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
        html{scroll-behavior:smooth}
        body{font-family:var(--f-body);background:var(--c-canvas);color:var(--c-body);font-size:16px;font-weight:400;line-height:1.5;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}

        .container{max-width:1280px;margin:0 auto;padding:0 var(--sp-lg)}

        /* ── NAV ── */
        .global-nav{background:transparent;height:56px;display:flex;align-items:center;position:relative;z-index:300;border-bottom:1px solid var(--c-hairline)}
        .global-nav__inner{max-width:1280px;width:100%;margin:0 auto;padding:0 var(--sp-lg);display:flex;align-items:center;justify-content:space-between}
        .global-nav__brand{font-family:var(--f-display);font-size:14px;font-weight:400;letter-spacing:6px;color:var(--c-on-dark);text-decoration:none;text-transform:uppercase}
        .global-nav__brand:hover{opacity:.8}
        .global-nav__links{display:flex;align-items:center;gap:24px}
        .global-nav__link{font-family:var(--f-mono);font-size:12px;font-weight:400;letter-spacing:2px;text-transform:uppercase;color:var(--c-on-dark);text-decoration:none;opacity:.7;transition:opacity .2s}
        .global-nav__link:hover{opacity:1}
        .global-nav__link--active{opacity:1}
        .global-nav__link--logout{border:1px solid var(--c-hairline-strong);border-radius:var(--r-pill);padding:6px 16px}
        .global-nav__link--logout:hover{border-color:var(--c-on-dark)}
        .global-nav__hamburger{display:none;flex-direction:column;gap:4px;cursor:pointer;background:none;border:none;padding:4px}
        .global-nav__hamburger span{display:block;width:18px;height:1px;background:var(--c-on-dark)}

        /* ── SUB-NAV ── */
        .sub-nav{background:var(--c-surface-soft);border-bottom:1px solid var(--c-hairline);height:52px;display:flex;align-items:center;position:relative;z-index:200}
        .sub-nav__inner{max-width:1280px;width:100%;margin:0 auto;padding:0 var(--sp-lg);display:flex;align-items:center;justify-content:space-between}
        .sub-nav__title{font-family:var(--f-display);font-size:20px;font-weight:400;letter-spacing:1px;text-transform:uppercase;color:var(--c-on-dark)}
        .sub-nav__actions{display:flex;align-items:center;gap:var(--sp-md)}
        .sub-nav__meta{font-family:var(--f-mono);font-size:12px;font-weight:400;letter-spacing:2px;color:var(--c-muted);text-transform:uppercase}

        /* ── BUTTONS ── */
        .btn{display:inline-flex;align-items:center;justify-content:center;gap:6px;border:none;font-family:var(--f-mono);font-size:14px;font-weight:400;letter-spacing:2.5px;text-transform:uppercase;cursor:pointer;text-decoration:none;transition:opacity .2s,border-color .2s;white-space:nowrap}
        .btn:active{opacity:.7}
        .btn-primary{background:transparent;color:var(--c-on-dark);border:1px solid var(--c-on-dark);border-radius:var(--r-pill);padding:14px 32px;line-height:1}
        .btn-primary:hover{background:rgba(255,255,255,.08)}
        .btn-primary:focus-visible{outline:2px solid var(--c-link);outline-offset:2px}
        .btn-hero{background:transparent;color:var(--c-on-dark);border:1px solid var(--c-on-dark);border-radius:var(--r-pill);padding:16px 36px;font-size:14px;line-height:1}
        .btn-hero:hover{background:rgba(255,255,255,.08)}
        .btn-secondary{background:transparent;color:var(--c-muted);border:1px solid var(--c-hairline-strong);border-radius:var(--r-pill);padding:14px 32px;line-height:1}
        .btn-secondary:hover{border-color:var(--c-on-dark);color:var(--c-on-dark)}
        .btn-dark{background:transparent;color:var(--c-on-dark);border:1px solid var(--c-on-dark);border-radius:var(--r-pill);padding:8px 18px;font-size:12px;letter-spacing:2px}
        .btn-pearl{background:transparent;color:var(--c-muted);border:1px solid var(--c-hairline-strong);border-radius:var(--r-pill);padding:8px 18px;font-size:11px;letter-spacing:2px}
        .btn-pearl:hover{border-color:var(--c-on-dark);color:var(--c-on-dark)}
        .btn-danger{background:transparent;color:var(--c-danger);border:1px solid var(--c-danger);border-radius:var(--r-pill);padding:8px 18px;font-size:11px;letter-spacing:2px}
        .btn-danger:hover{background:rgba(255,59,48,.1)}
        .btn--sm{font-size:11px!important;padding:8px 18px!important;letter-spacing:2px!important}
        .btn--full{width:100%}

        /* ── TEXT LINKS ── */
        .text-link{color:var(--c-link);text-decoration:underline;font-family:var(--f-body);font-size:16px;font-weight:400}
        .text-link:hover{opacity:.7}
        .text-link--sm{font-size:14px}

        /* ── TILES / SECTIONS ── */
        .tile{width:100%;padding:var(--sp-section) 0;text-align:center}
        .tile--light{background:var(--c-surface-soft);color:var(--c-on-dark)}
        .tile--parchment{background:var(--c-surface-card);color:var(--c-on-dark)}
        .tile--dark{background:var(--c-canvas);color:var(--c-on-dark)}
        .tile--dark-2{background:var(--c-surface-soft);color:var(--c-on-dark)}
        .tile--black{background:var(--c-canvas);color:var(--c-on-dark)}
        .tile__eyebrow{font-family:var(--f-mono);font-size:11px;font-weight:400;letter-spacing:2px;text-transform:uppercase;color:var(--c-muted);margin-bottom:var(--sp-lg)}
        .tile__headline{font-family:var(--f-display);font-size:64px;font-weight:400;line-height:1.1;letter-spacing:4px;text-transform:uppercase;margin-bottom:var(--sp-xs);color:var(--c-on-dark)}
        .tile__headline--lg{font-size:48px;letter-spacing:3px;line-height:1.15}
        .tile__sub{font-family:var(--f-body);font-size:18px;font-weight:400;line-height:1.5;color:var(--c-muted);margin-bottom:var(--sp-xxl)}
        .tile__ctas{display:flex;align-items:center;justify-content:center;gap:var(--sp-md);flex-wrap:wrap;margin-bottom:var(--sp-xxl)}
        .tile__icon{font-size:80px;line-height:1;display:block;margin-bottom:var(--sp-xl)}

        /* ── CARDS ── */
        .card{background:var(--c-surface-card);border:1px solid var(--c-hairline);border-radius:var(--r-none);padding:var(--sp-lg);color:var(--c-on-dark)}
        .card--narrow{max-width:640px;margin-left:auto;margin-right:auto}
        .card--form{max-width:560px;margin-left:auto;margin-right:auto}

        /* ── BOOK GRID ── */
        .book-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:var(--sp-xl);padding:var(--sp-xxl) 0}
        .book-card{background:var(--c-surface-card);border:1px solid var(--c-hairline);border-radius:var(--r-none);padding:var(--sp-lg);display:flex;flex-direction:column;gap:var(--sp-sm);transition:border-color .3s}
        .book-card:hover{border-color:var(--c-hairline-strong)}
        .book-card__cover{aspect-ratio:3/4;background:var(--c-surface-soft);border-radius:var(--r-none);display:flex;align-items:center;justify-content:center;font-size:40px;margin-bottom:var(--sp-xs);overflow:hidden}
        .book-card__number{font-family:var(--f-mono);font-size:11px;font-weight:400;letter-spacing:2px;color:var(--c-muted);text-transform:uppercase}
        .book-card__title{font-family:var(--f-display);font-size:20px;font-weight:400;line-height:1.3;letter-spacing:1px;color:var(--c-on-dark);text-transform:uppercase}
        .book-card__author{font-family:var(--f-body);font-size:14px;font-weight:400;line-height:1.5;color:var(--c-muted)}
        .book-card__meta{font-family:var(--f-mono);font-size:11px;font-weight:400;letter-spacing:2px;color:var(--c-muted-soft);margin-top:auto;text-transform:uppercase}
        .book-card__actions{display:flex;gap:var(--sp-xs);margin-top:var(--sp-xs);flex-wrap:wrap}

        /* ── TABLE ── */
        .table-wrap{overflow-x:auto}
        .apple-table{width:100%;border-collapse:collapse}
        .apple-table th{text-align:left;font-family:var(--f-mono);font-size:11px;font-weight:400;letter-spacing:2px;text-transform:uppercase;color:var(--c-muted);padding:var(--sp-sm) var(--sp-md);border-bottom:1px solid var(--c-hairline);white-space:nowrap}
        .apple-table td{font-family:var(--f-body);font-size:16px;font-weight:400;padding:var(--sp-md);border-bottom:1px solid var(--c-hairline);color:var(--c-body);vertical-align:middle}
        .apple-table tr:last-child td{border-bottom:none}
        .apple-table .td-strong{font-family:var(--f-display);font-size:16px;letter-spacing:.5px;color:var(--c-on-dark);text-transform:uppercase}
        .apple-table .td-muted{font-size:14px;color:var(--c-muted)}
        .apple-table .td-actions{display:flex;gap:var(--sp-xs);align-items:center}

        /* ── FORMS ── */
        .form-group{margin-bottom:var(--sp-lg)}
        .form-label{display:block;font-family:var(--f-mono);font-size:11px;font-weight:400;letter-spacing:2px;text-transform:uppercase;color:var(--c-muted);margin-bottom:var(--sp-xs)}
        .form-input{width:100%;padding:12px 0;font-family:var(--f-body);font-size:16px;font-weight:400;background:transparent;color:var(--c-on-dark);border:none;border-bottom:1px solid var(--c-hairline-strong);outline:none;transition:border-color .2s;appearance:none;border-radius:0}
        .form-input:focus{border-bottom-color:var(--c-on-dark)}
        .form-input::placeholder{color:var(--c-muted-soft)}
        .form-input.is-invalid{border-bottom-color:var(--c-danger)}
        .form-hint{font-family:var(--f-mono);font-size:11px;font-weight:400;letter-spacing:1px;color:var(--c-muted-soft);margin-top:var(--sp-xxs)}
        .form-error{font-family:var(--f-body);font-size:14px;font-weight:400;color:var(--c-danger);margin-top:var(--sp-xxs)}
        .form-actions{display:flex;gap:var(--sp-sm);margin-top:var(--sp-xl)}

        /* ── ALERTS ── */
        .alert{padding:16px 24px;border:1px solid var(--c-hairline);border-radius:var(--r-none);font-family:var(--f-body);font-size:14px;font-weight:400;margin-bottom:var(--sp-lg)}
        .alert-danger{border-color:var(--c-danger);color:var(--c-danger);background:var(--c-danger-bg)}
        .alert-success{border-color:var(--c-success);color:var(--c-success);background:var(--c-success-bg)}

        /* ── AUTH PAGE ── */
        .auth-page{min-height:100vh;display:flex;align-items:center;justify-content:center;background:var(--c-canvas);padding:var(--sp-xl) var(--sp-lg)}
        .auth-card{width:100%;max-width:420px;background:var(--c-surface-card);border:1px solid var(--c-hairline);border-radius:var(--r-none);padding:var(--sp-xxl) var(--sp-xl)}
        .auth-brand{text-align:center;font-family:var(--f-display);font-size:14px;font-weight:400;letter-spacing:6px;text-transform:uppercase;color:var(--c-on-dark);margin-bottom:var(--sp-xxl)}
        .auth-title{font-family:var(--f-display);font-size:48px;font-weight:400;line-height:1.15;letter-spacing:3px;text-transform:uppercase;text-align:center;color:var(--c-on-dark);margin-bottom:var(--sp-xs)}
        .auth-sub{font-family:var(--f-body);font-size:16px;font-weight:400;line-height:1.5;text-align:center;color:var(--c-muted);margin-bottom:var(--sp-xl)}
        .auth-divider{border:none;border-top:1px solid var(--c-hairline);margin:var(--sp-lg) 0}
        .auth-footer{text-align:center;font-family:var(--f-body);font-size:14px;font-weight:400;color:var(--c-muted)}

        /* ── DETAIL TABLE ── */
        .detail-table{width:100%;border-collapse:collapse}
        .detail-table th{width:160px;font-family:var(--f-mono);font-size:11px;font-weight:400;letter-spacing:2px;text-transform:uppercase;color:var(--c-muted);padding:var(--sp-md) var(--sp-md) var(--sp-md) 0;text-align:left;vertical-align:top;border-bottom:1px solid var(--c-hairline)}
        .detail-table td{font-family:var(--f-body);font-size:16px;font-weight:400;line-height:1.5;color:var(--c-body);padding:var(--sp-md);border-bottom:1px solid var(--c-hairline)}
        .detail-table tr:last-child th,.detail-table tr:last-child td{border-bottom:none}
        .detail-table .td-bold{font-family:var(--f-display);letter-spacing:.5px;color:var(--c-on-dark);text-transform:uppercase}

        /* ── EMPTY STATE ── */
        .empty-state{text-align:center;padding:var(--sp-section) 0}
        .empty-state__icon{font-size:64px;display:block;margin-bottom:var(--sp-lg)}
        .empty-state__title{font-family:var(--f-display);font-size:32px;font-weight:400;letter-spacing:2px;text-transform:uppercase;color:var(--c-on-dark);margin-bottom:var(--sp-sm)}
        .empty-state__body{font-family:var(--f-body);font-size:16px;font-weight:400;color:var(--c-muted);margin-bottom:var(--sp-xl)}

        /* ── PAGE HEADER ── */
        .page-header{display:flex;align-items:flex-end;justify-content:space-between;padding:var(--sp-xl) 0 var(--sp-lg);gap:var(--sp-lg)}
        .page-title{font-family:var(--f-display);font-size:48px;font-weight:400;line-height:1.15;letter-spacing:3px;text-transform:uppercase;color:var(--c-on-dark)}

        /* ── STATS ROW ── */
        .stats-row{display:grid;grid-template-columns:repeat(3,1fr);gap:var(--sp-xl);padding-bottom:var(--sp-xxl)}
        .stat-card{background:var(--c-surface-card);border:1px solid var(--c-hairline);border-radius:var(--r-none);padding:var(--sp-xl) var(--sp-lg);text-align:center}
        .stat-card__value{font-family:var(--f-display);font-size:48px;font-weight:400;line-height:1.1;letter-spacing:3px;text-transform:uppercase;color:var(--c-on-dark)}
        .stat-card__label{font-family:var(--f-mono);font-size:11px;font-weight:400;letter-spacing:2px;text-transform:uppercase;color:var(--c-muted);margin-top:var(--sp-xs)}

        /* ── FOOTER ── */
        .site-footer{background:var(--c-canvas);padding:var(--sp-xxl) 0;text-align:center;border-top:1px solid var(--c-hairline)}
        .site-footer__links{display:flex;justify-content:center;gap:var(--sp-lg);margin-bottom:var(--sp-sm)}
        .site-footer__link{font-family:var(--f-mono);font-size:11px;letter-spacing:2px;text-transform:uppercase;color:var(--c-muted);text-decoration:none}
        .site-footer__link:hover{color:var(--c-on-dark)}
        .site-footer div{font-family:var(--f-body);font-size:14px;color:var(--c-muted);margin-top:var(--sp-xs)}
        .site-footer__legal{font-family:var(--f-mono);font-size:10px;letter-spacing:1px;color:var(--c-muted-soft);margin-top:var(--sp-xs)}

        /* ── SECTION DIVIDER ── */
        .section-divider{border:none;border-top:1px solid var(--c-hairline);margin:var(--sp-xl) 0}

        /* ── BADGE ── */
        .badge{display:inline-flex;align-items:center;font-family:var(--f-mono);font-size:11px;font-weight:400;letter-spacing:2px;text-transform:uppercase;padding:4px 12px;border-radius:var(--r-none)}
        .badge-year{border:1px solid var(--c-hairline-strong);color:var(--c-muted)}

        /* ── MOBILE NAV ── */
        .mobile-nav{display:none;position:fixed;inset:0;background:rgba(0,0,0,.95);z-index:400;flex-direction:column;align-items:center;justify-content:center;gap:var(--sp-xxl)}
        .mobile-nav.is-open{display:flex}
        .mobile-nav__link{font-family:var(--f-display);font-size:32px;font-weight:400;letter-spacing:2px;text-transform:uppercase;color:var(--c-on-dark);text-decoration:none}
        .mobile-nav__close{position:absolute;top:20px;right:20px;font-size:24px;color:var(--c-on-dark);background:none;border:none;cursor:pointer}

        /* ── RESPONSIVE ── */
        @media(max-width:1068px){
            .tile__headline{font-size:48px;letter-spacing:3px}
            .book-grid{grid-template-columns:repeat(3,1fr)}
        }
        @media(max-width:833px){
            .global-nav__links{display:none}
            .global-nav__hamburger{display:flex}
            .tile__headline{font-size:32px;letter-spacing:2px}
            .page-title{font-size:32px;letter-spacing:2px}
            .tile__sub{font-size:16px}
            .book-grid{grid-template-columns:repeat(2,1fr)}
            .stats-row{grid-template-columns:repeat(2,1fr)}
        }
        @media(max-width:640px){
            .tile__headline{font-size:24px;letter-spacing:1.5px}
            .tile__sub{font-size:15px}
            .page-title{font-size:24px;letter-spacing:1.5px}
            .auth-title{font-size:32px;letter-spacing:2px}
            .auth-card{padding:var(--sp-xl) var(--sp-lg)}
            .card{padding:var(--sp-md)}
            .book-grid{grid-template-columns:1fr}
            .stats-row{grid-template-columns:1fr}
            .page-header{flex-direction:column;align-items:flex-start}
        }
    </style>
</head>
<body>
    <!-- Mobile Nav Overlay -->
    <nav class="mobile-nav" id="mobileNav" role="dialog" aria-modal="true" aria-label="Menu navigasi">
        <button class="mobile-nav__close" onclick="closeMobileNav()" aria-label="Tutup menu">✕</button>
        <a href="/dashboard" class="mobile-nav__link" onclick="closeMobileNav()">Dashboard</a>
        <a href="/buku" class="mobile-nav__link" onclick="closeMobileNav()">Buku</a>
        <a href="/logout" class="mobile-nav__link" onclick="closeMobileNav()">Logout</a>
    </nav>

    <?= $this->renderSection('content') ?>

    <script>
        function openMobileNav()  { document.getElementById('mobileNav').classList.add('is-open');    document.body.style.overflow = 'hidden'; }
        function closeMobileNav() { document.getElementById('mobileNav').classList.remove('is-open'); document.body.style.overflow = ''; }
        document.addEventListener('keydown', e => { if (e.key === 'Escape') closeMobileNav(); });
    </script>
</body>
</html>
