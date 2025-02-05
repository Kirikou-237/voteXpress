@extends('page')
@vite(['resources/css/createPoll.css'])
@section('content')

<main class="overflow-x-hidden overflow-y-scroll h-[600px] flex justify-center">
    <form class="w-[550px]" id="create_poll">
        <fieldset>
            <legend>Détails du sondage</legend>
            <label for="vote-title">Titre du vote :</label>
            <input type="text" name="title" placeholder="Titre" required>
        </fieldset>

        <fieldset id="choices">
            <legend>Choix </legend>

            <div class="choice">
                <label for="1">Nom du choix 1 :</label>
                <input type="text" id="1" name="title1" placeholder="Titre option 1" required>

                <label for="-1">Image du choix 1 :</label>
                <input type="file" accept="image/*" id="-1" name="image1" placeholder="une image de description 1" required>

                <label for="1-">Description du choix 1 :</label>
                <textarea id="1-" name="content1" placeholder="Description option 1" required></textarea>
            </div>

            <div class="choice">
                <label for="2">Nom du choix 2 :</label>
                <input id="2" type="text" name="title2" placeholder="Titre option 2" required>

                <label for="-2">Image du choix 2 :</label>
                <input id="-2" type="file" accept="image/*" name="image2" placeholder="une image de description 2" required>

                <label for="2-">Description du choix 2 :</label>
                <textarea id="2-" name="content2" placeholder="Description option 2" required></textarea>
            </div>

            <div class="choice">
                <label for="3">Nom du choix 3 :</label>
                <input id="3" type="text" name="title3" placeholder="Titre option 3" required>

                <label for="-3">Image du choix 3 :</label>
                <input id="-3" type="file" accept="image/*" name="image3" placeholder="une image de description 3" required>

                <label for="3-">Description du choix 3 :</label>
                <textarea id="3-" name="content3" placeholder="Description option 3" required></textarea>
            </div>

            <div class="choice">
                <label for="4">Nom du choix 4 :</label>
                <input id="4" type="text" name="title4" placeholder="Titre option 4" required>

                <label for="-4">Image du choix 4 :</label>
                <input id="-4" type="file" accept="image/*" name="image4" placeholder="une image de description 4" required>

                <label for="4-">Description du choix 4 :</label>
                <textarea id="4-" name="content4" placeholder="Description option 4" required></textarea>
            </div>
        </fieldset>

        <button type="submit">Soumettre le sondage</button>
    </form>
</main>
@vite(['resources/js/app.js'])
@endsection