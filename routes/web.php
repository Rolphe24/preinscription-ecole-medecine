<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostControler;
use App\Http\Controllers\HomeControler;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;



Route:: get('/',[HomeControler::class, 'Principal']);
    #LE MIDDLWARE PROTEGE L'EMSEMBLE DE MES LIENS
Route::middleware(['check.referer'])->group(function () {
Route:: get('/supprimer/{id}',[HomeControler::class, 'supprimer']);# POUR SUPPRIMER 
Route:: GET('/modifier/{id}',[HomeControler::class, 'modifier_liste']);# POUR AFFICHE L'EDUDIANT AVANT LA MODIFICATION
Route:: POST('/modifier_traitement',[HomeControler::class, 'modifier_traitement']);# CEST LA FONCTION QUI S'EXCUTE APRES AVOIR INSERET LES DONNEES
Route:: get('/contact1',[HomeControler::class, 'contact1']);
Route:: get('/affiche',[HomeControler::class, 'home'])->name('affiche');
Route:: GET('/formulaire',[PostControler::class, 'formulaire'])->name('formulaire');# IL AFFICHE JUSTE LE FORMULAIRE
Route:: POST('/ajout',[HomeControler::class, 'ajout_etudiant']);# CEST LA FONCTION QUI S'EXCUTE APRES AVOIR INSERET LES DONNEES
Route:: GET('/affiche',[PostControler::class, 'affiche_etudiant'])->name('affiche');# POUR AFFICHE LES ETUDIANT
// Route pour afficher le formulaire d'inscription
route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
route::post('register', [RegisterController::class, 'register']);

// Route pour afficher le formulaire de connexion
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/recherche', [HomeControler::class, 'search'])->name('etudiants.search');

// Route pour afficher la page affiche.blade.php

});




/*
route::get('/',function() {
    $name='kelvy';
  return view('test',compact('name'));  
});*/