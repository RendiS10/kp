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
            <a href="https://authentication.luarsekolah.com/?q=eyJpdiI6ImMvS3YzTml4bGhPVno3V0ZyTC9xakE9PSIsInZhbHVlIjoiQUM0bG5GRFl5elEyRjlwcTBYUGVCdlFBcHNHWXNpRlRoMGlaUXdud1lkRUcyUlhiTkliWnZ1cXdhZmJhYXhEWiIsIm1hYyI6ImJiZTJhODE2OGU4NWE5ZDU2YjM0ZjViNjVhMWNhYTMxYWI2ZjRmMmY1MGMyOTFkZGMxMGYyZTk0Y2JhYTc5NGMifQ==" target="_blank"> Masuk</a>
          </button>
          <button class="btn" onclick="changeColor(this)">
            <a href="https://authentication.luarsekolah.com/daftar?q=eyJpdiI6IlEvR1laU3lhajdPRk5FU1NGaXFHMGc9PSIsInZhbHVlIjoidTNuZTBGbDZCc1JtSUhGOUorcWtvRFMzWndWOFF4cmRCRlJLTUJXRGgzekZ4TkpzdUNieEVqRkRlMjc2cTdXZDg3VmlXeCs0cHg2R0czVWFUMUZBY1Q5cFpscnByK1gvaFROblhaUTh2eE09IiwibWFjIjoiODQ4MjczM2RmZGI1ZmY4OWVhMzNkYWM5YTljNjg2YTIwN2UwMDE1MjVkOTJjNzE3M2Y5ZDM0Zjc2ZjBjNmI5OCJ9 target="_blank">Daftar</a>
          </button>
        </div>
        <div class="hamburger" onclick="toggleMenu()">
          <i class="fas fa-bars"></i>
        </div>
      </div>
    </header>