<?php

namespace App\Http\Controllers;
use App\Models\NewsSub;

use Illuminate\Http\Request;

class NewsSubController extends Controller
{
    function create(Request $request) {
        $request->validate([
            'email' => 'required|email'
        ]);

        $sub = new NewsSub;
        $sub->email = $request->email;
        $query = $sub->save();

        if($query) {
            return back()->with('success', 'Vous avez bien été ajouté à la Newsletter');
        } else {
            return back()->with('fail', 'Erreur détectée: veuillez réessayer');
        }
    }

    function delete(Request $request) {
        $email = $request->email;
        NewsSub::where('email', '=', $email)->delete();
    }

    function get_subs(Request $request) {
        return NewsSub::all();
    }
}
