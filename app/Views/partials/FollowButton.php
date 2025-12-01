<?php
// 1. Cek apakah postingan sendiri
$isMe = (isset($_SESSION['login']['id_user']) && $_SESSION['login']['id_user'] == $post['upload_user_id']);
$authorId = $post['upload_user_id'] ?? null;
$isFollowed = $post['upload_user_id'] ?? false;

// 2. Siapkan Style dengan IF-ELSE
if ($post['upload_user_id']) {
    // KONDISI: SUDAH FOLLOW (Aktif/Biru)
    $btnClass = 'bg-blue-500 text-white border-blue-500';
    $btnStyle = 'background-color: var(--accent); border-color: var(--accent); color: white;';
    $showFollow = 'hidden';
    $showFollowed = 'block';
} else {
    // KONDISI: BELUM FOLLOW (Transparan)
    $btnClass = 'bg-transparent text-mainText border-mainGray hover:border-blue-500 hover:text-blue-500';
    $btnStyle = ''; // Ikut class default
    $showFollow = 'block';
    $showFollowed = 'hidden';
}
?>

<?php if (!$isMe): ?>
    <button onclick="toggleFollowExplore(this, '<?= $post['upload_user_id'] ?>')" 
            class="px-4 py-1.5 rounded-full font-bold text-xs border transition-all active:scale-95 group relative <?= $btnClass ?>"
            style="<?= $btnStyle ?>">
        
        <span class="text-follow <?= $showFollow ?>">
            Follow
        </span>

        <span class="text-followed <?= $showFollowed ?>">
            Followed
        </span>

    </button>
<?php else: ?>
    <button class="text-mainText hover:bg-mainGray/10 p-2 rounded-full transition-colors">
        <ion-icon name="ellipsis-horizontal"></ion-icon>
    </button>
<?php endif; ?>