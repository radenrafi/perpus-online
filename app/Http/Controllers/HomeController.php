<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Materi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $bukus = Buku::all();
        $bukus = Buku::latest()->limit(4)->get();
        // $materis = Materi::all();
        $materis = Materi::latest()->limit(4)->get();

        return view('index',['bukus'=>$bukus, 'materis'=>$materis]);
    }
}
