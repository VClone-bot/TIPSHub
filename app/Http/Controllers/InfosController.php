<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;

class InfosController extends Controller
{
    function create(Request $request) {
        $request->validate([
            'texte' => 'required|min:15|max:400'
        ]);

        $info = new Info;
        $info->texte = $request->texte;
        $info->poster = $request->session()->get('Username');
        $query = $info->save();

        if($query) {
            return back()->with('success', 'Le billet a bien été ajouté');
        } else {
            return back()->with('fail', 'Erreur détectée: veuillez réessayer.');
        }
    }

    function display_billets() {
        $infos = Info::all()->sortByDesc('created_at');
        return view('office_section.infos_bureau', compact('infos'));
    }

    function delete(Request $request) {
        Info::where('id', '=', $request->id)->delete();
        return back()->with('success', 'Le billet a bien été supprimé');
    }
}
