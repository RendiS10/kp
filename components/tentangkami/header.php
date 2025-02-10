<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tentang Kami</title>
    <link
      rel="icon"
      href="public/assets/images/logo/LS-logo-master.png"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="public/css/style.css" />
    <link rel="stylesheet" href="public/css/responsive.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- Section Header -->
    <header class="navbar">
      <div class="containernav">
        <div class="logo">
          <img
            src="public/assets/images/logo/LS-logo-master.png"
            alt="LS-Logo"
          />
        </div>
        <div class="search-bar">
          <i class="fas fa-search"></i>
          <input
            type="text"
            placeholder="Cari Kelas Yang ingin Kamu Pelajari"
          />
        </div>
        <nav class="menu">
          <ul>
            <li>
              <a
                href="https://luarsekolah.com/prakerja"
                target="_blank"
                onclick="changeColor2(this)"
                >Prakerja</a
              >
            </li>
            <li>
              <a
                href="https://belajarbekerja.com/"
                target="_blank"
                onclick="changeColor2(this)"
                >Belajar Bekerja</a
              >
            </li>
            <li>
              <a
                href="https://luarsekolah.com/indonesia-skills-week"
                target="_blank"
                onclick="changeColor2(this)"
                >Indonesia Skills Week</a
              >
            </li>
          </ul>
        </nav>
        <div class="auth-buttons">
          <button class="btn" onclick="changeColor(this)">
            <a href="https://luarsekolah.com/masuk" target="_blank"> Masuk</a>
          </button>
          <button class="btn" onclick="changeColor(this)">
            <a href="https://luarsekolah.com/daftar" target="_blank">Daftar</a>
          </button>
        </div>
        <div class="hamburger" onclick="toggleMenu()">
          <i class="fas fa-bars"></i>
        </div>
      </div>
    </header>