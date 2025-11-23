<div id="commentModal" class="fixed inset-0 z-[100] hidden" aria-labelledby="modal-title" role="dialog"
  aria-modal="true">

  <style>
  .no-scrollbar::-webkit-scrollbar {
    display: none;
  }

  .no-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }

  /* Animasi smooth */
  @keyframes slideIn {
    from {
      opacity: 0;
      transform: translateY(5px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .new-comment {
    animation: slideIn 0.3s ease-out forwards;
  }
  </style>

  <div id="modalBackdrop"
    class="fixed inset-0 bg-black/80 backdrop-blur-sm transition-opacity duration-300 ease-out opacity-0"
    onclick="closeComment()"></div>

  <div
    class="fixed inset-x-0 bottom-0 z-10 w-full overflow-hidden sm:inset-0 sm:flex sm:items-center sm:justify-center sm:p-4 pointer-events-none">

    <div id="modalPanel"
      class="relative w-full max-w-2xl bg-mainBg rounded-xl sm:shadow-2xl h-[90vh] sm:h-[650px] flex flex-col pointer-events-auto transition-all duration-300 ease-out transform translate-y-full opacity-0 scale-95 sm:translate-y-0 sm:scale-95">

      <div class="flex items-center justify-between px-5 py-3 border-b border-gray-700 bg-mainBg shrink-0">
        <div class="w-8"></div>
        <h3 class="text-[16px] font-bold text-mainText">Thread</h3>
        <button onclick="closeComment()"
          class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-700/50 text-mainText hover:bg-gray-600 transition-colors">
          <ion-icon name="close"></ion-icon>
        </button>
      </div>

      <div id="scrollableArea" class="flex-1 overflow-y-auto no-scrollbar bg-mainBg scroll-smooth">

        <div class="p-5 border-b border-gray-700">
          <div class="flex items-center gap-3 mb-3">
            <div class="w-10 h-10 rounded-full bg-secondBg overflow-hidden shrink-0 border border-gray-700">
              <ion-icon name="person" class="w-full h-full p-2 text-mainText/60"></ion-icon>
            </div>
            <div class="flex flex-col">
              <span class="font-bold text-mainText text-sm" id="modalAuthorName">Username</span>
              <span class="text-xs text-mainText/60">2 jam yang lalu</span>
            </div>
          </div>
          <p class="text-mainText text-[15px] leading-relaxed whitespace-pre-line mb-3" id="modalMemeDesc"></p>
          <div class="rounded-none overflow-hidden border border-gray-700 mb-4 bg-secondBg">
            <img id="modalMemeImage" src="" class="w-full h-auto object-contain max-h-[400px]" alt="Post Image">
          </div>
          <div class="flex items-center gap-6 text-mainText/60 mt-2 text-2xl">
            <button class="hover:text-red-500">
              <ion-icon name="heart-outline"></ion-icon>
            </button>
            <button onclick="focusReply(null)" class="hover:text-blue-500">
              <ion-icon name="chatbubble-outline"></ion-icon>
            </button>
            <button class="hover:text-green-500">
              <ion-icon name="paper-plane-outline"></ion-icon>
            </button>
          </div>
        </div>

        <div id="commentsContainer" class="pb-20">
        </div>
      </div>

      <div class="p-3 border-t border-gray-700 bg-mainBg shrink-0 flex flex-col gap-2">

        <div id="replyingIndicator" class="hidden px-2 text-xs text-blue-400 justify-between items-center">
          <span>Membalas ke <span id="replyingToUser" class="font-bold">@username</span></span>
          <button onclick="cancelReply()" class="text-gray-500 hover:text-white">
            <ion-icon name="close-circle"></ion-icon>
          </button>
        </div>

        <form class="flex items-center gap-3 px-2" onsubmit="submitComment(event)">
          <div class="w-9 h-9 rounded-full bg-secondBg shrink-0 overflow-hidden border border-gray-700">
            <ion-icon name="person" class="w-full h-full p-2 text-mainText/60"></ion-icon>
          </div>
          <input type="text" id="commentInput" placeholder="Tulis komentar..." autocomplete="off"
            class="flex-1 bg-transparent text-mainText text-sm px-2 py-3 focus:outline-none placeholder:text-mainText/30">
          <button type="submit" class="text-blue-500 font-bold text-sm disabled:opacity-50 px-2 hover:text-blue-400">
            Kirim
          </button>
        </form>
      </div>

    </div>
  </div>
</div>

<script>
// Data Dummy: Sekarang punya properti 'replies' (Array)
// id diperlukan untuk identifikasi parent
let commentData = [{
    id: 1,
    user: '69.to.go',
    text: 'suara buzzingnya langsung apa diyambah sendiri?',
    time: '1m',
    replies: [{
      id: 101,
      user: 'creator_jmk',
      text: 'Itu effect bawaan dari AI-nya bang',
      time: 'Baru saja'
    }]
  },
  {
    id: 2,
    user: 'mike_missel',
    text: 'nicee',
    time: '3m',
    replies: []
  },
  {
    id: 3,
    user: 'ahmad_fauzi',
    text: 'Tutorialnya dong bang 🔥',
    time: '5m',
    replies: []
  }
];

let activeReplyId = null; // Menyimpan ID komentar yang sedang dibalas (null = komentar baru biasa)

// --- LOGIC BUKA/TUTUP MODAL (SAMA SEPERTI SEBELUMNYA) ---
function openComment(memeId, author, description, imageUrl) {
  const modal = document.getElementById('commentModal');
  const backdrop = document.getElementById('modalBackdrop');
  const panel = document.getElementById('modalPanel');

  document.getElementById('modalAuthorName').innerText = author;
  document.getElementById('modalMemeDesc').innerText = description;
  document.getElementById('modalMemeImage').src = imageUrl;

  modal.classList.remove('hidden');
  document.body.style.overflow = 'hidden';

  setTimeout(() => {
    backdrop.classList.remove('opacity-0');
    panel.classList.remove('translate-y-full', 'opacity-0', 'scale-95', 'sm:translate-y-10');
    panel.classList.add('translate-y-0', 'opacity-100', 'scale-100');
  }, 20);

  renderComments();
}

function closeComment() {
  const modal = document.getElementById('commentModal');
  const backdrop = document.getElementById('modalBackdrop');
  const panel = document.getElementById('modalPanel');

  backdrop.classList.add('opacity-0');
  panel.classList.remove('translate-y-0', 'opacity-100', 'scale-100');
  panel.classList.add('translate-y-full', 'opacity-0', 'scale-95', 'sm:translate-y-10');

  setTimeout(() => {
    modal.classList.add('hidden');
    document.body.style.overflow = 'auto';
    cancelReply(); // Reset status reply saat tutup
  }, 300);
}

// --- LOGIC RENDER KOMENTAR (NESTED) ---
function renderComments() {
  const container = document.getElementById('commentsContainer');
  let html = '';

  // Render Parent Comments
  commentData.forEach(parent => {
    html += createCommentHTML(parent, false); // False = bukan child

    // Render Replies (Jika ada)
    if (parent.replies && parent.replies.length > 0) {
      html += `<div class="ml-12 border-l-2 border-gray-800 pl-4 mt-[-10px] mb-4">`; // Indentasi
      parent.replies.forEach(child => {
        html += createCommentHTML(child, true); // True = child
      });
      html += `</div>`;
    }
  });

  container.innerHTML = html;
}

// Template HTML untuk satu bubble komentar
function createCommentHTML(c, isChild) {
  return `
    <div class="flex gap-3 px-5 py-3 hover:bg-mainText/5 transition-colors new-comment group">
        <div class="w-8 h-8 rounded-full bg-secondBg flex items-center justify-center shrink-0 border border-gray-700">
            <span class="text-mainText font-bold text-[10px] opacity-70">${c.user.substring(0,2).toUpperCase()}</span>
        </div>
        <div class="flex-1">
            <div class="flex items-center justify-between">
                <p class="text-sm font-bold text-mainText cursor-pointer hover:underline">${c.user}</p>
                <span class="text-[10px] text-mainText/50">${c.time}</span>
            </div>
            <p class="text-[14px] text-mainText/90 mt-0.5 leading-normal">${c.text}</p>
            
            <div class="flex items-center gap-4 mt-2 opacity-60 group-hover:opacity-100 transition-opacity">
                ${!isChild ? 
                  `<button onclick="focusReply(${c.id}, '${c.user}')" class="text-xs text-mainText hover:text-blue-500 flex items-center gap-1">
                    <ion-icon name="chatbubble-outline"></ion-icon> Balas
                   </button>` 
                  : ''} 
                <button class="text-xs text-mainText hover:text-red-500"><ion-icon name="heart-outline"></ion-icon></button>
            </div>
        </div>
    </div>`;
}

// --- LOGIC REPLY SYSTEM ---

// 1. Saat tombol "Balas" diklik di salah satu komen
function focusReply(parentId, username) {
  const input = document.getElementById('commentInput');
  const indicator = document.getElementById('replyingIndicator');
  const userSpan = document.getElementById('replyingToUser');

  if (parentId) {
    // Mode Balas Komentar
    activeReplyId = parentId;
    userSpan.innerText = '@' + username;
    indicator.classList.remove('hidden');
    input.placeholder = `Balas ${username}...`;
  } else {
    // Mode Komentar Biasa
    cancelReply();
  }

  input.focus();
}

// 2. Batalkan Reply (tekan X)
function cancelReply() {
  activeReplyId = null;
  document.getElementById('replyingIndicator').classList.add('hidden');
  document.getElementById('commentInput').placeholder = "Tulis komentar...";
}

// 3. Submit Komentar (Handle Parent vs Child)
function submitComment(e) {
  e.preventDefault();
  const input = document.getElementById('commentInput');
  const text = input.value.trim();

  if (!text) return;

  const newComment = {
    id: Date.now(), // Generate ID unik
    user: 'Anda',
    text: text,
    time: 'Baru saja',
    replies: []
  };

  if (activeReplyId) {
    // KASUS A: Ini adalah BALASAN (Masuk ke array replies milik parent)
    const parentIndex = commentData.findIndex(c => c.id === activeReplyId);
    if (parentIndex !== -1) {
      commentData[parentIndex].replies.push(newComment);
    }
  } else {
    // KASUS B: Ini adalah KOMENTAR UTAMA (Masuk ke array utama)
    commentData.unshift(newComment);
  }

  // Render Ulang & Reset
  renderComments();
  input.value = '';
  cancelReply(); // Kembali ke mode normal
}
</script>