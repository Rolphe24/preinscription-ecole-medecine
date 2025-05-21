<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Etudiant;
class HomeControler extends Controller
{       

  public function __construct()
  {
      // Appliquer le middleware uniquement aux méthodes spécifiques
      $this->middleware('check.referer')->only(['affiche', 'register','home','modifier','base','login','ajout','formulaire']);
  }

  public function Principal()
  {
      return view("home");
  }
  
  public function ajout_etudiant(Request $request)
                {

          $request->validate([
            'nom'=> 'required',
            'prenom'=> 'required',
            'age'=> 'required',
            'datenaise'=> 'required',

          ]);
          
          $etudiant = new Etudiant();
          $etudiant->nom=$request->nom;
          $etudiant->prenom=$request->prenom;
          $etudiant->age=$request->age;
          $etudiant->datenaise=$request->datenaise;
          $etudiant->save();


          return redirect('/')->with('stauts','Etudiant Ajouter avec Succes');

        }

      public function modifier_liste($id){
          $etudiant=Etudiant::find($id);

          return view('modifier', compact('etudiant'));


      }

      public function modifier_traitement(Request $request ){

        $request->validate([
          'nom'=> 'required',
          'prenom'=> 'required',
          'age'=> 'required',
          'datenaise'=> 'required',

        ]);
        
        $etudiant = Etudiant::find($request->id);
        $etudiant->nom=$request->nom;
        $etudiant->prenom=$request->prenom;
        $etudiant->age=$request->age;
        $etudiant->datenaise=$request->datenaise;
        $etudiant->update();

        return redirect('login')->with('stauts','Etudiant Modidier avec Succes');

      }
         


   public function supprimer($id){
    
    $supp=Etudiant::find($id);
    $supp->delete();
    return redirect('affiche');


   }
   public function contact1 (){
       
        return view('contact.contact1');
   }
   public function search(Request $request)
   {
       $search = $request->input('search');
       
       // Effectuer la recherche dans la base de données
       $etudiants = Etudiant::where('nom', 'LIKE', "%{$search}%")
                           ->orWhere('prenom', 'LIKE', "%{$search}%")
                           ->orWhere('age', 'LIKE', "%{$search}%")
                           ->orWhere('datenaise', 'LIKE', "%{$search}%")
                           ->get();
       
       // Retourner la vue avec les résultats de recherche
       return view('affiche', compact('etudiants'));
   }
}
