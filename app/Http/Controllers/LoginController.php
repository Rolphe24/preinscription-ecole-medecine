<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class LoginController extends Controller
{
    //namespace App\Http\Controllers\Auth;


    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Valider les champs de formulaire
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Vérifier si l'utilisateur existe dans la base de données
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // Rediriger avec un message d'erreur si l'utilisateur n'existe pas
            return redirect()->back()->withErrors(['email' => 'L\'utilisateur n\'existe pas.'])->withInput();
        }

        // Tentative de connexion
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Rediriger vers affiche.blade.php si la connexion réussit
            return redirect()->route('affiche');
        }

        // Rediriger avec un message d'erreur si la connexion échoue
        return redirect()->back()->withErrors(['password' => 'Le mot de passe est incorrect.'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}

