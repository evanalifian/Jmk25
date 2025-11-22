document.addEventListener("DOMContentLoaded", () => {
  const html = document.documentElement;
  const toggleButtons = document.querySelectorAll(".theme-toggle-btn");
  const appLogo = document.getElementById("app-logo");

  function updateAllIcons() {
    toggleButtons.forEach((btn) => {
      const icon = btn.querySelector("ion-icon");
      if (!icon) return;

      if (html.classList.contains("dark")) {
        icon.setAttribute("name", "sunny-outline");
      } else {
        icon.setAttribute("name", "moon-outline");
      }
    });
  }

  function updateLogo() {
    if (!appLogo) return;
    if (html.classList.contains("dark")) {
      appLogo.src = "/assets/logowhite.png";
    } else {
      appLogo.src = "/assets/logo.png";
    }
  }

  const savedTheme = localStorage.getItem("theme");
  if (
    savedTheme === "dark" ||
    (!savedTheme && window.matchMedia("(prefers-color-scheme: dark)").matches)
  ) {
    html.classList.add("dark");
  } else {
    html.classList.remove("dark");
  }

  updateAllIcons();
  updateLogo();

  if (toggleButtons.length === 0) {
    console.error(
      "❌ Tidak ada tombol dengan class '.theme-toggle-btn' ditemukan!"
    );
  } else {
    console.log(
      `✅ Ditemukan ${toggleButtons.length} tombol toggle. Siap digunakan.`
    );

    toggleButtons.forEach((btn) => {
      btn.addEventListener("click", () => {
        console.log("🖱️ Tombol diklik!");

        html.classList.toggle("dark");

        if (html.classList.contains("dark")) {
          localStorage.setItem("theme", "dark");
        } else {
          localStorage.setItem("theme", "light");
        }

        updateAllIcons();
        updateLogo();

        const icon = btn.querySelector("ion-icon");
        if (icon) {
          icon.classList.add("rotate-90");
          setTimeout(() => icon.classList.remove("rotate-90"), 300);
        }
      });
    });
  }
});
