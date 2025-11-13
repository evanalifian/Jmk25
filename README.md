# Jmk25

Jmk25 merupakan website tempat melihat dan mengupload meme dan tempat bisa berkomunikasi dengan berbagai user.

## Getting Started

Untuk menjalankan projeect ini, pastikan sudah menginstal PHP dan Database (RDBMS). Atau bisa menggunakan sebuah paket yang sudah menydiakan semuanya seperti XAMPP atau Laragon.

```bash
git clone https://github.com/evanalifian/Jmk25.git <nama_project(optional)>
composer update
composer dump-autoload
```

## Tech Stacks

1. Backend
    - PHP (Native)
2. Frontend
    - ...
3. Database
    - MySQL

## Project Structure

```bash
│   .gitignore
│   composer.json
│   composer.lock
│   README.md
│
├───app
│   ├───App
│   │       Router.php
│   │       View.php
│   │
│   ├───Controllers
│   │       HomeController.php
│   │       LandingPageController.php
│   │
│   └───Views
│       ├───pages
│       │   │   landing_page.php
│       │   │
│       │   ├───home
│       │   │       index.php
│       │   │
│       │   └───user
│       └───template
│               footer.php
│               header.php
│
├───public
│       index.php
│
├───test
```