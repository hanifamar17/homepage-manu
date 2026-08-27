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
  <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:ital,opsz,wght@0,8..60,400;0,8..60,600;0,8..60,700;0,8..60,800;1,8..60,400;1,8..60,600&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">

  <style>
    .content-body {
      font-size: 0.9375rem;
      line-height: 1.7;
      color: var(--color-ink-soft);
    }

    .content-body p {
      margin: 0.5rem 0;
      text-align: justify;
      text-justify: inter-word;
    }

    .content-body p:first-child {
      margin-top: 0;
    }

    .content-body p:last-child {
      margin-bottom: 0;
    }

    .content-body ul,
    .content-body ol {
      margin: 0.5rem 0;
      padding-left: 1.35rem;
    }

    .content-body ul {
      list-style-type: disc;
    }

    .content-body ol {
      list-style-type: decimal;
      padding-left: 1.5rem;
    }

    .content-body li {
      margin: 0.4rem 0;
      padding-left: 0.15rem;
      text-align: justify;
      text-justify: inter-word;
    }

    .content-body li::marker {
      color: inherit;
      font-weight: 400;
    }

    .content-body li>ul,
    .content-body li>ol {
      margin: 0.25rem 0;
    }

    .display-xl {
      font-family: "Source Serif 4", Georgia, serif;
      font-weight: 700;
      letter-spacing: -0.03em;
      line-height: 1.1;
    }

    .display-italic {
      font-family: "Source Serif 4", Georgia, serif;
      font-style: italic;
      font-weight: 600;
      letter-spacing: -0.015em;
    }

    .section-num {
      font-family: "JetBrains Mono", ui-monospace, monospace;
      font-size: 0.68rem;
      font-weight: 500;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: var(--color-accent);
    }

    .section-title {
      font-family: "Source Serif 4", Georgia, serif;
      font-weight: 700;
      letter-spacing: -0.025em;
      line-height: 1.18;
      color: var(--color-ink);
    }

    .body-text {
      font-size: 0.9375rem;
      /* 15px */
      line-height: 1.7;
      color: var(--color-ink-soft);
    }
  </style>
</head>

