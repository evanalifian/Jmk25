# Jmk25

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![Docker](https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=docker&logoColor=white)
![Nginx](https://img.shields.io/badge/Nginx-009639?style=for-the-badge&logo=nginx&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![NPM](https://img.shields.io/badge/npm-CB3837?style=for-the-badge&logo=npm&logoColor=white)
![Composer](https://img.shields.io/badge/Composer-885630?style=for-the-badge&logo=composer&logoColor=white)

> Platform web untuk sharing dan eksplorasi meme, ditujukan untuk kalangan "mahasigma" dengan fitur interaksi sosial yang dinamis.

---

## Features

Jmk25 adalah aplikasi web berbasis komunitas yang didesain untuk sharing meme dan interaksi sosial. Berikut fitur-fitur utamanya:

*   **Manajemen Post Meme:** User bisa bikin, upload, dan kelola postingan meme sendiri, jadi pusat konten kreatif.
*   **Profil User yang Lengkap:** Setiap user punya halaman profil sendiri untuk nampilin postingan, info, dan aktivitas mereka di platform.
*   **Sistem Autentikasi & Otorisasi:** Mengelola registrasi user, login, dan akses ke route atau fitur tertentu lewat middleware yang secure.
*   **Interaksi Sosial:** Fitur likes dan comment yang memungkinkan user berinteraksi langsung dengan postingan.
*   **Bookmark:** User bisa bookmark postingan favorit mereka untuk akses cepat nanti.
*   **Manajemen Grup:** Bisa bikin dan kelola grup untuk interaksi di antara komunitas dengan minat yang sama.
*   **Arsitektur MVC Custom:** Menggunakan pattern Model-View-Controller (MVC) yang dibangun native di PHP untuk struktur yang jelas dan scalable.
*   **UI Modern & Responsif:** Pakai Tailwind CSS untuk styling yang clean, adaptif, dan responsif di berbagai device.
*   **Deployment dengan Container:** Pakai Docker dan Docker Compose untuk packaging aplikasi dan server environment (PHP-FPM dengan Nginx).

## Tech Stack

| Kategori            | Teknologi       | Keterangan                                                                                        |
| :------------------ | :-------------- | :------------------------------------------------------------------------------------------------ |
| **Backend**         | PHP (Native)    | Core programming language untuk server logic dan API.                                             |
|                     | Composer        | Dependency manager untuk package PHP.                                                             |
|                     | vlucas/phpdotenv| Untuk manage environment variables dengan aman.                                                  |
| **Frontend**        | HTML, CSS, JS   | Standard web untuk struktur, styling, dan interaktivitas client-side.                            |
|                     | Tailwind CSS    | CSS framework utility-first untuk desain UI yang cepat dan responsif.                            |
| **Package Manager** | NPM             | Untuk manage frontend development dependencies, khususnya Tailwind CSS.                          |
| **Database**        | MySQL           | Relational database untuk nyimpen data user, post, comment, dll.                                  |
| **Deployment**      | Docker          | Platform untuk packaging aplikasi dan dependencies ke dalam container.                            |
|                     | Docker Compose  | Tool untuk define dan run multi-container Docker applications.                                    |
|                     | Nginx           | High-performance web server yang serve aplikasi PHP lewat PHP-FPM di environment Docker.         |

## Arsitektur

Jmk25 dibangun dengan arsitektur Model-View-Controller (MVC) custom menggunakan PHP native. Struktur ini memastikan pemisahan yang jelas antara business logic, data representation, dan user interface.

*   `app/`: Berisi core application logic. Mengikuti pattern MVC dengan folder terpisah untuk `Controllers`, `Models`, dan `Views`, plus `Middlewares` untuk auth/authorization dan `Service` untuk business logic. Folder `App` berisi framework components seperti `Router` dan `View`.
*   `public/`: Folder yang publicly accessible, sebagai entry point aplikasi (`index.php`). Juga tempat static assets seperti CSS (`global.css`, compiled by Tailwind), JavaScript, dan images.
*   `config/`: File konfigurasi untuk database dan Nginx.
*   `Dockerfile`: Instruksi untuk Docker cara build PHP application image.
*   `docker-compose.yml`: Define dan orchestrate multi-container environment, termasuk PHP app dan Nginx web server.
*   `package.json` & `tailwind.config.js`: Configuration dan dependencies untuk frontend development, khususnya Tailwind CSS.
*   `composer.json`: Configuration dan dependencies untuk PHP project.

## Get Started

Ikuti langkah-langkah berikut untuk setup dan run Jmk25 di local development environment.

### Prerequisites

Pastikan sudah install software berikut di sistem:

*   [**Docker**](https://docs.docker.com/get-docker/) dan [**Docker Compose**](https://docs.docker.com/compose/install/)
*   [**Node.js**](https://nodejs.org/en/download/) (yang include NPM)
*   Instance database **MySQL** yang bisa diakses oleh aplikasi.

### Running App

1.  **Clone Repository:**
    ```bash
    git clone https://github.com/evanalifian/Jmk25.git
    cd Jmk25
    ```

2.  **Setup Environment Variables:**
    Bikin file `.env` di root project. Define environment variables penting, terutama untuk database connection. Contoh:
    ```
    DB_HOST=host.docker.internal # Atau IP address host database kalau bukan Docker Desktop
    DB_PORT=3306
    DB_NAME=jmk25_db
    DB_USER=root
    DB_PASS=password
    ```
    *Note: Pastikan MySQL server sudah running dan accessible dengan credentials yang ditentukan.*

3.  **Build dan Run Docker Containers:**
    ```bash
    docker-compose up -d --build
    ```
    Ini akan build Docker image untuk PHP app dan start services `app` (PHP) dan `web` (Nginx) di background.

4.  **Install PHP Dependencies (di dalam App Container):**
    ```bash
    docker-compose exec app composer install
    ```
    Command ini akan run `composer install` di dalam container `app` untuk install semua PHP dependencies yang diperlukan.

5.  **Install Frontend Dependencies & Compile Assets:**
    ```bash
    npm install
    npm run dev
    ```
    *   `npm install` akan install Tailwind CSS dan frontend dependencies lainnya di host.
    *   `npm run dev` akan start Tailwind CSS watch process, yang otomatis compile file `public/css/input.css` ke `public/css/global.css` setiap ada perubahan. Biarkan process ini running di terminal terpisah selama development.

6.  **Akses Aplikasi:**
    Buka web browser dan navigate ke:
    ```
    http://localhost:3000
    ```
    Sekarang aplikasi Jmk25 sudah running.

## Struktur File

```
/
├── .gitignore
├── Dockerfile
├── README.md
├── app
│   ├── App
│   │   ├── Router.php
│   │   └── View.php
│   ├── Config
│   │   └── Database.php
│   ├── Controllers
│   │   ├── BookmarkController.php
│   │   ├── CommentController.php
│   │   ├── GroupController.php
│   │   ├── HomeController.php
│   │   ├── LandingPageController.php
│   │   ├── LikesController.php
│   │   ├── PostController.php
│   │   ├── ProfileController.php
│   │   └── UserController.php
│   ├── Exception
│   │   └── ValidationException.php
│   ├── Middlewares
│   │   ├── IsAuthMiddleware.php
│   │   ├── IsNotauthMiddleware.php
│   │   └── Middleware.php
│   ├── Models
│   │   ├── BookmarkModel.php
│   │   ├── CommentModel.php
│   │   ├── GroupModel.php
│   │   ├── LikesModel.php
│   │   ├── PostModel.php
│   │   ├── ProfileModel.php
│   │   └── UserModel.php
│   ├── Service
│   │   └── UserService.php
│   └── Views
│       ├── pages
│       │   ├── bookmark
│       │   │   └── index.php
│       │   ├── group
│       │   │   ├── explore.php
│       │   │   └── group_display.php
│       │   ├── home
│       │   │   ├── dashboard.php
│       │   │   └── landing.php
│       │   ├── post
│       │   │   └── create.php
│       │   ├── profile
│       │   │   └── index.php
│       │   └── user
│       │       ├── signin.php
│       │       └── signup.php
│       ├── partials
│       │   ├── ContentCard.php
│       │   ├── CreateGrupModal.php
│       │   ├── DeleteModal.php
│       │   ├── ImageModal.php
│       │   ├── Interact.php
│       │   └── ...
├── composer.json
├── docker-compose.yml
├── package.json
└── tailwind.config.js
```

---

## Tim Pengembang

<div align="center">

<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top">
      <a href="https://github.com/evanalifian">
         <div style="width:100px; height:100px; overflow:hidden; border-radius:50%;">
            <img src="https://github.com/evanalifian.png" width="100" height="100" style="object-fit: cover;"/>
            <br><sub><b>Evan</b></sub>
         </div>
      </a>
    </td>
    <td align="center" valign="top">
      <a href="https://github.com/JayroFadil">
         <div style="width:100px; height:100px; overflow:hidden; border-radius:50%;">
            <img src="https://github.com/JayroFadil.png" width="100" height="100" style="object-fit: cover;"/>
            <br><sub><b>Fadil</b></sub>
         </div>
      </a>
    </td>
    <td align="center" valign="top">
      <a href="https://github.com/Roti18">
         <div style="width:100px; height:100px; overflow:hidden; border-radius:50%;">
            <img src="https://github.com/Roti18.png" width="100" height="100" style="object-fit: cover;"/>
            <br><sub><b>Roni</b></sub>
         </div>
      </a>
    </td>
    <td align="center" valign="top">
      <a href="https://github.com/lailatulhasanah0304">
         <div style="width:100px; height:100px; overflow:hidden; border-radius:50%;">
            <img src="https://github.com/lailatulhasanah0304.png" width="100" height="100" style="object-fit: cover;"/>
            <br><sub><b>Laila</b></sub>
         </div>
      </a>
    </td>
    <td align="center" valign="top">
      <a href="https://github.com/RobbaniyahUmdatunN1">
         <div style="width:100px; height:100px; overflow:hidden; border-radius:50%;">
            <img src="https://github.com/RobbaniyahUmdatunN1.png" width="100" height="100" style="object-fit: cover;"/>
            <br><sub><b>Nia</b></sub>
         </div>
      </a>
    </td>
  </tr>
</table>

</div>