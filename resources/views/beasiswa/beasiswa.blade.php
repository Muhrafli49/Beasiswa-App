@extends('layouts.master')

@section('content')

    {{-- navbar start --}}
    <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand text-light" href="#" style="font-size: 24px; font-weight: bold;">Beasiswa</a>
            <ul class="navbar-nav d-flex flex-row">
                <li class="nav-item me-4">
                    <a
                        href="#"
                        class="nav-link text-light py-2"
                        >Daftar</a
                    >
                </li>
                <li class="nav-item ms-auto">
                    <a
                        href="/hasil"
                        class="nav-link text-light py-2"
                        >Hasil</a
                    >
                </li>
            </ul>
        </div>
    </nav>
    {{-- navbar end --}}

    {{-- Form Start --}}
    <div class="container mt-4">
        <h1 class="text-center mb-4">Registrasi Beasiswa</h1>
        <form action="/beasiswa/store" method="POST" id="beasiswaForm" class="mx-auto" style="max-width: 800px;">
            @csrf
            {{-- Nama --}}
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
            </div>

            {{-- Email --}}
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Masukkan email dengan format yang benar">
                <small id="emailHelp" class="form-text text-muted">Contoh: nama@example.com</small>
            </div>

            {{-- Nomer HP --}}
            <div class="mb-3">
                <label for="nomerHP" class="form-label">Nomer HP</label>
                <input type="tel" class="form-control" id="nomerHP" name="nomer_hp" placeholder="Masukkan Nomer HP">
            </div>

            {{-- Semester --}}
            <div class="mb-3">
                <label for="semester" class="form-label">Semester</label>
                <select class="form-select" id="semester" name="semester">
                    <option value="" selected disabled>Pilih Semester</option>
                    <option value="1">Semester 1</option>
                    <option value="2">Semester 2</option>
                    <option value="3">Semester 3</option>
                    <option value="4">Semester 4</option>
                    <option value="5">Semester 5</option>
                    <option value="6">Semester 6</option>
                    <option value="7">Semester 7</option>
                    <option value="8">Semester 8</option>
                </select>
            </div>

            {{-- IPK Terakhir --}}
            <div class="mb-3">
                <label for="ipk" class="form-label">IPK Terakhir</label>
                <input type="text" class="form-control" id="ipk" name="ipk_terakhir" placeholder="Masukkan IPK Terakhir">
            </div>

            {{-- Pilihan Beasiswa --}}
            <div class="mb-3">
                <label for="pilihanBeasiswa" class="form-label">Pilihan Beasiswa</label>
                <select class="form-select" id="pilihanBeasiswa" name="pilihan_beasiswa">
                    <option value="" selected disabled>Pilih Beasiswa</option>
                    <option value="beasiswa1">Beasiswa 1</option>
                    <option value="beasiswa2">Beasiswa 2</option>
                    <option value="beasiswa3">Beasiswa 3</option>
                </select>
            </div>

            {{-- Upload Berkas --}}
            <div class="mb-3">
                <label for="uploadBerkas" class="form-label">Upload Berkas</label>
                <input type="file" class="form-control" id="uploadBerkas" name="upload_berkas">
            </div>

            {{-- Tombol Daftar dan Batal --}}
            <div class="mb-3 d-flex justify-content-end">
                <button type="submit" name="submit" value="daftar" class="btn btn-primary me-2" onclick="return confirm('Apakah yakin ingin menambahkan beasiswa?')">Daftar</button>
                <button type="button" class="btn btn-secondary" onclick="resetFormAndRefresh()">Batal</button>
            </div>                     
        </form>
    </div>
    {{-- Form End --}}

    {{-- Footer --}}
<footer class="bg-dark text-light text-center p-3 mt-5">
    © 2024 Copyright All Rights Reserved - Muhamad Rafli 20102031
</footer>
@endsection

