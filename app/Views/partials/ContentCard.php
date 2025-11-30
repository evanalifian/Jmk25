<div class="flex flex-col p-5 border-b border-mainGray hover:bg-mainGray/5 transition-colors">

  <div class="flex items-center gap-3 mb-2">
    <?php 
      $fotoDb = $profileUser['user_pict'] ?? '';
      if (empty($fotoDb) || $fotoDb === 'default.jpg') {
          $srcGambar = '/assets/default.png';
      } else {
          $srcGambar = '/assets/' . htmlspecialchars($fotoDb);
      }
    ?>
    <div class="w-10 h-10 rounded-full bg-gray-300 overflow-hidden shrink-0">
      <img src="<?= $srcGambar; ?>" class="w-full h-full object-cover scale-150" alt="Foto Profil">
    </div>

    <div class="flex flex-col leading-tight">
      <button onclick="window.location.href='/<?= htmlspecialchars($post['username']); ?>'" class=" flex items-center
        gap-1">
        <p class="font-bold text-mainText text-sm hover:underline cursor-pointer">
          <?= htmlspecialchars($post['user_display'] ?? $post['username']); ?>
        </p>
      </button>
      <div class="flex items-center gap-1 text-xs text-gray-500">
        <p>@<?= strtolower(htmlspecialchars($post['username'])); ?></p>
        <span class="text-[10px]">•</span>
        <p class="hover:underline cursor-pointer">
          <?= strtolower(htmlspecialchars($post['upload_created_at'])); ?>
        </p>
      </div>
    </div>
    <div class="flex-grow"></div>
    <?php require __DIR__ . '/FollowButton.php'; ?>
  </div>

  <p class="text-mainText text-[15px] mb-3 leading-relaxed whitespace-pre-line ">
    <?= htmlspecialchars($post['upload_caption']) ?>
  </p>

  <div class="rounded-2xl overflow-hidden border border-mainGray bg-black/5">
    <img src="<?= htmlspecialchars($post['foto_img_url']) ?>" alt="Meme"
      onclick="openImageModal('<?= htmlspecialchars($post['foto_img_url']) ?>')"
      class="w-full h-auto max-h-[600px] object-contain hover:opacity-95 transition-opacity cursor-pointer">
  </div>

  <?php require __DIR__ . '/Interact.php'; ?>

</div>