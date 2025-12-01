<?php 

// Helper Waktu (Tetap sama, fungsi ini sudah bagus)
if (!function_exists('time_elapsed_string')) {
    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
        if ($diff->y > 0) return $diff->y . 'thn';
        if ($diff->m > 0) return $diff->m . 'bln';
        if ($diff->d >= 7) return floor($diff->d / 7) . 'mg';
        if ($diff->d > 0) return $diff->d . 'hr';
        if ($diff->h > 0) return $diff->h . 'j';
        if ($diff->i > 0) return $diff->i . 'm';
        return 'now';
    }
}

$post = $model['post'];
$comments = $model['comments'];
?>

<div
  class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/95 backdrop-blur-sm p-0 md:p-4 opacity-0 animate-fade-in">

  <div onclick="closeModal()" class="absolute inset-0 cursor-pointer" aria-label="Close Modal"></div>

  <div
    class="relative w-full max-w-6xl bg-[#09090b] border border-white/10 rounded-none md:rounded-2xl overflow-hidden flex flex-col md:flex-row h-full md:h-[90vh] shadow-[0_0_100px_rgba(0,0,0,0.8)] z-10 transition-transform duration-300 transform scale-95 animate-scale-up">

    <div
      class="w-full md:w-[65%] bg-black flex items-center justify-center relative h-[40vh] md:h-full border-b md:border-b-0 md:border-r border-white/5 group">

      <button onclick="closeModal()"
        class="absolute top-4 left-4 z-30 p-2 bg-black/40 backdrop-blur-md rounded-full text-white md:hidden border border-white/10 active:scale-90 transition-transform">
        <ion-icon name="arrow-back-outline" class="text-xl"></ion-icon>
      </button>

      <?php if(!empty($post['foto_img_url'])): ?>
      <img src="<?= $post['foto_img_url'] ?>" class="w-full h-full object-contain" alt="Post Content">
      <?php else: ?>
      <div class="text-zinc-600 flex flex-col items-center">
        <ion-icon name="videocam-off-outline" class="text-6xl mb-4 opacity-30"></ion-icon>
        <p class="text-sm font-mono tracking-widest opacity-50">VIDEO FORMAT</p>
      </div>
      <?php endif; ?>
    </div>

    <div class="w-full md:w-[35%] flex flex-col bg-[#09090b] relative h-[60vh] md:h-full">

      <div
        class="p-4 border-b border-white/5 flex items-center justify-between shrink-0 bg-[#09090b]/95 backdrop-blur-xl z-20 sticky top-0">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-full p-[1.5px] bg-gradient-to-tr from-zinc-700 via-zinc-800 to-black">
            <img
              src="<?= $post['user_pict'] && $post['user_pict'] !== 'default.jpg' ? '/assets/' . $post['user_pict'] : '/assets/default.png' ?>"
              class="w-full h-full rounded-full object-cover border-2 border-[#09090b]">
          </div>
          <div class="flex flex-col leading-none gap-1">
            <h3
              class="font-bold text-zinc-100 text-sm hover:text-white cursor-pointer transition-colors truncate max-w-[150px]">
              <?= htmlspecialchars($post['user_display']) ?>
            </h3>
            <p class="text-[11px] text-zinc-500 font-medium tracking-wide">@<?= htmlspecialchars($post['username']) ?>
            </p>
          </div>
        </div>

        <button onclick="closeModal()"
          class="hidden md:flex text-zinc-500 hover:text-red-500 transition-colors p-2 hover:bg-white/5 rounded-full">
          <ion-icon name="close-outline" class="text-2xl"></ion-icon>
        </button>
      </div>

      <div class="flex-1 overflow-y-auto custom-scrollbar bg-[#09090b] relative">
        <div class="p-5 pb-24">

          <div class="flex gap-3 mb-6 relative group/caption">
            <p class="text-[13px] text-zinc-300 leading-relaxed text-left font-light break-words">
              <?= htmlspecialchars($post['upload_caption']) ?>
            </p>
          </div>

          <div class="flex items-center gap-4 mb-6">
            <div class="h-[1px] flex-1 bg-gradient-to-r from-transparent via-zinc-800 to-transparent"></div>
            <span class="text-[10px] text-zinc-600 font-mono tracking-widest uppercase">Comments</span>
            <div class="h-[1px] flex-1 bg-gradient-to-r from-transparent via-zinc-800 to-transparent"></div>
          </div>

          <?php if(empty($comments)): ?>
          <div class="flex flex-col items-center justify-center py-12 text-zinc-700 opacity-60">
            <ion-icon name="chatbubbles-outline" class="text-3xl mb-2"></ion-icon>
            <p class="text-xs font-medium tracking-wider">NO COMMENTS YET</p>
          </div>
          <?php else: ?>
          <div class="flex flex-col gap-5">
            <?php foreach($comments as $comment): ?>
            <div class="flex gap-3 group animate-slide-up">
              <div class="w-8 h-8 shrink-0 pt-1">
                <img
                  src="<?= $comment['user_pict'] && $comment['user_pict'] !== 'default.jpg' ? '/assets/' . $comment['user_pict'] : '/assets/default.png' ?>"
                  class="w-full h-full rounded-full object-cover opacity-70 group-hover:opacity-100 transition-opacity grayscale group-hover:grayscale-0">
              </div>
              <div class="flex-1">
                <div class="flex items-baseline gap-2">
                  <span
                    class="font-semibold text-zinc-400 text-xs hover:text-white cursor-pointer transition-colors"><?= htmlspecialchars($comment['user_display']) ?></span>
                  <span
                    class="text-[10px] text-zinc-700"><?= time_elapsed_string($comment['comment_created_at']) ?></span>
                </div>
                <p class="text-[13px] text-zinc-300 mt-0.5 leading-snug break-words">
                  <?= htmlspecialchars($comment['komentar_text']) ?></p>

                <!-- <div
                  class="flex gap-4 mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200 transform translate-y-1 group-hover:translate-y-0">
                  <button class="text-[10px] text-zinc-500 hover:text-zinc-300 font-medium">Reply</button>
                </div> -->
              </div>
            </div>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>
        </div>
      </div>

      <div
        class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-[#09090b] via-[#09090b] to-transparent pt-10 z-10">
        <?php require __DIR__ . '/../../partials/interact.php'; ?>

        <form action="/comment/store" method="POST" class="relative group">
          <input type="hidden" name="upload_id" value="<?= $post['id_upload'] ?>">

          <input type="text" name="comment_text" placeholder="Add a comment..." class="w-full bg-zinc-900/50 backdrop-blur-sm text-sm text-zinc-200 rounded-2xl py-3.5 pl-5 pr-14 
          border border-white/5 group-hover:border-white/10 focus:border-zinc-700 focus:bg-black focus:outline-none 
          transition-all duration-300 placeholder-zinc-600 shadow-lg" required autocomplete="off">

          <button type="submit"
            class="absolute right-2 top-1/2 -translate-y-1/2 p-2 rounded-xl text-blue-500 hover:text-blue-400 hover:bg-blue-500/10 transition-colors disabled:opacity-50">
            <ion-icon name="arrow-up-outline" class="text-lg"></ion-icon>
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<script>
function closeModal() {
  const modal = document.querySelector('.animate-fade-in');
  if (modal) {
    modal.classList.remove('animate-fade-in');
    modal.style.opacity = '0';
  }

  setTimeout(() => {
    const myDomain = window.location.host;
    const previousPage = document.referrer;
    if (previousPage && previousPage.includes(myDomain)) {
      window.history.back();
    } else {
      window.location.replace("/");
    }
  }, 50)
}
</script>

<style>
.custom-scrollbar::-webkit-scrollbar {
  width: 4px;
}

.custom-scrollbar::-webkit-scrollbar-track {
  background: transparent;
}

.custom-scrollbar::-webkit-scrollbar-thumb {
  background-color: #27272a;
  border-radius: 10px;
}

.custom-scrollbar::-webkit-scrollbar-thumb:hover {
  background-color: #3f3f46;
}

@keyframes fade-in {
  0% {
    opacity: 0;
    backdrop-filter: blur(0px);
  }

  100% {
    opacity: 1;
    backdrop-filter: blur(12px);
  }
}

@keyframes scale-up {
  0% {
    opacity: 0;
    transform: scale(0.95) translateY(10px);
  }

  100% {
    opacity: 1;
    transform: scale(1) translateY(0);
  }
}

@keyframes slide-up {
  0% {
    opacity: 0;
    transform: translateY(10px);
  }

  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-fade-in {
  animation: fade-in 0.3s ease-out forwards;
}

.animate-scale-up {
  animation: scale-up 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}

.animate-slide-up {
  animation: slide-up 0.4s ease-out forwards;
}
</style>