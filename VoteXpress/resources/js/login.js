let form = document.getElementById('login-form')

form.addEventListener("submit", function (event) {
    // stop la propagation de l'evenement
    event.preventDefault();
  
    event.currentTarget.submit();
});


