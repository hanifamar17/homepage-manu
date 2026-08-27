<?php
session_start();
require '../includes/db.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username'] ?? '');
  $password = $_POST['password'] ?? '';

  $stmt = $pdo->prepare("SELECT * FROM admin WHERE username = ?");
  $stmt->execute([$username]);
  $admin = $stmt->fetch();

  if ($admin && password_verify($password, $admin['password'])) {
    session_regenerate_id(true);
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['admin_id'] = $admin['id'];
    header('Location: dashboard.php');
    exit;
  } else {
    $error = 'Username atau password salah';
  }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin</title>
  <link href="/assets/style.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/@phosphor-icons/web@2.1.1/src/regular/style.css">
  <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">
  <style>
    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus {
      -webkit-text-fill-color: var(--color-ink) !important;
      -webkit-box-shadow: 0 0 0px 1000px transparent inset !important;
      transition: background-color 5000s ease-in-out 0s;
    }
  </style>
</head>

<body class="antialiased min-h-screen flex flex-col" style="background:var(--color-paper); color:var(--color-ink);">

  <?php include __DIR__ . '/../includes/admin-header.php'; ?>

  <main class="flex-1 max-w-[480px] mx-auto px-5 pt-12 pb-16 w-full select-none">

    <?php if ($error): ?>
      <div class="mb-8 border-l-2 pl-3" style="border-color:var(--color-ink);" role="alert">
        <span class="block text-sm font-semibold" style="color:var(--color-ink);"><?= htmlspecialchars($error) ?></span>
      </div>
    <?php endif; ?>

    <h1 class="text-2xl font-bold tracking-tight leading-snug mt-2 mb-2.5" style="color:var(--color-ink);">
      Pintu Masuk Sistem
    </h1>
    <p class="text-sm leading-relaxed mb-2 max-w-[36ch]" style="color:var(--color-ink-soft);">
      Silakan masuk untuk mengelola konten homepage sekolah.
    </p>
    <p class="text-xs mb-9 max-w-[40ch] border-l pl-3 py-0.5" style="border-color:var(--color-line); color:var(--color-ink-faint);">
      Modul hanya dikelola tim operasional internal. Hubungi administrator untuk hak akses.
    </p>

    <form method="POST" id="loginForm" class="space-y-8">

      <div class="relative z-0 w-full group">
        <input type="text" name="username" id="floating_username" required autofocus placeholder=" "
          class="block py-2.5 px-0 w-full text-base bg-transparent border-0 border-b appearance-none focus:outline-none focus:ring-0 peer transition-colors duration-150 rounded-none"
          style="color:var(--color-ink); border-color:var(--color-line);"
          onfocus="this.style.borderColor='var(--color-ink)'" onblur="this.style.borderColor='var(--color-line)'">
        <label for="floating_username"
          class="absolute text-sm duration-150 transform -translate-y-5 scale-75 top-2.5 origin-[0] pointer-events-none peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-5 peer-focus:font-semibold"
          style="color:var(--color-ink-faint);">
          Username
        </label>
      </div>

      <div class="relative z-0 w-full group">
        <input type="password" name="password" id="floating_password" required placeholder=" "
          class="block py-2.5 px-0 w-full text-base bg-transparent border-0 border-b appearance-none focus:outline-none focus:ring-0 peer transition-colors duration-150 rounded-none"
          style="color:var(--color-ink); border-color:var(--color-line);"
          onfocus="this.style.borderColor='var(--color-ink)'" onblur="this.style.borderColor='var(--color-line)'">
        <label for="floating_password"
          class="absolute text-sm duration-150 transform -translate-y-5 scale-75 top-2.5 origin-[0] pointer-events-none peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-5 peer-focus:font-semibold"
          style="color:var(--color-ink-faint);">
          Password
        </label>
      </div>

      <div class="pt-4">
        <button id="loginBtn" type="submit"
          class="w-full flex items-center justify-center gap-2 text-[13px] font-semibold py-4 px-5 transition-all duration-150 ease-out active:scale-[0.99] cursor-pointer touch-manipulation select-none disabled:opacity-70 disabled:cursor-not-allowed"
          style="background:var(--color-ink); color:#fff;"
          onmouseover="if(!this.disabled) this.style.background='var(--color-accent)'"
          onmouseout="if(!this.disabled) this.style.background='var(--color-ink)'">
          <span id="btnText" class="flex items-center gap-1.5">Masuk &rarr;</span>
          <svg id="spinner" class="hidden w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24" style="color:var(--color-accent-soft);">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
          </svg>
        </button>
      </div>
    </form>

    <div class="flex justify-center">
      <a href="/" class="inline-flex items-center gap-1.5 mt-8 text-[13px] font-semibold no-underline transition-all duration-150 active:scale-[0.97] cursor-pointer select-none touch-manipulation"
        style="color:var(--color-ink-soft);"
        onmouseover="this.style.color='var(--color-ink)'; this.style.transform='translateX(-2px)'"
        onmouseout="this.style.color='var(--color-ink-soft)'; this.style.transform='translateX(0)'">
        &larr; Kembali ke Beranda
      </a>
    </div>

  </main>

  <?php include __DIR__ . '/../includes/admin-footer.php'; ?>

  <script>
    const form = document.getElementById('loginForm');
    const btn = document.getElementById('loginBtn');
    const btnText = document.getElementById('btnText');
    const spinner = document.getElementById('spinner');

    form.addEventListener('submit', () => {
      btn.disabled = true;
      btnText.textContent = 'Memproses...';
      spinner.classList.remove('hidden');
    });
  </script>

</body>

</html>