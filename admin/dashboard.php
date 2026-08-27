<?php
require '../includes/auth.php';
require '../includes/db.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $slogan     = trim($_POST['slogan'] ?? '');
  $profil     = $_POST['profil'] ?? '';
  $visi       = $_POST['visi'] ?? '';
  $misi       = $_POST['misi'] ?? '';
  $keunggulan = $_POST['keunggulan'] ?? '';

  $stmt = $pdo->query("SELECT hero_image FROM content WHERE id=1");
  $current = $stmt->fetch();
  $hero_image = $current['hero_image'];

  if (isset($_FILES['hero_image']) && $_FILES['hero_image']['error'] === UPLOAD_ERR_OK) {
    $allowed = ['image/jpeg', 'image/png', 'image/webp'];
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $_FILES['hero_image']['tmp_name']);
    finfo_close($finfo);

    if (in_array($mime, $allowed) && $_FILES['hero_image']['size'] <= 3 * 1024 * 1024) {
      $ext = pathinfo($_FILES['hero_image']['name'], PATHINFO_EXTENSION);
      $newName = 'hero_' . time() . '.' . $ext;
      if (move_uploaded_file($_FILES['hero_image']['tmp_name'], '../uploads/' . $newName)) {
        if ($hero_image && file_exists('../uploads/' . $hero_image)) {
          unlink('../uploads/' . $hero_image);
        }
        $hero_image = $newName;
      }
    } else {
      $message = 'Upload gagal: format/ukuran tidak valid (max 3MB, jpg/png/webp)';
    }
  }

  $stmt = $pdo->prepare("UPDATE content SET
        slogan = ?, profil = ?, visi = ?, misi = ?, keunggulan = ?, hero_image = ?
        WHERE id = 1");
  $stmt->execute([$slogan, $profil, $visi, $misi, $keunggulan, $hero_image]);

  $message = $message ?: 'Konten berhasil diupdate';
}

$stmt = $pdo->query("SELECT * FROM content WHERE id=1");
$data = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
  <link href="/assets/style.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:wght@700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/@phosphor-icons/web@2.1.1/src/regular/style.css">
  <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">
  <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
  <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
</head>

<body class="antialiased min-h-screen flex flex-col" style="background:var(--color-paper);">

  <?php include __DIR__ . '/../includes/admin-header.php'; ?>

  <main class="flex-1 max-w-3xl mx-auto px-5 py-8 w-full">

    <div class="flex items-center justify-between mb-6">
      <span class="eyebrow">Dashboard Konten</span>
      <a href="logout.php" class="text-xs font-semibold uppercase tracking-wide" style="color:var(--color-ink-soft);">Logout</a>
    </div>

    <?php if ($message): ?>
      <div class="mb-6 px-4 py-3 text-sm font-medium border" style="border-color:var(--color-accent); background:var(--color-accent-soft); color:var(--color-accent);">
        <?= htmlspecialchars($message) ?>
      </div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data" id="content-form" class="space-y-8">

      <div>
        <label class="eyebrow block mb-2">Foto Hero</label>
        <?php if ($data['hero_image']): ?>
          <img src="/uploads/<?= htmlspecialchars($data['hero_image']) ?>" class="w-full max-w-xs border mb-3" style="border-color:var(--color-line);">
        <?php endif; ?>
        <input type="file" name="hero_image" accept="image/jpeg,image/png,image/webp"
          class="block w-full text-sm border p-2" style="border-color:var(--color-line);">
        <p class="text-xs mt-1" style="color:var(--color-ink-faint);">Max 3MB — jpg/png/webp</p>
      </div>

      <div>
        <label class="eyebrow block mb-2">Slogan</label>
        <input type="text" name="slogan" value="<?= htmlspecialchars($data['slogan']) ?>"
          class="block w-full px-3 py-2.5 border text-base" style="border-color:var(--color-line);">
      </div>

      <?php
      $fields = [
        'profil' => 'Profil Sekolah',
        'visi' => 'Visi',
        'misi' => 'Misi',
        'keunggulan' => 'Keunggulan',
      ];
      foreach ($fields as $key => $label):
      ?>
        <div>
          <label class="eyebrow block mb-2"><?= $label ?></label>
          <div id="editor-<?= $key ?>" class="quill-editor" style="background:#fff; border-color:var(--color-line);"><?= $data[$key] ?></div>
          <input type="hidden" name="<?= $key ?>" id="input-<?= $key ?>">
        </div>
      <?php endforeach; ?>

      <button type="submit" class="btn-solid w-full sm:w-auto">Simpan Perubahan</button>
    </form>

  </main>

  <?php include __DIR__ . '/../includes/admin-footer.php'; ?>

  <style>
    .quill-editor {
      border: 1px solid var(--color-line);
      min-height: 140px;
      font-family: var(--font-body);
    }

    .ql-toolbar.ql-snow {
      border-color: var(--color-line) !important;
      background: var(--color-accent-soft);
    }

    .ql-container.ql-snow {
      border-color: var(--color-line) !important;
      font-size: 14px;
    }

    .ql-editor {
      min-height: 120px;
    }
  </style>

  <script>
    const fields = ['profil', 'visi', 'misi', 'keunggulan'];
    const editors = {};

    fields.forEach(key => {
      editors[key] = new Quill('#editor-' + key, {
        theme: 'snow',
        modules: {
          toolbar: [
            ['bold', 'italic', 'underline'],
            [{
              list: 'ordered'
            }, {
              list: 'bullet'
            }],
            ['clean']
          ]
        }
      });
    });

    document.getElementById('content-form').addEventListener('submit', () => {
      fields.forEach(key => {
        document.getElementById('input-' + key).value = editors[key].root.innerHTML;
      });
    });
  </script>

</body>

</html>