<?php

namespace App\Http\Controllers;

use App\Models\User; // importation du model User
use App\Models\UserInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    //
    /**
     * add user informations
     */
    public function add_user_informations(Request $request)
    {

        $validator = $request->validate([
            'bio' => 'required|max:255',
            'sex' => 'required|',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'birth_day' => 'required|date:Y-m-d'
        ], [
            'bio.required' => 'Le champ bio est obligatoire',
            'bio.max' => 'Le champ bio doit contenir au plus 255 caracteres',
            'sex.required' => 'Le champ sex est obligatoire',
            'image.required' => 'Le champ image est obligatoire',
            'image.image' => 'Le champ image doit etre une image',
            'image.mimes' => 'Le champ image doit etre une image png, jpg ou jpeg',
            'image.max' => 'Le champ image doit contenir au plus 2048 octets',
            'birth_day.required' => 'Le champ birth_day est obligatoire',
            'birth_day.date' => 'Le champ birth_day doit etre une date valide',
        ]);

        $temp = UserInformation::where('user_id', $request->user()->id)->first(); // recupere la premiere ligne de la table user_information
        $imageName = time().'_profile.'.$request->image->extension(); // 1223154651_profile.png
        $request->image->move(public_path('images'), $imageName);

        if($temp){ // si les informations de l'utilisateur existe deja dans la table user_information
            // mise a jour des informations de l'utilisateur
            $temp->update([
                'bio' => $request->input('bio'),
                'sexe' => $request->input('sex'),
                'date_of_birth' => $request->input('birth_day'),
                'image' => $imageName,
            ]);
            $temp->save();
            return redirect()->route('page');
        }else{
            $a = UserInformation::create([
                'bio' => $request->input('bio'),
                'sexe' => $request->input('sex'),
                'image' => $imageName,
                'date_of_birth' => $request->input('birth_day'),
                'user_id' => $request->user()->id,
            ]);
            if($a->save()){
                return redirect()->route('page');
            }
        }

        throw ValidationException::withMessages([ // message d'erreur
            'credentials' => 'Erreur de validation',
        ]);


        return view('page');
    }

    public function CreatePoll(){
 

        return view('createPoll');
    }

}
