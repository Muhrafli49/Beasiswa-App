@extends('layouts.master')

@section('content')

    {{-- navbar start --}}
    <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand text-light" href="#" style="font-size: 24px; font-weight: bold;">Beasiswa</a>
            <ul class="navbar-nav d-flex flex-row">
                <li class="nav-item me-4">
                    <a href="#" class="nav-link text-light py-2">Daftar</a>
                </li>
                <li class="nav-item me-4">
                    <a href="/hasil" class="nav-link text-light py-2">Hasil</a>
                </li>
                <li class="nav-item ms-auto">
                    <a href="/" class="nav-link text-light py-2">Home</a>
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
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" >
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
                <input type="number" class="form-control" id="nomerHP" name="nomer_hp" placeholder="Masukkan Nomer HP">
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
                <input type="text" class="form-control" id="ipk" name="ipk_terakhir" placeholder="Masukkan IPK Terakhir" oninput="checkInput()">
            </div>

            {{-- Pilihan Beasiswa --}}
            <div class="mb-3">
                <label for="pilihanBeasiswa" class="form-label">Pilihan Beasiswa</label>
                <select class="form-select" id="pilihanBeasiswa" name="pilihan_beasiswa" id="pilihanBeasiswa" oninput="checkInput()">
                    <option value="" selected disabled>Pilih Beasiswa</option>
                    <option value="Beasiswa Akademik">Beasiswa Akademik</option>
                    <option value="Beasiswa Non Akademik">Beasiswa Non Akademik</option>
                    <option value="Beasiswa Kemendikbud">Beasiswa Kemendikbud</option>
                </select>
            </div>

            {{-- Upload Berkas --}}
            <div class="mb-3">
                <label for="uploadBerkas" class="form-label">Upload Berkas</label>
                <input type="file" class="form-control" id="uploadBerkas" name="upload_berkas" oninput="checkInput()">
            </div>

            {{-- Tombol Daftar dan Batal --}}
            <div class="mb-3 d-flex justify-content-end">
                <button type="submit" name="submit" value="daftar" id="submitBtn" class="btn btn-primary me-2" >Daftar</button>
                <button type="button" class="btn btn-secondary" onclick="resetFormAndRefresh()">Batal</button>
            </div>                     
        </form>
    </div>
    {{-- Form End --}}

    {{-- Footer --}}
<footer class="bg-dark text-light text-center p-3 mt-5">
    © 2024 Copyright All Rights Reserved - Muhamad Rafli 20102031
</footer>

<script>
    function checkInput() {
        var inputNumber = document.getElementById('ipk').value;
        var submitButton = document.getElementById('submitBtn');
        var pilihanBeasiswa = document.getElementById('pilihanBeasiswa');
        var uploadBerkas = document.getElementById('uploadBerkas');

        if (inputNumber < 3) {
            submitButton.disabled = true;
            pilihanBeasiswa.disabled = true;
            uploadBerkas.disabled = true;
        } else {
            submitButton.disabled = false;
            pilihanBeasiswa.disabled = false;
            uploadBerkas.disabled = false;
        }
    }
</script>


<script>
    $(document).ready(function() {
    $('#nama').on('input', function() {
        var nama = $(this).val();

        // Lakukan request Ajax
        $.ajax({
            url: '/get-ipk-by-nama',  // Ganti dengan URL endpoint di controller Anda
            type: 'GET',
            data: { nama: nama },
            success: function(data) {
                // Isi nilai IPK ke dalam input IPK
                $('#ipk').val(data.ipk);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
});
</script>
@endsection

