<div id="imageModal" class="fixed inset-0 z-[100] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">

  <div class="fixed inset-0 bg-black/90 transition-opacity cursor-pointer" onclick="closeImageModal()"></div>

  <div class="fixed inset-0 z-10 overflow-y-auto">
    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">

      <button onclick="closeImageModal()"
        class="absolute top-5 right-5 text-white/70 hover:text-white z-20 p-2 bg-black/20 rounded-full backdrop-blur-sm transition-all">
        <ion-icon name="close" class="text-3xl"></ion-icon>
      </button>

      <div
        class="relative transform overflow-hidden rounded-lg text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-5xl">
        <img id="modalImageDisplay" src="" alt="Full Preview" class="w-full h-auto max-h-[90vh] object-contain mx-auto">
      </div>

    </div>
  </div>
</div>

<script>
// Fungsi untuk membuka modal
function openImageModal(imageUrl) {
  const modal = document.getElementById('imageModal');
  const modalImg = document.getElementById('modalImageDisplay');

  modalImg.src = imageUrl;

  modal.classList.remove('hidden');

  document.body.style.overflow = 'hidden';
}

function closeImageModal() {
  const modal = document.getElementById('imageModal');
  const modalImg = document.getElementById('modalImageDisplay');

  modal.classList.add('hidden');

  setTimeout(() => {
    modalImg.src = '';
  }, 200);

  document.body.style.overflow = 'auto';
}

document.addEventListener('keydown', function(event) {
  if (event.key === "Escape") {
    closeImageModal();
  }
});
</script>