<main class="max-w-2xl mx-auto min-h-screen flex flex-col bg-mainBg">

  <div class="sticky top-0 z-50 shrink-0 backdrop-blur-md">
    <?php require_once __DIR__ . '/../../partials/MainHeader.php'; ?>
  </div>

  <div class="flex-1 p-6">

    <form action="/group/create/post" method="POST" enctype="multipart/form-data" class="space-y-6">

      <div>
        <label class="block text-sm text-mainText mb-2">Nama Grup</label>
        <input type="text" id="group_name" name="group_name" required placeholder="Ex: Anggrek Mekar Pontianak"
          class="w-full px-4 py-3 border border-mainGray rounded-xl bg-mainBg text-mainText placeholder-mainGray focus:outline-none focus:border-accent transition">
      </div>

      <div>
        <label class="block text-sm text-mainText mb-2">Deskripsi</label>
        <textarea id="group_bio" name="group_desc" rows="4" placeholder="Ceritakan tentang grup ini..."
          class="w-full px-4 py-3 border border-mainGray rounded-xl bg-mainBg text-mainText placeholder-mainGray focus:outline-none focus:border-accent transition resize-none"></textarea>
      </div>

      <div>
        <label class="block text-sm font-semibold text-mainText mb-2">Gambar Grup</label>
        <div id="dropzone"
          class="relative border-2 border-dashed border-mainGray rounded-xl p-4 text-center hover:border-accent transition cursor-pointer bg-mainBg overflow-hidden"
          style="min-height: 200px;"> <input type="file" id="group_pict" name="group_pict" accept="image/*"
            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">

          <div id="upload-indicator"
            class="flex flex-col items-center justify-center text-mainGray/70 absolute inset-0 p-8">
            <ion-icon name="images-outline" class="text-4xl text-mainGray mb-3"></ion-icon>
            <p class="font-medium text-mainText">Klik untuk unggah</p>
            <p class="text-sm text-mainGray">atau *drag and drop*</p>
          </div>

          <img id="preview-image" class="absolute inset-0 w-full h-full object-cover rounded-lg hidden">

        </div>
      </div>

      <div class="flex gap-3 pt-4">
        <button type="button"
          class="flex-1 py-3 px-6 border border-mainGray text-mainText font-medium rounded-full hover:border-mainText hover:bg-mainGray/5 transition">
          Batal
        </button>
        <button type="submit"
          class="flex-1 py-3 px-6 bg-accent text-white font-semibold rounded-full hover:bg-accent/90 transition">
          Buat Grup
        </button>
      </div>

    </form>

  </div>

</main>

<script>
document.getElementById('group_pict').addEventListener('change', function(e) {
  const file = e.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function(e) {
      document.getElementById('preview').classList.remove('hidden');
      document.getElementById('preview-image').src = e.target.result;
    }
    reader.readAsDataURL(file);
  }
});

document.addEventListener('DOMContentLoaded', function() {
  const fileInput = document.getElementById('group_pict');
  const previewImage = document.getElementById('preview-image');
  const dropzone = document.getElementById('dropzone');
  const uploadIndicator = document.getElementById('upload-indicator');

  fileInput.addEventListener('change', function() {
    const file = this.files[0];

    if (file) {
      const reader = new FileReader();

      reader.onload = function(e) {
        previewImage.src = e.target.result;
        previewImage.classList.remove('hidden');

        uploadIndicator.classList.add('hidden');

        dropzone.classList.remove('border-dashed');
        dropzone.classList.remove('border-mainGray/40');
        dropzone.classList.add('border-solid');
        dropzone.classList.add('border-transparent');
      };

      reader.readAsDataURL(file);
    } else {
      previewImage.classList.add('hidden');
      previewImage.src = '';
      uploadIndicator.classList.remove('hidden');

      dropzone.classList.add('border-dashed');
      dropzone.classList.add('border-mainGray/40');
      dropzone.classList.remove('border-solid');
      dropzone.classList.remove('border-transparent');
    }
  });

  ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropzone.addEventListener(eventName, preventDefaults, false);
  });

  function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
  }

  ['dragenter', 'dragover'].forEach(eventName => {
    dropzone.addEventListener(eventName, highlight, false);
  });

  ['dragleave', 'drop'].forEach(eventName => {
    dropzone.addEventListener(eventName, unhighlight, false);
  });

  function highlight() {
    dropzone.classList.add('bg-accent/5'); // Efek highlight saat drag
    dropzone.classList.add('border-accent');
  }

  function unhighlight() {
    dropzone.classList.remove('bg-accent/5');
    dropzone.classList.remove('border-accent');
  }
});
</script>