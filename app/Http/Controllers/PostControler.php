<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Etudiant;
class PostControler extends Controller
{
 
    public function formulaire()
    {
        return view("ajout");
    }


      #POUR POUR AFFICHER LE CONTENU DE LA BD
    public function affiche_etudiant ()
    { $etudiants= Etudiant::all();  //recupero tutti i post dal db e li
        return view('affiche', compact('etudiants'));
    }


}
