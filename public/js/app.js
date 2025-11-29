document.addEventListener("DOMContentLoaded", () => {
  // Pastikan fungsi-fungsi ini sudah ada di file js masing-masing
  if (typeof setupDropdownLogic === "function") setupDropdownLogic();

  // Panggil fungsi dari theme.js
  if (typeof setupThemeToggle === "function") {
    setupThemeToggle();
  } else {
    console.error(
      "Fungsi setupThemeToggle tidak ditemukan. Cek load order script."
    );
  }

  if (typeof setupSidebarActiveState === "function") setupSidebarActiveState();
});
