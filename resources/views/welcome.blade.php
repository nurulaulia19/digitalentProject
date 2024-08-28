<!-- resources/views/welcome.blade.php -->
@extends('layouts/main')

@section('title', 'Beranda - Desa Pasekan')

@section('styles')
<style>
  /* Add any page-specific styles here */
  .welcome-banner {
    background-color: #f8f9fa;
    padding: 20px;
  }
</style>
@endsection

@section('content')
<div class="welcome-banner">
  <div class="container d-flex justify-content-between">
    <div class="d-flex flex-wrap">
      <div class="card m-2" style="width: 18rem">
        <img
          src="{{ asset('img/pantai.png') }}"
          class="card-img-top card-img-hover"
          alt="Pemandangan Pantai"
        />
        <div class="card-body">
          <h5 class="card-title">Liburan Santai di Pantai Tropis</h5>
          <p class="card-text">
            Nikmati keindahan pantai berpasir putih dengan ombak yang tenang.
            Tempat yang sempurna untuk bersantai dan menikmati matahari
            terbenam.
          </p>
        </div>
      </div>

      <div class="card m-2" style="width: 18rem">
        <img
          src="{{ asset('img/pantai.png') }}"
          class="card-img-top card-img-hover"
          alt="Panorama Pantai"
        />
        <div class="card-body">
          <h5 class="card-title">
            Eksplorasi Pantai: Keindahan Alam yang Memukau
          </h5>
          <p class="card-text">
            Temukan pesona pantai tersembunyi dengan air jernih dan
            pemandangan alam yang luar biasa. Cocok untuk liburan keluarga
            atau petualangan pribadi.
          </p>
        </div>
      </div>
    </div>

    <div style="display: block">
      <!-- Video YouTube dengan iframe -->
      <iframe width="300" height="200"
      src="https://www.youtube.com/embed/M6S-I1FqGGw?si=pBIR7zo2lfoQKbfF"
      title="YouTube video player" frameborder="0" allow="accelerometer;
      autoplay; clipboard-write; encrypted-media; gyroscope;
      picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin"
      allowfullscreen></iframe>

      <!-- Video dari assets lokal -->
      <video width="300" height="200" controls style="display: block">
          <source src="{{ asset('img/pantai.mp4') }}" type="video/mp4" />
        Your browser does not support the video tag.
      </video>
    </div>
  </div>
</div>
@endsection
