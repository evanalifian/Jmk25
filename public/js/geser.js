function switchTab(tabName) {
        const sectionGroups = document.getElementById('section-groups');
        const sectionUsers = document.getElementById('section-users');
        const btnGroups = document.getElementById('btn-groups');
        const btnUsers = document.getElementById('btn-users');
        const slider = document.getElementById('tab-slider');

        if (tabName === 'groups') {
            sectionGroups.classList.remove('hidden');
            sectionUsers.classList.add('hidden');

            // Tombol Aktif (Grup): Warna BG (Hitam/Gelap) karena backgroundnya Putih/Terang
            btnGroups.style.color = 'var(--mainBg)';
            btnGroups.style.opacity = '1';

            // Tombol Mati (User): Warna Teks (Putih/Terang) tapi Transparan
            btnUsers.style.color = 'var(--mainText)';
            btnUsers.style.opacity = '1';

            slider.style.transform = 'translateX(0%)';
        } else {
            sectionUsers.classList.remove('hidden');
            sectionGroups.classList.add('hidden');

            // Tombol Aktif (User)
            btnUsers.style.color = 'var(--mainBg)';
            btnUsers.style.opacity = '1';

            // Tombol Mati (Grup)
            btnGroups.style.color = 'var(--mainText)';
            btnGroups.style.opacity = '1';

            slider.style.transform = 'translateX(100%)';
            slider.style.left = '2px';
        }
    }