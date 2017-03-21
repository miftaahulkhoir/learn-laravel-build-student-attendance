<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index() {
      $nama = 'Mifta';
      $umur = 22;

      return view('profil', compact('nama', 'umur'));
    }

    public function materi()
    {
      $datasa = ['html', 'css', 'javascript','php'];
      return view('materi')->with('data',$datasa);
    }
}
