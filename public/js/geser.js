function switchTab(tabName) {
  const sectionGroups = document.getElementById("section-groups");
  const sectionUsers = document.getElementById("section-users");
  const btnGroups = document.getElementById("btn-groups");
  const btnUsers = document.getElementById("btn-users");
  const slider = document.getElementById("tab-slider");

  if (tabName === "groups") {
    sectionGroups.classList.remove("hidden");
    sectionUsers.classList.add("hidden");

    // Tombol Aktif (Grup): Warna BG (Hitam/Gelap) karena backgroundnya Putih/Terang
    btnGroups.style.color = "var(--mainBg)";
    btnGroups.style.opacity = "1";

    // Tombol Mati (User): Warna Teks (Putih/Terang) tapi Transparan
    btnUsers.style.color = "var(--mainText)";
    btnUsers.style.opacity = "1";

    slider.style.transform = "translateX(0%)";
  } else {
    sectionUsers.classList.remove("hidden");
    sectionGroups.classList.add("hidden");

    // Tombol Aktif (User)
    btnUsers.style.color = "var(--mainBg)";
    btnUsers.style.opacity = "1";

    // Tombol Mati (Grup)
    btnGroups.style.color = "var(--mainText)";
    btnGroups.style.opacity = "1";

    slider.style.transform = "translateX(100%)";
    slider.style.left = "2px";
  }
}

function switchView(viewName) {
        const postsDiv = document.getElementById('view-posts');
        const membersDiv = document.getElementById('view-members');
        const tabPosts = document.getElementById('tab-posts');
        const tabMembers = document.getElementById('tab-members');
        const activeClass = ['text-blue-500', 'border-blue-500'];
        const inactiveClass = ['hover:text-mainText', 'border-transparent'];

        if(viewName === 'posts') {
            postsDiv.classList.remove('hidden');
            membersDiv.classList.add('hidden');
            tabPosts.classList.add(...activeClass);
            tabPosts.classList.remove(...inactiveClass);
            tabMembers.classList.remove(...activeClass);
            tabMembers.classList.add(...inactiveClass);
        } else {
            membersDiv.classList.remove('hidden');
            postsDiv.classList.add('hidden');
            tabMembers.classList.add(...activeClass);
            tabMembers.classList.remove(...inactiveClass);
            tabPosts.classList.remove(...activeClass);
            tabPosts.classList.add(...inactiveClass);
        }
    }

function handleFollow(btn, userId) {
  // 1. Ubah tampilan tombol biar terlihat loading/proses
  const originalText = btn.innerText;
  btn.innerText = "Processing...";
  btn.style.opacity = "0.7";

  // 2. Kirim data ke server (Controller)
  const formData = new FormData();
  formData.append("user_id", userId);

  fetch("/user/follow", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.status === "success") {
        // 3. Jika berhasil, ubah tombol jadi "Followed"
        btn.innerText = "Followed";
        btn.style.backgroundColor = "var(--accent)";
        btn.style.color = "white";
        btn.disabled = true; // Matikan tombol biar gak diklik lagi
        btn.style.opacity = "1";
      } else {
        // Jika gagal (misal sudah follow), kembalikan tombol
        alert(data.message);
        btn.innerText = originalText;
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      btn.innerText = originalText;
    });
}

function handleJoin(btn, groupId) {
    // 1. Efek Loading
    const originalText = btn.innerText;
    btn.innerText = "...";
    btn.disabled = true;
    btn.style.opacity = "0.7";

    // 2. Data
    const formData = new FormData();
    formData.append('group_id', groupId);

    // 3. Fetch ke Controller
    fetch('/group/join', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json()) // Harap controller mengembalikan JSON
    .then(data => {
        if (data.status === 'success') {
            // BERHASIL: Ubah tampilan tombol jadi "Joined" permanen
            btn.innerText = "Joined";
            
            // Hapus class tombol aktif (hitam)
            btn.classList.remove('bg-black', 'hover:bg-gray-900', 'border-gray-700');
            
            // Tambah class tombol disable (abu-abu)
            btn.classList.add('bg-gray-600', 'border-gray-500', 'cursor-default', 'opacity-80');
            
            // Pastikan tetap disabled
            btn.disabled = true;
        } else {
            // GAGAL: Kembalikan tombol
            alert('Gagal bergabung: ' + (data.message || 'Error'));
            btn.innerText = originalText;
            btn.disabled = false;
            btn.style.opacity = "1";
        }
    })
    .catch(error => {
        console.error('Error:', error);
        btn.innerText = originalText;
        btn.disabled = false;
        btn.style.opacity = "1";
    });
}

function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profile-preview').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}