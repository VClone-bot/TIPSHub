<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cours;

class CoursController extends Controller
{
    function get_cours(Request $request) {
        $cours = Cours::select('*')->orderBy('date')->get();
        $nom_cours = Cours::select('nom_du_cours')->distinct()->get();
        return view('member_section.section_cours.infos_cours', compact('cours', 'nom_cours'));
    }

    function create(Request $request) {
        $request->validate([
            'nom_du_cours' => 'required',
            'date' => 'required|date',
            'heure' => 'required',
            'lien_visio' => 'url',
            'numero_cours' => 'required|integer'
        ]);

        $cours = new Cours;
        $cours->nom_du_cours = $request->nom_du_cours;
        $cours->date = $request->date;
        $cours->heure = $request->heure;
        if(!$request->presentiel) {
            $cours->presentiel = False;
            $cours->lien_visio = $request->lien_visio;
            $cours->mot_de_passe_visio = $request->mot_de_passe_visio;
            $cours->lieu = "";
        } else {
            $cours->presentiel = True;
            $cours->lien_visio = "";
            $cours->mot_de_passe_visio = "";
            $cours->lieu = $request->lieu;
        }
        $cours->numero_cours = $request->numero_cours;
        $query = $cours->save();

        if($query) {
            return back()->with('success', 'Le cours a bien été créé');
        } else {
            return back()->with('fail', 'Erreur détectée: veuillez réessayer');
        }
    }

    function delete(Request $request) {
        Cours::where('id', '=', $request->id_cours)->delete();
    }

    function add() {
        $nom_cours = Cours::select('nom_du_cours')->distinct()->get();
        return view('office_section.add_cours', compact('nom_cours'));
    }
}
