<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //

    public function register()
    {
        return view('auth.register');
    }

    public function registerRequest(Request $request)
    {
        $validate = $request->validate([ // validation des champs
            'name' => 'required|min:2|max:255|alpha',
            'username' => 'required|min:3|max:255|alpha_num|unique:users,name', // alpha pour verifier si le champ est une chaine de caractere
            'email' => 'required|email|unique:users,email', // unique:users,email pour verifier si l'email existe deja
            'password' => 'required|min:8|max:255|alpha_num|confirmed', // confirmed pour confirmer le mot de passe
        ], [ // messages d'erreur personnalises
            'name.min' => 'le nom doit avoir au moins deux caracteres',
            'name.alpha' => 'le nom ne doitetre composé que de lettres',
            'username.alpha_num' => 'le nom d\'utilisateur ne peut etre compose que de chiffres et de lettres',
            'username.unique' => 'ce nom d\'utiisateur est deja utilisé',
            'email.unique' => 'cet addresse mail est deja utilisee',
            'password.min' => 'le mot de passe doit etre au moins de 8 caracteres d\'une lettre et d\'un chiffre',
            'password.confirmed' => 'les mots de passe ne sont pas identiques'
        ]);

        //creation de l'utilisateur

        $user  = User::create([ // creation de l'utilisateur
            'name' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        Auth::login($user); // connexion de l'utilisateur

        return redirect()->route('page'); // redirection avec les erreurs et les donnees du formulaire

    }





    public function login()
    {
        return view('auth.login');
    }

    public function loginRequest(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => ['required'],
        ]);

        // ajout de l'utilisateur



        if (Auth::attempt($request->only('email', 'password'))) { // verification des identifiants

            return redirect()->route('page'); // redirection
        }

        throw ValidationException::withMessages([ // message d'erreur
            'credentials' => 'Les informations de connexion sont incorrectes',
        ]);
    }
    //deconnexion de l'utilisateur
    public function logout(Request $request)
    {
        Auth::logout(); // deconnexion de l'utilisateur
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function settings()
    {
        return view('auth.settings');
    }
}
