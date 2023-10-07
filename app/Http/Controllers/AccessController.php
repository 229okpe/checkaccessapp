<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\access;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AccessController extends Controller
{
    public function setAccess(Request $request)
    {
        // Validation des données (exemple)
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenoms' => 'required',
            'numero' => 'required'
        ]);
        
    // Vérification si le nom et les prénoms ont déjà été enregistrés aujourd'hui
    $aujourdhui = Carbon::today();
   
    $doublons = access::where('nom', $request->nom)
        ->where('prenoms', $request->prenoms)
        ->whereDay('created_at', $aujourdhui)
        ->first();

    if ($doublons) {
        return back()->with('message-e', 'Vous avez déja marqué votre présence pour ce cours ! Veuillez attendre le prochain cours');

    } else {
        $access = access::create([
            'nom' => $request->nom,
            'prenoms' => $request->prenoms,
            'numero' => $request->numero,
            'date' => Carbon::now()

        ]);
        return back()->with('message-s', 'Présence validée ! Bienvenue au cours');

    }
        
          }


 public function connexion(Request $request)
 { 
    $request->validate([
        'login' => 'required|string|max:255',
        'mdp' => 'required',
       
    ]);

    if($request->login =="admin" && $request->mdp=="VipConsult2023") {
      
      return  redirect()->route('administration');
    }
    else {
        return back()->with('message', 'Identifiants incorrects ! Veuillez ressayer');
  
    }
 }

    public function admin() {
   
        $presents=access::all();
        return view("administration", ["liste"=>$presents]);
   }
}
