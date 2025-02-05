@extends('auth.layout')
@section('title', 'inscription' )
@section('style')
@vite(['resources/css/register.css'])
@endsection
@section('scripts')
@vite(['resources/js/register.js'])
@endsection
@section('content')
<h1>Créer un compte</h1>

<!-- creation du formulaire -->
<form action="{{url('/register')}}" id="registerForm" method="post">
    @csrf
  
        <div class="form-group">
            <i><img width="20" height="20" src="https://img.icons8.com/ios-filled/50/user.png"></i>
            <input type="text" name="name" id="name" placeholder="Votre nom" required>
            @error('name')
                        <span class="error text-red-800 text-sm flex items-center p-4 m-2" id="nameError">{{ $message }}</span>
                    @enderror
        </div>

        <div class="form-group">
            <i><img width="20" height="20" src="https://img.icons8.com/ios-filled/50/user.png"></i>
            <input type="text" name="username" id="user" placeholder="Nom d'utilisateur" required>
            @error('username')
                        <span class="error text-red-800 text-sm flex items-center p-4 m-2" id="usernameError">{{ $message }}</span>
                    @enderror
        </div>

        <div class="form-group">
            <i><img width="20" height="20" src="https://img.icons8.com/carbon-copy/100/new-post--v1.png"></i>
            <input type="email" name="email" id="email" placeholder="Votre email" required>
            @error('email')
                        <span class="error text-red-800 text-sm flex items-center p-4 m-2" id="emailError">{{ $message }}</span>
                    @enderror
        </div>

        <div class="form-group">
            <i><img width="20" height="20" src="https://img.icons8.com/fluency/48/password--v2.png"></i>
            <input type="password" name="password" id="password" placeholder="Mot de passe" required>
            @error('password')
                        <span class="error text-red-800 text-sm flex items-center p-4 m-2" id="passwordError">{{ $message }}</span>
                    @enderror
        </div>

        <div class="form-group">
            <i><img width="20" height="20" src="https://img.icons8.com/fluency/48/password--v2.png"></i>
            <input type="password" name="password_confirmation" id="confirmPassword" placeholder="Confirmer le mot de passe" required>
            @error('password_confirmation')
                        <span class="error text-red-800 text-sm flex items-center p-4 m-2" id="confpasswordError">{{ $message }}</span>
                    @enderror
        </div>

        <button type="submit" class="register-btn">S'inscrire</button>
</form>

<div class="login-link">
    <span>Déjà inscrit ?</span> <a href="login"> Se connecter</a>
</div>
@endsection