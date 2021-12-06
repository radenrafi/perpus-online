@extends('layout.app')

@section('title', 'Tambah Bahan Ajar')

@section('content')
    <div class="container">
        @if (session()->has('pesan'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('pesan') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <h1>Form Penambahan Bahan Ajar</h1>
        <form action="{{ route('materi.store') }}" method="POST" enctype="multipart/form-data" class="form">
            <div class="form-group mb-3">
                <label for="judul">Judul Materi</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" value="{{old('judul')}}">
                @error('judul')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="kategori">Kategori</label>
                <select class="form-select" name="kategori" id="kategori">
                    <option selected>-- Pilih kategori --</option>
                    <option value="modul"
                        {{ old('kategori') == 'modul' ? 'selected' : ''}}>
                        Modul
                    </option>
                    <option value="ppt"
                        {{ old('kategori') == 'ppt' ? 'selected' : ''}}>
                        Power Point
                    </option>
                </select>
                @error('kategori')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group mb-3">
                        <label for="mata_pelajaran">Mata Pelajaran</label>
                        <select class="form-select" name="mata_pelajaran" id="mata_pelajaran">
                            <option selected>-- Pilih Mata Pelajaran --</option>
                            <option value="ipa"
                                {{ old('mata_pelajaran') == 'ipa' ? 'selected' : ''}}>
                                Ilmu Pengetahuan Alam
                            </option>
                            <option value="tik"
                                {{ old('mata_pelajaran') == 'tik' ? 'selected' : ''}}>
                                TIK
                            </option>
                            <option value="mat"
                                {{ old('mata_pelajaran') == 'mat' ? 'selected' : ''}}>
                                Matematika
                            </option>
                            <option value="mat"
                                {{ old('mata_pelajaran') == 'mat' ? 'selected' : ''}}>
                                Matematika
                            </option>
{{--
IPS
Mat
agama
ppkn
b. indo
b. inggris
tik
b. daerah
seni budaya
penjaskes
bk --}}
                        </select>
                        @error('mata_pelajaran')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mb-3">
                        <label for="kelas">Kelas</label>
                        <select class="form-select" name="kelas" id="kelas">
                            <option selected>-- Pilih kelas --</option>
                            <option value="7"
                                {{ old('kelas') == '7' ? 'selected' : ''}}>
                                Kelas 7
                            </option>
                            <option value="8"
                                {{ old('kelas') == '8' ? 'selected' : ''}}>
                                Kelas 8
                            </option>
                            <option value="9"
                                {{ old('kelas') == '9' ? 'selected' : ''}}>
                                Kelas 9
                            </option>
                        </select>
                        @error('kelas')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="guru">Guru</label>
                <input type="text" class="form-control @error('guru') is-invalid @enderror" name="guru" id="guru" value="{{old('guru')}}" >
                @error('guru')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="tahun_terbit">Tahun Terbit</label>
                <input type="number" class="form-control @error('tahun_terbit') is-invalid @enderror" name="tahun_terbit" id="tahun_terbit" value="{{old('tahun_terbit')}}">
                @error('tahun_terbit')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="sinopsis">Sinopsis</label>
                <textarea name="sinopsis" id="sinopsis" cols="30" rows="3" class="form-control"> {{old('sinopsis')}}</textarea>
                @error('sinopsis')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group mb-3">
                        <label for="gambar">Gambar Buku</label>
                        <input type="file" class="form-control  @error('gambar') is-invalid @enderror" name="gambar" id="gambar" value="{{old('gambar')}}">
                        @error('gambar')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mb-3">
                        <label for="file">Upload File</label>
                        <input type="file" class="form-control  @error('file') is-invalid @enderror" name="file" id="file" value="{{old('file')}}">
                        @error('file')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>


            <button type="submit" class="btn btn-primary mb-5" value="submit">Tambah</button>
            @csrf
        </form>
    </div>
@endsection
