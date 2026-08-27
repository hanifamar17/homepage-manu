<?php
require 'includes/db.php';
require 'includes/helpers.php';

$stmt = $pdo->query("SELECT * FROM content WHERE id=1");
$data = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MA Nurul Ummah Yogyakarta</title>
  <link href="/assets/style.css" rel="stylesheet">

  <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon.png">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:opsz,wght@8..60,400;8..60,700;8..60,800&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://unpkg.com/@phosphor-icons/web@2.1.1/src/regular/style.css">
  <!-- Font Awesome untuk ikon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="antialiased min-h-screen flex flex-col" id="top">
  <style>
    .content-body ul,
    .content-body ol {
      padding-left: 1.25rem;
      margin: 0.5rem 0;
    }

    .content-body ul {
      list-style-type: disc;
    }

    .content-body ol {
      list-style-type: decimal;
    }

    .content-body p {
      margin: 0.5rem 0;
      text-align: justify;
      text-justify: inter-word;
    }

    .content-body li {
      margin: 0.25rem 0;
      text-align: justify;
      text-justify: inter-word;
    }
  </style>

  <!-- NAV -->
  <nav class="border-b sticky top-0 z-30" style="border-color:var(--color-line); background:var(--color-paper);">
    <div class="max-w-5xl mx-auto px-5 md:px-6 h-16 flex items-center justify-between">
      <a href="#top" class="flex items-center gap-2.5 shrink-0">
        <img src="/assets/logo.png" alt="Logo Sekolah" class="h-8 w-auto">
        <span class="font-bold text-[15px]" style="color:var(--color-ink);">manu</span>
      </a>

      <!-- Desktop nav -->
      <div class="hidden md:flex items-center gap-1 text-[13px] font-semibold uppercase tracking-wide" style="color:var(--color-ink-soft);">
        <a href="#top" class="px-3 py-2 transition-colors duration-150 hover:text-[var(--color-accent)] hover:bg-[var(--color-accent-soft)] active:scale-[0.98] active:bg-[var(--color-ink)] active:text-white">Beranda</a>
        <a href="#profil" class="px-3 py-2 transition-colors duration-150 hover:text-[var(--color-accent)] hover:bg-[var(--color-accent-soft)] active:scale-[0.98] active:bg-[var(--color-ink)] active:text-white">Profil</a>
        <a href="https://alumni.manu.sch.id" target="_blank" rel="noopener noreferrer" class="px-3 py-2 transition-colors duration-150 hover:text-[var(--color-accent)] hover:bg-[var(--color-accent-soft)] active:scale-[0.98] active:bg-[var(--color-ink)] active:text-white">Alumni</a>
        <a href="https://e-manu.vercel.app" target="_blank" rel="noopener noreferrer" class="px-3 py-2 transition-colors duration-150 hover:text-[var(--color-accent)] hover:bg-[var(--color-accent-soft)] active:scale-[0.98] active:bg-[var(--color-ink)] active:text-white">Repository</a>
        <a href="#pendaftaran" class="px-3 py-2 transition-colors duration-150 hover:text-[var(--color-accent)] hover:bg-[var(--color-accent-soft)] active:scale-[0.98] active:bg-[var(--color-ink)] active:text-white">Pendaftaran</a>
        <a href="#kontak" class="px-3 py-2 transition-colors duration-150 hover:text-[var(--color-accent)] hover:bg-[var(--color-accent-soft)] active:scale-[0.98] active:bg-[var(--color-ink)] active:text-white">Kontak</a>
      </div>

      <!-- Mobile toggle -->
      <button id="nav-toggle" class="md:hidden flex items-center justify-center w-11 h-11 -mr-2" aria-label="Buka menu" aria-expanded="false">
        <span class="mono text-xs font-bold" style="color:var(--color-ink);">MENU</span>
      </button>
    </div>

    <!-- Mobile panel -->
    <div id="nav-panel" data-state="closed" class="md:hidden border-t overflow-hidden transition-[max-height] duration-200 ease-out" style="border-color:var(--color-line); max-height:0;">
      <div class="idx-list mx-5">
        <a href="#top" class="idx-row nav-link"><span class="idx-num">01</span>
          <div class="flex-1">
            <h3 class="text-[15px] font-semibold" style="color:var(--color-ink);">Beranda</h3>
          </div><span class="idx-arrow">&rarr;</span>
        </a>
        <a href="#profil" class="idx-row nav-link"><span class="idx-num">02</span>
          <div class="flex-1">
            <h3 class="text-[15px] font-semibold" style="color:var(--color-ink);">Profil</h3>
          </div><span class="idx-arrow">&rarr;</span>
        </a>
        <a href="https://alumni.manu.sch.id" target="_blank" class="idx-row nav-link"><span class="idx-num">03</span>
          <div class="flex-1">
            <h3 class="text-[15px] font-semibold" style="color:var(--color-ink);">Alumni</h3>
          </div><span class="idx-arrow">&rarr;</span>
        </a>
        <a href="https://e-manu.vercel.app" target="_blank" class="idx-row nav-link"><span class="idx-num">04</span>
          <div class="flex-1">
            <h3 class="text-[15px] font-semibold" style="color:var(--color-ink);">Repository</h3>
          </div><span class="idx-arrow">&rarr;</span>
        </a>
        <a href="#pendaftaran" class="idx-row nav-link"><span class="idx-num">05</span>
          <div class="flex-1">
            <h3 class="text-[15px] font-semibold" style="color:var(--color-ink);">Pendaftaran</h3>
          </div><span class="idx-arrow">&rarr;</span>
        </a>
        <a href="#kontak" class="idx-row nav-link"><span class="idx-num">06</span>
          <div class="flex-1">
            <h3 class="text-[15px] font-semibold" style="color:var(--color-ink);">Kontak</h3>
          </div><span class="idx-arrow">&rarr;</span>
        </a>
      </div>
    </div>
  </nav>

  <main class="flex-1 max-w-5xl mx-auto px-5 md:px-6 w-full">

    <!-- HERO -->
    <section class="relative -mx-5 md:-mx-6 overflow-hidden">
      <?php if ($data['hero_image']): ?>
        <div class="relative h-[420px] md:h-[520px]">
          <img src="/uploads/<?= htmlspecialchars($data['hero_image']) ?>" alt="Hero"
            class="absolute inset-0 w-full h-full object-cover">
          <div class="absolute inset-0"
            style="background: linear-gradient(90deg, rgba(31,28,25,0.88) 0%, rgba(31,28,25,0.55) 45%, rgba(31,28,25,0.05) 75%), linear-gradient(0deg, rgba(31,28,25,0.6) 0%, transparent 30%);">
          </div>
          <div class="relative h-full max-w-5xl mx-auto px-5 md:px-6 flex flex-col justify-center">
            <span class="eyebrow" style="color:#f3e6dc;">MA Nurul Ummah Yogyakarta</span>
            <h1 class="display mt-3 text-3xl md:text-5xl font-bold leading-tight text-white max-w-lg">
              <?= htmlspecialchars($data['slogan'] ?: 'Slogan sekolah di sini') ?>
            </h1>
            <a href="https://wa.me/6285725655593?text=Assalamu%27alaikum%2C%0AHai%20tim%20admisi%20MA%20Nurul%20Ummah%0ANama%20siswa%20%3A%20%0AJenis%20kelamin%20%3A%20%0ADomisili%20%3A%20%0APesan%20%3A%20Saya%20ingin%20informasi%20seputar%20pendaftaran%20MA%20Nurul%20Ummah"
              target="_blank" rel="noopener noreferrer" class="btn-solid mt-6 w-fit">
              Daftar Sekarang &rarr;
            </a>
          </div>
        </div>
      <?php else: ?>
        <div class="py-14">
          <span class="eyebrow accent">Sekolah Kita</span>
          <h1 class="display mt-3 text-3xl md:text-5xl font-bold leading-tight" style="color:var(--color-ink);">
            <?= htmlspecialchars($data['slogan'] ?: 'Slogan sekolah di sini') ?>
          </h1>
          <a href="#pendaftaran" class="btn-solid mt-6">Daftar Sekarang &rarr;</a>
        </div>
      <?php endif; ?>
    </section>

    <!-- ROW 1: PROFIL (kiri) + VISI-MISI (kanan) -->
    <div class="grid md:grid-cols-2 gap-10 py-10 border-t scroll-mt-20" style="border-color:var(--color-line);">

      <section id="profil">
        <div class="flex items-baseline gap-3 mb-3">
          <span class="mono text-xs font-bold" style="color:var(--color-accent);">01</span>
          <span class="eyebrow">Profil Sekolah</span>
        </div>
        <div class="text-sm leading-relaxed content-body" style="color:var(--color-ink-soft);">
          <?php renderContent($data['profil']); ?>
        </div>
      </section>

      <div id="visi-misi" class="space-y-6">
        <section>
          <div class="flex items-baseline gap-3 mb-3">
            <span class="mono text-xs font-bold" style="color:var(--color-accent);">02</span>
            <span class="eyebrow">Visi & Misi</span>
          </div>
          <div class="flex items-baseline gap-3 mb-3">
            <span class="eyebrow">Visi</span>
          </div>
          <div class="text-sm leading-relaxed content-body" style="color:var(--color-ink-soft);">
            <?php renderContent($data['visi']); ?>
          </div>
        </section>
        <section>
          <div class="flex items-baseline gap-3 mb-3">
            <span class="eyebrow">Misi</span>
          </div>
          <div class="text-sm leading-relaxed content-body" style="color:var(--color-ink-soft);">
            <?php renderContent($data['misi']); ?>
          </div>
        </section>
      </div>

    </div>

    <!-- ROW 2: KEUNGGULAN (kiri) + PENDAFTARAN (kanan) -->
    <div class="grid md:grid-cols-2 gap-10 py-10 border-t scroll-mt-20" style="border-color:var(--color-line);">

      <section id="keunggulan">
        <div class="flex items-baseline gap-3 mb-3">
          <span class="mono text-xs font-bold" style="color:var(--color-accent);">03</span>
          <span class="eyebrow">Keunggulan</span>
        </div>
        <div class="text-sm leading-relaxed content-body" style="color:var(--color-ink-soft);">
          <?php renderContent($data['keunggulan']); ?>
        </div>
      </section>

      <section id="pendaftaran">
        <div class="flex items-baseline gap-3 mb-3">
          <span class="mono text-xs font-bold" style="color:var(--color-accent);">04</span>
          <span class="eyebrow">Pendaftaran</span>
        </div>
        <p class="text-sm leading-relaxed mb-5" style="color:var(--color-ink-soft);">
          Hubungi tim admisi kami langsung via WhatsApp untuk informasi pendaftaran siswa baru.
        </p>
        <a href="https://wa.me/6285725655593?text=Assalamu%27alaikum%2C%0AHai%20tim%20admisi%20MA%20Nurul%20Ummah%0ANama%20siswa%20%3A%20%0AJenis%20kelamin%20%3A%20%0ADomisili%20%3A%20%0APesan%20%3A%20Saya%20ingin%20informasi%20seputar%20pendaftaran%20MA%20Nurul%20Ummah"
          target="_blank" rel="noopener noreferrer" class="btn-solid">
          Daftar via WhatsApp &rarr;
        </a>
      </section>

    </div>

    <!-- KONTAK + PETA -->
    <section id="kontak" class="py-10 border-t scroll-mt-20" style="border-color:var(--color-line);">
      <div class="flex items-baseline gap-3 mb-3">
        <span class="mono text-xs font-bold" style="color:var(--color-accent);">05</span>
        <span class="eyebrow">Kontak & Lokasi</span>
      </div>
      <div class="grid md:grid-cols-2 gap-6 mt-5">
        <div class="space-y-3 text-sm" style="color:var(--color-ink-soft);">
          <p><strong style="color:var(--color-ink);">Alamat:</strong> Jl. Raden Ronggo No.982, Prenggan, Kec. Kotagede, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55172</p>
          <p><strong style="color:var(--color-ink);">Telepon:</strong> 0896 0314 4981</p>
          <p><strong style="color:var(--color-ink);">Email:</strong> manukotagede@gmail.com</p>
        </div>
        <div class="border" style="border-color:var(--color-line);">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.6653120069473!2d110.39364107495933!3d-7.825203677721775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5710aba89dcb%3A0x240d67228b9fb054!2sMadrasah%20Aliyah%20Nurul%20Ummah!5e0!3m2!1sid!2sid!4v1787813958171!5m2!1sid!2sid"
            width="100%" height="260" style="border:0; display:block;"
            loading="lazy" referrerpolicy="no-referrer-when-downgrade"
            title="Lokasi Sekolah"></iframe>
        </div>
      </div>
    </section>

  </main>

  <!-- FOOTER -->
  <footer class="border-t mt-auto" style="border-color:var(--color-line); background:var(--color-ink);">
    <div class="max-w-5xl mx-auto px-6 py-5 flex flex-col sm:flex-row items-center justify-between gap-2 text-white">
      <span class="text-xs opacity-70 mono">MA Nurul Ummah Yogyakarta</span>
      <div class="flex items-center gap-4">
        <a href="https://www.instagram.com/ma_nurulummah?igsi=MTdnMWM1YjVuMm82Zw%3D%3D" target="_blank" rel="noopener noreferrer"
          class="flex items-center gap-1.5 text-xs opacity-80 hover:opacity-100 transition-opacity">
          <i class="ph ph-instagram-logo text-sm"></i>
          Instagram
        </a>
        <span class="text-xs opacity-50 mono">&copy; <span id="current-year"></span></span>
      </div>
    </div>
  </footer>

  <script>
    document.getElementById("current-year").textContent = new Date().getFullYear();
  </script>

  <script>
    const toggle = document.getElementById('nav-toggle');
    const panel = document.getElementById('nav-panel');
    let open = false;

    function setPanel(state) {
      open = state;
      panel.dataset.state = open ? 'open' : 'closed';
      panel.style.maxHeight = open ? panel.scrollHeight + 'px' : '0';
      toggle.setAttribute('aria-expanded', open);
    }

    toggle.addEventListener('click', () => setPanel(!open));
    document.querySelectorAll('.nav-link').forEach(link => {
      link.addEventListener('click', () => setPanel(false));
    });
  </script>

</body>

</html>