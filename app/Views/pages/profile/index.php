<?php 
    $profileUser = $model["dataProfile"]; 
    $postUser = $model["dataPost"]; 
?>
<main class="max-w-2xl mx-auto min-h-screen flex flex-col">

  <div class="sticky top-0 z-50 shrink-0 backdrop-blur-md">
    <?php require_once __DIR__ . '/../../partials/MainHeader.php'; ?>
  </div>

  <div class="flex-1 mt-2 bg-secondBg rounded-t-[2.5rem] relative shadow-[inner_0_10px_20px_rgba(0,0,0,0.05)] pb-10">

    <div class="flex flex-col min-h-full">
      <div class="pt-8 pb-2 flex flex-col">
        <?php if ($profileUser): ?>
        <div class="flex gap-5 px-6">

          <div
            class="w-20 h-20 rounded-full bg-gray-800 border-2 border-mainGray shrink-0 overflow-hidden flex justify-center items-center">
            <?php 
              $fotoDb = $profileUser['user_pict'] ?? '';
              if (empty($fotoDb) || $fotoDb === 'default.jpg') {
                  $srcGambar = '/assets/default.png';
              } else {
                  $srcGambar = '/assets/' . htmlspecialchars($fotoDb);
              }
            ?>
            <img src="<?= $srcGambar; ?>" class="w-full h-full object-cover scale-150" alt="Profile Pict">
          </div>
          <div>
            <a href="/user/edit">gas edit</a>
          </div>
          <div class="flex-1 flex flex-col">

            <div class="flex justify-between items-start">
              <div>
                <h2 class="text-xl font-bold text-mainText leading-tight">
                  <?= htmlspecialchars($profileUser['user_display']) ?>
                </h2>
                <p class="text-sm text-mainGray">@<?= htmlspecialchars($profileUser['username']) ?></p>
              </div>

              <button class="p-1 rounded-full hover:bg-mainGray/10 text-mainText transition-colors">
                <ion-icon name="settings-outline" class="text-xl"></ion-icon>
              </button>
            </div>

            <p class="mt-2 text-[13px] text-mainText leading-snug">
              <?= htmlspecialchars($profileUser['user_bio'] ?? '-') ?>
            </p>

            <div class="flex gap-5 mt-3 text-xs text-mainText font-medium">
              <div class="cursor-pointer hover:underline flex gap-1">
                <span class="font-bold"><?= count($postUser) ?></span>
                <span class="opacity-60">Post</span>
              </div>
              <div class="cursor-pointer hover:underline flex gap-1">
                <span class="font-bold"><?= $profileUser['total_following'] ?? 0; ?></span>
                <span class="opacity-60">Following</span>
              </div>
              <div class="cursor-pointer hover:underline flex gap-1">
                <span class="font-bold"><?= $profileUser['total_followers'] ?? 0; ?></span>
                <span class="opacity-60">Followers</span>
              </div>
            </div>

          </div>
        </div>
        <?php endif; ?>

        <div class="flex w-full border-b border-mainGray mt-6">
          <div
            class="flex-1 py-3 flex justify-center items-center cursor-pointer border-b-2 border-mainText transition-colors hover:bg-mainGray/5">
          </div>

        </div>

        <div class="pb-20 flex flex-col">

          <?php if ($postUser): ?>

          <?php foreach ($model["data"] as $post): ?>

          <?php require __DIR__ . '/../../partials/ContentCard.php'; ?>

          <?php endforeach; ?>

          <?php else: ?>

          <div class="py-20 text-center text-mainText/50 flex flex-col items-center">
            <ion-icon name="images-outline" class="text-5xl mb-4 opacity-50"></ion-icon>
            <p>Belum ada meme.</p>
          </div>

          <?php endif; ?>

        </div>

      </div>
    </div> <?php require_once __DIR__ . '/../../partials/ImageModal.php'; ?>

</main>