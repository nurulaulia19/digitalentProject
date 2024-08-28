<!-- resources/views/header.blade.php -->
<header>
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h1>Selamat Datang di Desa Pasekan</h1>
        <p class="mt-3">Wisata Alam Pantai Tiris</p>
      </div>
      <div>
        <img
          src="{{ asset('img/pantai.png') }}"
          alt="Header Image"
          class="img-fluid w-100"
          style="height: 150px; object-fit: cover"
        />
      </div>
      <nav class="d-flex justify-content-start py-3">
        <ul class="nav nav-pills">
          <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link active" aria-current="page">Beranda</a>
          </li>
          <li class="nav-item"><a href="{{ url('/about') }}" class="nav-link">About</a></li>
          <li class="nav-item">
            <a href="{{ url('/obyek-wisata') }}" class="nav-link">Obyek Wisata</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/fasilitas-wisata') }}" class="nav-link">Fasilitas Wisata</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/paket-wisata') }}" class="nav-link">Paket Wisata</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/pantai-tiris') }}" class="nav-link">Pantai Tiris</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('pesanan.index') }}" class="nav-link">Pemesanan</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/gallery') }}" class="nav-link">Gallery</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/login') }}" class="nav-link">Login</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>
