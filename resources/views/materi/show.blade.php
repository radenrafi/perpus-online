@extends('layout.app')

@section('title', $materi->judul)

@section('content')
<div class="container mt-5">
    <h1 class="text-center">{{ $materi->judul }}</h1>
    <div class="row mt-5">
        <div class="col-3">
            <div class="d-flex justify-content-center">
                <img src="{{asset("gambar/buku/$materi->gambar")}}" width="auto" height="400" alt="">
            </div>
        </div>
        <div class="col">
            <div class="mt-5">
                <p>
                    Kategori : {{ $materi->kategori }}
                    <br>
                    Pengarang : {{ $materi->guru }}
                    <br>
                    Tahun Terbit : {{ $materi->tahun_terbit}}
                </p>
                <p>
                    Sinopsis :
                    <br>
                    {{ $materi->sinopsis }}
                </p>
                <a class="btn btn-primary" href="#" role="button">Download</a>
            </div>
        </div>
    </div>
    <div>
        <embed src="{{ asset("modul/bambang yoi.pdf") }}" type="application/pdf" width="100%" height="1600px" />
    </div>
</div>
@endsection
