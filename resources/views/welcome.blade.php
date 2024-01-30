@extends('layouts.master')

@section('content')

    {{-- navbar start --}}
    <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand text-light" href="#" style="font-size: 24px; font-weight: bold;">Beasiswa</a>
            <ul class="navbar-nav d-flex flex-row">
            </ul>
        </div>
    </nav>
    {{-- navbar end --}}

    <!-- Content -->
<div class="container mt-5">
    <div class="jumbotron text-center with-opacity" style="background-color: #f2f2f2; padding: 20px;">
        <div class="decorative-shape"></div> <!-- Elemen dekoratif -->
        <img src="{{ asset('images/beas.jpeg') }}" alt="img" style="max-width: 100%; height: auto;">
        <h1 class="display-4" style="font-family: 'Roboto', sans-serif; color: #333;">Selamat Datang di Program Beasiswa!</h1>
        <p class="lead" style="font-family: 'Arial', sans-serif; color: #555;">Dapatkan kesempatan untuk mendapatkan beasiswa dan raih pendidikan impian Anda.</p>
        <hr class="my-4">
        <p class="text-muted" style="font-family: 'Arial', sans-serif; color: #777;">Pelajari kriteria beasiswa dan segera ajukan permohonan.</p>
        <a class="btn btn-primary btn-lg hover-effect" href="/beasiswa/create" role="button" style="font-family: 'Verdana', sans-serif; transition: background-color 0.3s ease;">Daftar Beasiswa</a>
        <style>
            .hover-effect:hover {
                background-color: #0056b3; /* Ganti warna sesuai preferensi Anda */
            }
        </style>
    </div>
</div>



@endsection
