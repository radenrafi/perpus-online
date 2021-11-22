<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bukus = Buku::all();
        return view('buku.index',['bukus'=>$bukus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Buku::class);
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judul' => 'required|max:50',
            'kategori' => 'required|max:20',
            'pengarang' => 'required',
            'tahun_terbit' => 'required',
            'sinopsis' => 'required',
            'gambar' => 'required|file|image|max:1000'
        ]);
        // dump($request);
        $extGambar = $request->gambar->getClientOriginalExtension();
        $pathGambar = "buku-".time().".".$extGambar;
        $pathStore = $request->gambar->move(public_path('gambar/buku'), $pathGambar);
        // dump($validateData);
        $buku = new Buku();
        $buku->judul = $validateData['judul'];
        $buku->kategori = $validateData['kategori'];
        $buku->pengarang = $validateData['pengarang'];
        $buku->tahun_terbit = $validateData['tahun_terbit'];
        $buku->sinopsis = $validateData['sinopsis'];
        $buku->gambar = $pathGambar;
        $buku->save();

        return redirect()->route('buku.create')->with('pesan', "Buku berhasil ditambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        if ($buku->kategori == "nonfiksi")
        {
            $buku->kategori = "Non Fiksi";
        }
        else
        {
            $buku->kategori = "Fiksi";
        }
        return view('buku.show', ['buku' => $buku]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('buku.index')->with('pesan', "Buku berhasil dihapus");
    }
}
