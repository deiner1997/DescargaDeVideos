<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Download;


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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
     public function showDownloads()
    {
        $descargas = array('Descargas' => Download::showDownloads());
        return view('home',compact('descargas'));
    }

}
