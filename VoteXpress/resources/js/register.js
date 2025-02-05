// document.getElementById('registerForm').addEventListener('submit', function (e) {
//     e.preventDefault(); // Empêche le comportement par défaut du formulaire

//     // Récupérer les valeurs des champs
//     let name = document.getElementById('name').value;
//     let username = document.getElementById('user').value;
//     let email = document.getElementById('email').value;
//     let password = document.getElementById('password').value;
//     let confirmPassword = document.getElementById('confirmPassword').value;

//     // Vérification du nom
//     if (name.trim() === "") {
//         alert("Veuillez entrer votre nom.");
//         return;
//     }


//     // Vérification que le nom ne contient que des lettres et des accents
//     let nameRegex = /^[A-Za-zÀ-ÿ]+$/; // Autorise les lettres majuscules, minuscules, et les lettres accentuées

//     if (!nameRegex.test(name)) {
//         alert("Le nom doit être composé uniquement de lettres (y compris les accents).");
//         return;
//     }

//     // Vérification du nom d'utilisateur
//     if (username.trim() === "") {
//         alert("Veuillez entrer votre nom.");
//         return;
//     }

//     // Vérification que le nom d'utilisateur ne contient pas de caractères spéciaux
//     let usernameRegex = /^[a-zA-Z0-9 ]+$/; // Autorise uniquement lettres, chiffres et espaces
//     if (!usernameRegex.test(username)) {
//         alert("Le nom d'utilisateur ne doit contenir que des lettres, des chiffres et des espaces.");
//         return;
//     }

//     // Vérification de l'email
//     let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Regex pour valider l'email
//     if (!emailRegex.test(email)) {
//         alert("Veuillez entrer une adresse email valide.");
//         return;
//     }

//     // Vérification du mot de passe
//     let passwordRegex = /^(?=.*[A-Z])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{6,}$/;

//     if (!passwordRegex.test(password)) {
//         alert("Le mot de passe doit contenir au moins 6 caractères, une lettre majuscule et un caractère spécial.");
//         return;
//     }


//     // Vérification de la confirmation du mot de passe
//     if (password !== confirmPassword) {
//         alert("Les mots de passe ne correspondent pas.");
//         return;
//     }

//     event.currentTarget.submit();
// });