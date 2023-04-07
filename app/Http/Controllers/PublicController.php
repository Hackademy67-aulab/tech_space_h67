<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function home() {
        return view('welcome');
    }

    public function userProfile(){
        return view('user_profile');
    }

    //E' la funzione che cancellerá l'utente autenticato
    public function destroy(){

        //prendo tutti i negozi collegati all'utente autenticato e li seleziono uno alla volta
        // foreach (Auth::user()->shops as $shop) {
        //     //Dissocia dall'utente seleziona il negozio
        //     //Che di sicuro per controllo incorciato é il negozio collegato all'utente specifico
        //     $shop->user()->dissociate();
        //     //Salva la modifica nel database
        //     $shop->save();
        // }

        Auth::user()->delete();

        return redirect(route('homePage'))->with('message','Utente cancellato correttamente! Addddddddiosssss!!!');

    }
}
