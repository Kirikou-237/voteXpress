@extends('page')
@vite(['resources/js/image.js'])
@section('content')
<main class="overflow-x-scroll h-[600px]">
    <div class="flex items-start justify-center h-screen pt-16">
        <div
            class="w-full max-w-sm p-4  border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 bg-green-400">
            <form enctype="multipart/form-data" class="space-y-6" id="userInformationForm"
                action="{{ route('add_user_informations') }}" method="POST">
                @csrf
                @error('credentials')
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-green-800 dark:text-red-400"
                        role="alert">
                        <span class="font-medium">Danger alert!</span>
                        {{ $message }}
                    </div>
                @enderror
                <h5 class="text-xl font-medium text-gray-900 dark:text-white">
                    Completez votre profil !
                </h5>
                <div>
                    <label for="bio" class="block mb-2 text-sm font-medium text-green-900 dark:text-white">Parlez nous
                        de vous
                    </label>
                    <textarea name="bio" id="bio" cols="30" rows="3" placeholder="ajoutez votre bio 🤗 !"
                        class=" border border-gray-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 bg-green-500 dark:border-gray-500 dark:placeholder-white dark:text-white"
                        required maxlength="255">{{ old('bio') }}</textarea>
                </div>
                @error('bio')
                    {{ $message }}
                @enderror
                <div>
                    <label for="sex" class="block mb-2 text-sm font-medium text-green-900 dark:text-white">
                        votre Sexe
                    </label>
                    <select id="sex" name="sex" required
                        class="bg-gray-50 border border-gray-300 text-green-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-green-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Selectionner votre sexe</option>
                        <option value="homme">Homme</option>
                        <option value="femme">Femme</option>
                    </select>
                </div>
                @error('sex')
                    {{ $message }}
                @enderror
                <div>
                    <label for="birthday" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        votre date de naissance
                    </label>
                    <input type="date" name="birth_day" id="birthday" required value="{{ old('birth_day') }}"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-green-500 dark:border-gray-500 dark:placeholder-white dark:text-white">
                </div>
                @error('birth_day')
                    {{ $message }}
                @enderror

                <div class="flex flex-col items-center pb-1">
                    <img id="imagePreview" class="w-24 h-24 mb-3 rounded-full shadow-lg"
                        src="https://img.freepik.com/free-photo/portrait-beautiful-young-black-woman-with-traditional-african-necklace_144627-30196.jpg"
                        alt="Bonnie image" />
                </div>

                <div>
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Choisissez une photo de profil
                    </label>
                    <input type="file" accept="image/*" name="image" id="image" required
                        value="{{ old('image') }}"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-green-500 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                </div>
                @error('image')
                    {{ $message }}
                @enderror

                <button type="submit"
                    class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    mettre a jour le profil
                </button>
            </form>
        </div>
    </div>
</main>
@endsection
