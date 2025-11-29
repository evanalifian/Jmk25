<main class="max-w-2xl mx-auto min-h-screen flex flex-col">

  <div class="sticky top-0 z-50 shrink-0 backdrop-blur-md">
    <?php require_once __DIR__ . '/../../partials/MainHeader.php'; ?>
  </div>

  <div class="flex-1 mt-2 bg-secondBg rounded-t-[2.5rem] relative shadow-[inner_0_10px_20px_rgba(0,0,0,0.05)] pb-10">

    <div class="pt-6 pb-20 flex flex-col">
      <?php if ($model["data"]): ?>

      <?php foreach ($model["data"] as $post): ?>

      <?php require __DIR__ . '/../../partials/ContentCard.php'; ?>

      <?php endforeach; ?>

      <?php else: ?>

      <div class="py-20 text-center text-mainText/50 flex flex-col items-center">
        <ion-icon name="images-outline" class="text-5xl mb-4 opacity-50"></ion-icon>
        <p>Belum ada meme yang tersimpan saat ini.</p>
      </div>

      <?php endif; ?>

    </div>
  </div>

  <?php require_once __DIR__ . '/../../partials/ImageModal.php'; ?>


</main>