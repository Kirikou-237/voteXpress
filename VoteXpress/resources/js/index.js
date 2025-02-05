let button = document.getElementById('user-menu-button');
let dropdown = document.getElementById('user-dropdown');

button.addEventListener('click', function () {
    if (dropdown.style.display === "none" || dropdown.style.display === "") {
        dropdown.style.display = "block"; // Afficher
    } else {
        dropdown.style.display = "none"; // Masquer
    }
});

// Ajoutez le code JavaScript pour la navigation responsive ici
        document.addEventListener("DOMContentLoaded", function () {
            let currentPage = window.location.pathname.split("/").pop() || "index.html"; // Récupère la page actuelle

            document.querySelectorAll(".menu a").forEach(link => {
                let linkPage = link.getAttribute("href").split("/").pop(); // Récupère le fichier du lien

                if (linkPage === currentPage) {
                    link.classList.add("active"); // Ajoute la classe active
                }
            });
        });