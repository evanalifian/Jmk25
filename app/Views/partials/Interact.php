<?php 
$isBookmarked = $post['is_bookmarked'] ?? 0; 
$btnBookmarkClass = $isBookmarked ? 'text-accent' : 'text-mainText';
$iconBookmarkName = $isBookmarked ? 'bookmark' : 'bookmark-outline';

$isLiked = $post['is_liked'] ?? 0;
$btnLikeClass = $isLiked ? 'text-red-500' : 'text-mainText';
$iconLikeName = $isLiked ? 'heart' : 'heart-outline';
$totalLikes = $post['total_likes'] ?? 0;

$totalComments = $post['total_comments'] ?? 0;
?>


<div class="flex items-center justify-between mt-3 mb-2">

  <div class="flex items-center gap-6">

    <button onclick="toggleLike(this)" id="likes" data-id="<?= $post['id_upload'] ?>"
      class="group flex items-center gap-2 cursor-pointer transition-colors hover:text-red-500 <?= $btnLikeClass ?>">

      <ion-icon name="<?= $iconLikeName ?>" class="text-2xl group-hover:scale-110 transition-transform"></ion-icon>

      <span class="count-label text-sm font-medium text-mainGray transition-colors group-hover:text-red-500/80">
        <?= $totalLikes ?>
      </span>
    </button>

    <button onclick="handleComment(this)" data-id="<?= isset($post['id_upload']) ? $post['id_upload'] : '' ?>"
      class="group flex items-center gap-2 cursor-pointer transition-colors text-mainText hover:text-blue-400">

      <ion-icon name="chatbubble-outline" class="text-2xl group-hover:scale-110 transition-transform"></ion-icon>
      <span class="text-sm font-medium text-mainGray">
        <?= isset($post['total_comments']) ? $post['total_comments'] : 0 ?>
      </span>
    </button>

    <button onclick="window.handleShare(this)" data-url="<?= base_url($post['id_upload']) ?>"
      data-title="Cek meme ini: <?= htmlspecialchars($post['caption'] ?? 'Meme Lucu') ?>"
      class="group flex items-center cursor-pointer transition-colors text-mainText hover:text-blue-400 relative">
      <ion-icon name="paper-plane-outline" class="text-2xl group-hover:scale-110 transition-transform"></ion-icon>
      <span
        class="share-tooltip absolute -top-8 left-1/2 -translate-x-1/2 bg-black text-white text-[10px] px-2 py-1 rounded opacity-0 transition-opacity pointer-events-none">Copied!</span>
    </button>

  </div>

  <button onclick="toggleBookmark(this)" data-id="<?= $post['id_upload'] ?>"
    class="group flex items-center cursor-pointer transition-colors hover:text-accent <?= $btnBookmarkClass ?>">
    <ion-icon name="<?= $iconBookmarkName ?>" class="text-2xl group-hover:scale-110 transition-transform"></ion-icon>
  </button>

  <?php require_once __DIR__ . '/../partials/ShareModal.php'; ?>

</div>

<script>
if (!window.interactFunctionsDefined) {
  window.interactFunctionsDefined = true;

  window.toggleLike = function(btn) {
    const icon = btn.querySelector('ion-icon');
    const label = btn.querySelector('.count-label');
    const isActive = btn.classList.contains('text-red-500');
    const postId = btn.getAttribute('data-id');

    let currentCount = parseInt(label.innerText) || 0;

    if (!isActive) {
      btn.classList.remove('text-mainText');
      btn.classList.add('text-red-500');
      icon.setAttribute('name', 'heart');

      label.innerText = currentCount + 1;

      icon.classList.add('scale-125');
      setTimeout(() => icon.classList.remove('scale-125'), 200);
    } else {
      btn.classList.remove('text-red-500');
      btn.classList.add('text-mainText');
      icon.setAttribute('name', 'heart-outline');

      label.innerText = Math.max(0, currentCount - 1);
    }

    if (postId) {
      const formData = new FormData();
      formData.append('id_upload', postId);

      fetch('/like/toggle', {
          method: 'POST',
          body: formData
        })
        .then(r => r.json())
        .then(data => {
          if (data.status === 'success') {
            console.log("Like status:", data.action);
          } else {
            console.error("Gagal like:", data.message);
          }
        })
        .catch(e => console.error(e));
    }
  };

  window.toggleBookmark = function(btn) {
    const icon = btn.querySelector('ion-icon');
    const isActive = btn.classList.contains('text-accent');
    const postId = btn.getAttribute('data-id');

    if (!postId) return;

    if (!isActive) {
      btn.classList.remove('text-mainText');
      btn.classList.add('text-accent');
      icon.setAttribute('name', 'bookmark');
      icon.classList.add('scale-125');
      setTimeout(() => icon.classList.remove('scale-125'), 200);
    } else {
      btn.classList.remove('text-accent');
      btn.classList.add('text-mainText');
      icon.setAttribute('name', 'bookmark-outline');
    }

    const formData = new FormData();
    formData.append('id_upload', postId);

    fetch('/bookmark/toggle', {
        method: 'POST',
        body: formData
      })
      .then(r => r.json())
      .then(data => {
        if (data.status !== 'success') console.error(data.message);
      });
  };

  window.handleComment = function(btn) {
    const icon = btn.querySelector('ion-icon');

    if (icon) {
      icon.classList.add('scale-90');
      setTimeout(() => icon.classList.remove('scale-90'), 150);
    }

    const postId = btn.getAttribute('data-id');

    if (postId) {
      window.location.href = postId;
    } else {
      console.error("ID Postingan tidak ditemukan!");
    }
  };

  window.handleShare = function(btn) {
    const icon = btn.querySelector('ion-icon');
    const tooltip = btn.querySelector('.share-tooltip');

    icon.classList.add('translate-x-1', '-translate-y-1');
    setTimeout(() => icon.classList.remove('translate-x-1', '-translate-y-1'), 200);

    if (tooltip) {
      tooltip.classList.remove('opacity-0');
      setTimeout(() => tooltip.classList.add('opacity-0'), 1500);
    }

    const url = btn.dataset.url;
    const title = btn.dataset.title;

    if (typeof openShareModal === 'function') {
      openShareModal(url, title);
    } else {
      navigator.clipboard.writeText(url);
      alert('Link tersalin!');
    }
  };
}
</script>