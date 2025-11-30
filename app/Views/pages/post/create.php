<main class="max-w-2xl mx-auto min-h-screen flex flex-col">

  <div class="sticky top-0 z-50 shrink-0 backdrop-blur-md">
    <?php require_once __DIR__ . '/../../partials/MainHeader.php'; ?>
  </div>

  <form action="/store" method="POST" enctype="multipart/form-data" class="space-y-6">

    <div class="relative w-full">
      <label class="block text-sm font-medium text-mainGray mb-2">Media</label>

      <div id="drop-area"
        class="relative flex flex-col items-center justify-center w-full h-64 border-2 border-dashed border-mainGray rounded-2xl cursor-pointer hover:bg-mainGray/10 transition-colors">

        <div id="upload-placeholder" class="flex flex-col items-center justify-center pt-5 pb-6 text-center">
          <ion-icon name="images-outline" class="text-4xl text-mainGray mb-3"></ion-icon>
          <p class="mb-2 text-sm text-mainText font-semibold">Klik untuk upload</p>
          <p class="text-xs text-mainGray">atau drag and drop (Foto/Video)</p>
        </div>

        <input id="file-upload" name="media_file" type="file" class="hidden" accept="image/*,video/*"
          onchange="previewFile()" />

        <div id="preview-container"
          class="hidden absolute inset-0 w-full h-full bg-mainBg rounded-2xl overflow-hidden border border-mainGray">
          <img id="img-preview" class="w-full h-full object-cover hidden" />
          <video id="video-preview" class="w-full h-full object-cover hidden" controls></video>

          <button type="button" onclick="removeFile()"
            class="absolute top-3 right-3 bg-black/60 text-white p-2 rounded-full hover:bg-red-500 transition-colors backdrop-blur-sm">
            <ion-icon name="close-outline" class="text-xl"></ion-icon>
          </button>
        </div>
      </div>
    </div>

    <div>
      <label for="caption" class="block text-sm font-medium text-mainGray mb-2">Caption</label>
      <textarea id="caption" name="upload_caption" rows="4"
        class="block w-full p-4 bg-transparent text-mainText border border-mainGray rounded-2xl focus:ring-1 focus:ring-mainText focus:border-mainText placeholder-mainGray resize-none text-lg"
        placeholder="Apa yang sedang terjadi?"></textarea>
    </div>

    <div class="grid grid-cols-2 gap-4">
      <div>
        <label class="block text-sm font-medium text-mainGray mb-2">Kategori</label>
        <div class="relative">
          <select name="upload_category_id"
            class="appearance-none block w-full px-4 py-3 bg-transparent text-mainText border border-mainGray rounded-xl focus:outline-none focus:border-mainText cursor-pointer">
            <?php foreach($model['categories'] as $cat): ?>
            <option class="bg-mainBg" value="<?= $cat['id_category'] ?>">
              <?= $cat['category_name'] ?>
            </option>
            <?php endforeach; ?>
          </select>
          <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none text-mainGray">
            <ion-icon name="chevron-down-outline"></ion-icon>
          </div>
        </div>
      </div>

      <div>
        <label class="block text-sm font-medium text-mainGray mb-2">Grup (Opsional)</label>
        <div class="relative">
          <select name="upload_group_id"
            class="appearance-none block w-full px-4 py-3 bg-transparent text-mainText border border-mainGray rounded-xl focus:outline-none focus:border-mainText cursor-pointer">
            <option class="bg-mainBg" value="">Tanpa Grup</option>
          </select>
          <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none text-mainGray">
            <ion-icon name="chevron-down-outline"></ion-icon>
          </div>
        </div>
      </div>
    </div>

    <div class="flex items-center justify-end pt-4 gap-3">
      <a href="/"
        class="px-6 py-2.5 text-sm font-medium text-mainText border border-mainGray rounded-full hover:bg-mainGray/10 transition-colors">
        Batal
      </a>
      <button type="submit"
        class="px-8 py-2.5 text-sm font-bold text-white bg-blue-600 rounded-full hover:bg-blue-500 shadow-lg shadow-blue-500/30 transition-all transform active:scale-95">
        Posting
      </button>
    </div>

  </form>
  </div>
</main>