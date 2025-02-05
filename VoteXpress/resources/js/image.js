let imageInput = document.getElementById("image");

imageInput.addEventListener("change", function () {
    let file = imageInput.files[0];
    let reader = new FileReader();
    reader.onload = function () {
        let imagePreview = document.getElementById("imagePreview");
        imagePreview.src = reader.result;
    };
    reader.readAsDataURL(file);
});
