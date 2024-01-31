@extends('layouts.master')

@section('content')

    {{-- navbar start --}}
    <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand text-light" href="#" style="font-size: 24px; font-weight: bold;">Beasiswa </a>
            <ul class="navbar-nav d-flex flex-row">
                <li class="nav-item me-4">
                    <a
                        href="/"
                        class="nav-link text-light py-2"
                        >Home</a
                    >
                </li>
                <li class="nav-item me-4">
                    <a
                        href="/beasiswa/chart"
                        class="nav-link text-light py-2"
                        >Chart</a
                    >
                </li>
        </div>
    </nav>
    {{-- navbar end --}}

    <div class="container mt-4">
        <h1 class="text-center mb-4">Daftar Beasiswa </h1>
        <a href="/beasiswa/create" class="btn btn-success">+ Registrasi Beasiswa</a>
        <table class="table table-hover" style="border: 2px solid #dee2e6;">
            <thead>
                <tr>
                    <th style="border: 2px solid #dee2e6;">No</th>
                    <th style="border: 2px solid #dee2e6;">Nama</th>
                    <th style="border: 2px solid #dee2e6;">Email</th>
                    <th style="border: 2px solid #dee2e6;">Nomer HP</th>
                    <th style="border: 2px solid #dee2e6;">Semester</th>
                    <th style="border: 2px solid #dee2e6;">IPK Terakhir</th>
                    <th style="border: 2px solid #dee2e6;">Pilihan Beasiswa</th>
                    <th style="border: 2px solid #dee2e6;">Upload Berkas</th>
                    <th style="border: 2px solid #dee2e6;">Status Pengajuan</th>
                    <th style="border: 2px solid #dee2e6;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $counter = 1 @endphp
                @foreach ($beasiswa as $b)
                <tr>
                    <td style="border: 2px solid #dee2e6;">{{ $counter++ }}</td>
                    <td style="border: 2px solid #dee2e6;">{{ $b->nama }}</td>
                    <td style="border: 2px solid #dee2e6;">{{ $b->email }}</td>
                    <td style="border: 2px solid #dee2e6;">{{ $b->nomer_hp }}</td>
                    <td style="border: 2px solid #dee2e6;">{{ $b->semester }}</td>
                    <td style="border: 2px solid #dee2e6;">{{ $b->ipk_terakhir }}</td>
                    <td style="border: 2px solid #dee2e6;">{{ $b->pilihan_beasiswa }}</td>
                    <td style="border: 2px solid #dee2e6;">{{ $b->upload_berkas }}</td>
                    <td style="border: 2px solid #dee2e6;">{{ $b->status_ajuan }}</td>
                    <td style="border: 2px solid #dee2e6;">
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a class="btn btn-warning me-2 rounded" href="/beasiswa/{{ $b->id }}/edit">Edit</a>
                            <form action="/beasiswa/{{ $b->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <input class="btn btn-danger me-2 rounded" type="submit" value="Delete" onclick="return confirm('Apakah yakin ingin menghapus data beasiswa?')">
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


