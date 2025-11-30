<div id="shareModal" class="fixed inset-0 z-[999] hidden items-center justify-center font-sans">

  <div onclick="closeShareModal()" id="shareBackdrop"
    class="absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity opacity-0"></div>

  <div id="shareContent"
    class="relative bg-[#1e1e1e] border border-gray-700 w-full max-w-sm rounded-2xl p-6 shadow-2xl transform scale-95 opacity-0 transition-all duration-300">

    <div class="flex justify-between items-center mb-6">
      <h3 class="text-lg font-bold text-white">Bagikan Meme</h3>
      <button onclick="closeShareModal()" class="text-gray-400 hover:text-white transition-colors">
        <ion-icon name="close-outline" class="text-2xl"></ion-icon>
      </button>
    </div>

    <div class="grid grid-cols-4 gap-4 mb-6">
      <a id="shareWa" href="#" target="_blank" class="flex flex-col items-center gap-2 group">
        <div
          class="w-12 h-12 rounded-full bg-[#25D366]/10 flex items-center justify-center group-hover:bg-[#25D366] transition-all">
          <ion-icon name="logo-whatsapp" class="text-2xl text-[#25D366] group-hover:text-white"></ion-icon>
        </div>
        <span class="text-xs text-gray-400 group-hover:text-white">WhatsApp</span>
      </a>
      <a id="shareX" href="#" target="_blank" class="flex flex-col items-center gap-2 group">
        <div
          class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center group-hover:bg-white transition-all">
          <ion-icon name="logo-twitter" class="text-2xl text-white group-hover:text-black"></ion-icon>
        </div>
        <span class="text-xs text-gray-400 group-hover:text-white">X / Twitter</span>
      </a>
      <a id="shareFb" href="#" target="_blank" class="flex flex-col items-center gap-2 group">
        <div
          class="w-12 h-12 rounded-full bg-[#1877F2]/10 flex items-center justify-center group-hover:bg-[#1877F2] transition-all">
          <ion-icon name="logo-facebook" class="text-2xl text-[#1877F2] group-hover:text-white"></ion-icon>
        </div>
        <span class="text-xs text-gray-400 group-hover:text-white">Facebook</span>
      </a>
      <button onclick="copyToClipboard()" class="flex flex-col items-center gap-2 group">
        <div
          class="w-12 h-12 rounded-full bg-gray-700/50 flex items-center justify-center group-hover:bg-gray-600 transition-all">
          <ion-icon name="link-outline" class="text-2xl text-white"></ion-icon>
        </div>
        <span class="text-xs text-gray-400 group-hover:text-white">Salin</span>
      </button>
    </div>

    <div class="relative">
      <input type="text" id="shareInput" readonly
        class="w-full bg-black/30 border border-gray-700 text-gray-300 text-sm rounded-xl py-3 pl-4 pr-20 focus:outline-none truncate">
      <button onclick="copyToClipboard()" id="btnCopyLabel"
        class="absolute right-1.5 top-1.5 bottom-1.5 bg-white text-black text-xs font-bold px-3 rounded-lg hover:bg-gray-200 transition-colors">Salin</button>
    </div>
  </div>
</div>

<script>
function openShareModal(url, title) {
  const modal = document.getElementById('shareModal');
  const backdrop = document.getElementById('shareBackdrop');
  const content = document.getElementById('shareContent');
  const input = document.getElementById('shareInput');

  input.value = url;

  const text = encodeURIComponent(title);
  const link = encodeURIComponent(url);

  document.getElementById('shareWa').href = `https://wa.me/?text=${text}%20${link}`;
  document.getElementById('shareX').href = `https://twitter.com/intent/tweet?text=${text}&url=${link}`;
  document.getElementById('shareFb').href = `https://www.facebook.com/sharer/sharer.php?u=${link}`;

  modal.classList.remove('hidden');
  modal.classList.add('flex');
  setTimeout(() => {
    backdrop.classList.remove('opacity-0');
    content.classList.remove('opacity-0', 'scale-95');
    content.classList.add('opacity-100', 'scale-100');
  }, 10);
}

function closeShareModal() {
  const modal = document.getElementById('shareModal');
  const content = document.getElementById('shareContent');
  const backdrop = document.getElementById('shareBackdrop');

  backdrop.classList.add('opacity-0');
  content.classList.remove('opacity-100', 'scale-100');
  content.classList.add('opacity-0', 'scale-95');

  setTimeout(() => {
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    const btn = document.getElementById('btnCopyLabel');
    btn.innerText = "Salin";
    btn.classList.remove("bg-green-500", "text-white");
    btn.classList.add("bg-white", "text-black");
  }, 300);
}

function copyToClipboard() {
  const input = document.getElementById('shareInput');
  input.select();
  input.setSelectionRange(0, 99999);
  navigator.clipboard.writeText(input.value);

  const btn = document.getElementById('btnCopyLabel');
  btn.innerText = "Tersalin!";
  btn.classList.remove("bg-white", "text-black");
  btn.classList.add("bg-green-500", "text-white");
}
</script>