<body class="antialiased min-h-screen flex flex-col" id="top">

  <!-- NAV -->
  <nav class="border-b sticky top-0 z-30" style="border-color:var(--color-line); background:var(--color-paper);">
    <div class="max-w-5xl mx-auto px-5 md:px-6 h-16 flex items-center justify-between">
      <a href="#top" class="flex items-center gap-2.5 shrink-0">
        <img src="/assets/logo.png" alt="Logo Sekolah" class="h-8 w-auto">
        <span class="font-bold text-[15px]" style="color:var(--color-ink);">manu</span>
      </a>
      <div class="hidden md:flex items-center gap-1 text-[10px] font-semibold uppercase tracking-wide" style="color:var(--color-ink-soft);">
        <a href="#top" class="px-3 py-2 transition-colors duration-150 hover:text-[var(--color-accent)] hover:bg-[var(--color-accent-soft)] active:scale-[0.98] active:bg-[var(--color-ink)] active:text-white">Beranda</a>
        <a href="#profil" class="px-3 py-2 transition-colors duration-150 hover:text-[var(--color-accent)] hover:bg-[var(--color-accent-soft)] active:scale-[0.98] active:bg-[var(--color-ink)] active:text-white">Profil</a>
        <a href="https://alumni.manu.sch.id" target="_blank" rel="noopener noreferrer" class="px-3 py-2 transition-colors duration-150 hover:text-[var(--color-accent)] hover:bg-[var(--color-accent-soft)] active:scale-[0.98] active:bg-[var(--color-ink)] active:text-white">Alumni</a>
        <a href="https://e-manu.vercel.app" target="_blank" rel="noopener noreferrer" class="px-3 py-2 transition-colors duration-150 hover:text-[var(--color-accent)] hover:bg-[var(--color-accent-soft)] active:scale-[0.98] active:bg-[var(--color-ink)] active:text-white">Repository</a>
        <a href="#pendaftaran" class="px-3 py-2 transition-colors duration-150 hover:text-[var(--color-accent)] hover:bg-[var(--color-accent-soft)] active:scale-[0.98] active:bg-[var(--color-ink)] active:text-white">Pendaftaran</a>
        <a href="#kontak" class="px-3 py-2 transition-colors duration-150 hover:text-[var(--color-accent)] hover:bg-[var(--color-accent-soft)] active:scale-[0.98] active:bg-[var(--color-ink)] active:text-white">Kontak</a>
      </div>
      <button id="nav-toggle" class="md:hidden flex items-center justify-center w-11 h-11 -mr-2" aria-label="Buka menu" aria-expanded="false">
        <span class="mono text-xs font-bold" style="color:var(--color-ink);">MENU</span>
      </button>
    </div>
    <!-- Mobile panel -->
    <div id="nav-panel" data-state="closed" class="md:hidden border-t overflow-hidden transition-[max-height] duration-200 ease-out" style="border-color:var(--color-line); max-height:0;">
      <nav class="px-5 py-3 flex flex-col">
        <a href="#top" class="nav-link py-3.5 text-[13px] font-medium border-b" style="color:var(--color-ink); border-color:var(--color-line);">
          Beranda
        </a>
        <a href="#profil" class="nav-link py-3.5 text-[13px] font-medium border-b" style="color:var(--color-ink); border-color:var(--color-line);">
          Profil
        </a>
        <a href="https://alumni.manu.sch.id" target="_blank" rel="noopener" class="nav-link py-3.5 text-[13px] font-medium border-b" style="color:var(--color-ink); border-color:var(--color-line);">
          Alumni
        </a>
        <a href="https://e-manu.vercel.app" target="_blank" rel="noopener" class="nav-link py-3.5 text-[13px] font-medium border-b" style="color:var(--color-ink); border-color:var(--color-line);">
          Repository
        </a>
        <a href="#pendaftaran" class="nav-link py-3.5 text-[13px] font-medium border-b" style="color:var(--color-ink); border-color:var(--color-line);">
          Pendaftaran
        </a>
        <a href="#kontak" class="nav-link py-3.5 text-[13px] font-medium" style="color:var(--color-ink);">
          Kontak
        </a>
      </nav>
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
            style="background: linear-gradient(100deg, rgba(31,28,25,0.90) 20%, rgba(31,28,25,0.58) 45%, rgba(31,28,25,0.12) 75%), linear-gradient(0deg, rgba(31,28,25,0.55) 0%, transparent 28%);">
          </div>

          <div class="relative h-full max-w-5xl mx-auto px-8 md:px-16 flex flex-col justify-center">
            <!-- Nama sekolah — lembut, mono, tracking lebar -->
            <p class="font-mono text-[11px] md:text-[12px] font-medium tracking-[0.18em]"
              style="color: #e8d9c8;">
              MA Nurul Ummah Yogyakarta
            </p>

            <!-- Slogan — besar, 2 baris, display serif -->
            <h1 class="mt-3 md:mt-4 font-display font-bold text-white leading-[1.05] tracking-tight
                   text-[2.15rem] sm:text-[2.5rem] md:text-[3.25rem] lg:text-[3.5rem]
                   max-w-[14ch] md:max-w-[13ch]">
              <?= htmlspecialchars($data['slogan'] ?: 'Style Locally, Think Globally') ?>
            </h1>

            <a href="https://wa.me/6285725655593?text=Assalamu%27alaikum%2C%0AHai%20tim%20admisi%20MA%20Nurul%20Ummah%0ANama%20siswa%20%3A%20%0AJenis%20kelamin%20%3A%20%0ADomisili%20%3A%20%0APesan%20%3A%20Saya%20buty%20informasi%20seputar%20pendaftaran%20MA%20Nurul%20Ummah"
              target="_blank" rel="noopener noreferrer"
              class="btn-solid mt-7 md:mt-8 w-fit">
              Daftar Sekarang →
            </a>
          </div>
        </div>
      <?php else: ?>
        <div class="py-16 md:py-20">
          <p class="font-mono text-[11px] md:text-[12px] font-medium tracking-[0.18em] uppercase accent">
            MA Nurul Ummah Yogyakarta
          </p>
          <h1 class="mt-3 md:mt-4 font-display font-bold leading-[1.05] tracking-tight
                 text-[2.15rem] sm:text-[2.5rem] md:text-[3.25rem]
                 max-w-[14ch] md:max-w-[13ch]"
            style="color: var(--color-ink);">
            <?= htmlspecialchars($data['slogan'] ?: 'Style Locally, Think Globally') ?>
          </h1>
          <a href="#pendaftaran" class="btn-solid mt-7">Daftar Sekarang →</a>
        </div>
      <?php endif; ?>
    </section>

    <!-- Profil -->
    <section id="profil" class="pt-10 pb-9 md:pt-12 md:pb-11 border-t scroll-mt-20" style="border-color:var(--color-line);">
      <span class="section-num">Profil</span>
      <h2 class="section-title text-[1.65rem] md:text-[1.85rem] mt-2 mb-5 max-w-2xl">
        Madrasah yang tumbuh dari pesantren,<br>
        <span class="display-italic" style="color:var(--color-accent);">berpikir untuk dunia.</span>
      </h2>
      <div class="grid md:grid-cols-12 gap-6 md:gap-10">
        <div class="md:col-span-8 body-text content-body">
          <?php renderContent($data['profil']); ?>
        </div>
        <div class="md:col-span-4">
          <div class="border px-4 py-4 h-fit" style="border-color:var(--color-line); background:var(--color-accent-soft);">
            <p class="mono text-[10.5px] tracking-wider mb-2" style="color:var(--color-accent);">SEJAK 2002 · KOTAGEDE</p>
            <p class="text-[13.5px] leading-snug" style="color:var(--color-ink-soft);">
              Oleh KH Asyhari Marzuqi, putera dari KH Ahmad Marzuqi Giriloyo.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!--Visi & Misi -->
    <section id="visi-misi" class="pt-10 pb-9 md:pt-12 md:pb-11 border-t scroll-mt-20" style="border-color:var(--color-line);">
      <span class="section-num">Visi & Misi</span>
      <h2 class="section-title text-[1.65rem] md:text-[1.85rem] mt-2 mb-6 max-w-lg">
        Satu arah.<br>
        <span class="display-italic" style="color:var(--color-accent);">Beberapa langkah.</span>
      </h2>
      <div class="grid md:grid-cols-2 gap-8 md:gap-12">
        <div>
          <p class="mono text-[10.5px] tracking-wider mb-2" style="color:var(--color-accent);">VISI</p>
          <div class="body-text content-body">
            <?php renderContent($data['visi']); ?>
          </div>
        </div>
        <div>
          <p class="mono text-[10.5px] tracking-wider mb-2" style="color:var(--color-accent);">MISI</p>
          <div class="body-text content-body">
            <?php renderContent($data['misi']); ?>
          </div>
        </div>
      </div>
    </section>

    <!--Keunggulan -->
    <section id="keunggulan" class="pt-10 pb-9 md:pt-12 md:pb-11 border-t scroll-mt-20" style="border-color:var(--color-line);">
      <span class="section-num">Keunggulan</span>
      <h2 class="section-title text-[1.65rem] md:text-[1.85rem] mt-2 mb-5 max-w-xl">
        Yang kami jaga,<br>
        <span class="display-italic" style="color:var(--color-accent);">bukan hanya nilai rapor.</span>
      </h2>
      <div class="body-text content-body max-w-3xl">
        <?php renderContent($data['keunggulan']); ?>
      </div>
    </section>

    <!--Pendaftaran -->
    <section id="pendaftaran" class="pt-10 pb-9 md:pt-12 md:pb-11 border-t scroll-mt-20" style="border-color:var(--color-line);">
      <span class="section-num">Pendaftaran</span>

      <div class="mt-2 grid md:grid-cols-12 gap-6 md:gap-8 items-end">
        <!-- Kiri: judul + deskripsi -->
        <div class="md:col-span-6">
          <h2 class="section-title text-[1.65rem] md:text-[1.85rem] mb-3">
            Satu pesan.<br>
            <span class="display-italic" style="color:var(--color-accent);">Tim admisi siap menjawab.</span>
          </h2>
          <p class="body-text max-w-sm">
            Hubungi kami langsung via WhatsApp untuk informasi pendaftaran siswa baru.
          </p>
        </div>

        <!-- Kanan: tombol + microcopy -->
        <div class="md:col-span-6 md:flex md:justify-end">
          <div class="flex flex-col items-start md:items-end gap-3">
            <a href="https://wa.me/6285725655593?text=Assalamu%27alaikum%2C%0AHai%20tim%20admisi%20MA%20Nurul%20Ummah%0ANama%20siswa%20%3A%20%0AJenis%20kelamin%20%3A%20%0ADomisili%20%3A%20%0APesan%20%3A%20Saya%20buty%20informasi%20seputar%20pendaftaran%20MA%20Nurul%20Ummah"
              target="_blank" rel="noopener noreferrer" class="btn-solid">
              Daftar via WhatsApp →
            </a>
            <p class="mono text-[11px] tracking-wide leading-snug md:text-right" style="color:var(--color-ink-soft);">
              Tim Admisi MA Nurul Ummah<br>
              Yogyakarta
            </p>
          </div>
        </div>
      </div>
    </section>

    <!--Kontak -->
    <section id="kontak" class="pt-10 pb-11 md:pt-12 md:pb-14 border-t scroll-mt-20" style="border-color:var(--color-line);">
      <span class="section-num">Kontak & Lokasi</span>
      <h2 class="section-title text-[1.65rem] md:text-[1.85rem] mt-2 mb-6 max-w-sm">
        Datang, atau<br>
        <span class="display-italic" style="color:var(--color-accent);">simpan saja dulu.</span>
      </h2>
      <div class="grid md:grid-cols-2 gap-7 md:gap-10">
        <div class="space-y-4 body-text">
          <div>
            <p class="mono text-[10.5px] tracking-wider mb-1" style="color:var(--color-accent);">ALAMAT</p>
            <p class="leading-snug">Jl. Raden Ronggo No.982, Prenggan, Kec. Kotagede, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55172</p>
          </div>
          <div>
            <p class="mono text-[10.5px] tracking-wider mb-1" style="color:var(--color-accent);">TELEPON</p>
            <p>0896 0314 4981</p>
          </div>
          <div>
            <p class="mono text-[10.5px] tracking-wider mb-1" style="color:var(--color-accent);">EMAIL</p>
            <p>
              <a href="mailto:manukotagede@gmail.com" class="underline decoration-[var(--color-line)] underline-offset-2 hover:text-[var(--color-accent)] transition-colors">
                manukotagede@gmail.com
              </a>
            </p>
          </div>
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
        <a href="https://www.instagram.com/ma_nurulummah" target="_blank" rel="noopener noreferrer"
          class="flex items-center gap-1.5 text-xs opacity-80 hover:opacity-100 transition-opacity">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 256 256" aria-hidden="true">
            <path d="M128,80a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160ZM176,24H80A56.06,56.06,0,0,0,24,80v96a56.06,56.06,0,0,0,56,56h96a56.06,56.06,0,0,0,56-56V80A56.06,56.06,0,0,0,176,24Zm40,152a40,40,0,0,1-40,40H80a40,40,0,0,1-40-40V80A40,40,0,0,1,80,40h96a40,40,0,0,1,40,40ZM192,76a12,12,0,1,1-12-12A12,12,0,0,1,192,76Z" />
          </svg>
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