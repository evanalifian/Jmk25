const dropArea = document.getElementById("drop-area");
const fileInput = document.getElementById("file-upload");
const previewContainer = document.getElementById("preview-container");
const uploadPlaceholder = document.getElementById("upload-placeholder");
const imgPreview = document.getElementById("img-preview");
const videoPreview = document.getElementById("video-preview");

// 1. KLIK SELECT MANUAL
dropArea.addEventListener("click", (e) => {
  // Agar tombol hapus tidak memicu dialog file
  if (e.target.closest("button")) return;
  fileInput.click();
});

// 2. MENANGANI DRAG & DROP
// Mencegah browser membuka file di tab baru (Wajib ada)
["dragenter", "dragover", "dragleave", "drop"].forEach((eventName) => {
  dropArea.addEventListener(eventName, preventDefaults, false);
});

function preventDefaults(e) {
  e.preventDefault();
  e.stopPropagation();
}

// Efek Visual saat file ditarik ke dalam area (Highlight)
["dragenter", "dragover"].forEach((eventName) => {
  dropArea.addEventListener(
    eventName,
    () => {
      dropArea.classList.add("border-blue-500", "bg-mainGray/20");
      dropArea.classList.remove("border-mainGray");
    },
    false
  );
});

// Hapus Efek Visual saat file dilepas atau keluar area
["dragleave", "drop"].forEach((eventName) => {
  dropArea.addEventListener(
    eventName,
    () => {
      dropArea.classList.remove("border-blue-500", "bg-mainGray/20");
      dropArea.classList.add("border-mainGray");
    },
    false
  );
});

// PROSES SAAT FILE DIJATUHKAN (DROP)
dropArea.addEventListener("drop", handleDrop, false);

function handleDrop(e) {
  const dt = e.dataTransfer;
  const files = dt.files;

  // Masukkan file yang di-drop ke dalam input file agar bisa disubmit
  fileInput.files = files;

  // Panggil fungsi preview
  previewFile();
}

// 3. FUNGSI PREVIEW GAMBAR/VIDEO
function previewFile() {
  const file = fileInput.files[0];

  if (file) {
    const reader = new FileReader();

    reader.onload = function (e) {
      uploadPlaceholder.classList.add("hidden");
      previewContainer.classList.remove("hidden");

      if (file.type.startsWith("image/")) {
        imgPreview.src = e.target.result;
        imgPreview.classList.remove("hidden");
        videoPreview.classList.add("hidden");
        videoPreview.src = "";
      } else if (file.type.startsWith("video/")) {
        videoPreview.src = e.target.result;
        videoPreview.classList.remove("hidden");
        imgPreview.classList.add("hidden");
      }
    };
    reader.readAsDataURL(file);
  }
}

// 4. RESET FILE
function removeFile() {
  fileInput.value = "";

  previewContainer.classList.add("hidden");
  uploadPlaceholder.classList.remove("hidden");
  imgPreview.src = "";
  videoPreview.src = "";
}
