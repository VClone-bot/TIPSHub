<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserAuthController extends Controller
{
    function login() {
        return view('auth.login');
    }

    function register() {
        return view('auth.register');
    }

    function create(Request $request) {
        // Validate request first
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:70'
        ]);

        // If form validated succesfully, then register new user
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_office = False;
        $user->is_teacher = False;
        $user->is_admin = False;
        $user->is_active = False;
        $query = $user->save();

        if($query) {
            return back()->with('success', 'Le compte a bien été créé, cependant il est désactivé pour des raisons de sécurité. 
            Les administrateurs ont été notifiés de la création du compte, veuillez patienter en attendant qu\'il soit activé');
        } else {
            return back()->with('fail', 'Erreur détectée: veuillez réessayer plus tard');
        }
    }

    function check(Request $request) {
        // Validate request first
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:70'
        ]);
        
        // If form validated successfully, proceed  
        $user = User::where('email', '=', $request->email)->first();
        if($user) {
            // If user exists, check if user is activated
            if($user->is_active) {
                // If user is active then connect user and load session data
                if(Hash::check($request->password, $user->password)) {
                    // If password is correct, log the user and load the session data
                    $request->session()->put('LoggedUser', $user->id);
                    $request->session()->put('Username', $user->name);
                    $request->session()->put('IS_OFFICE', $user->is_office);
                    $request->session()->put('IS_ADMIN', $user->is_admin);
                    $request->session()->put('IS_TEACHER', $user->is_teacher);
                    return redirect('/');
                } else {
                    return back()->with('fail', 'Mot de passe incorrect');
                }
            } else {
                return back()->with('fail', 'Ce compte est inactif');
            }
        } else {
            return back()->with('fail', 'Aucun compte trouvé pour cet email');
        }
    }

    function logout(Request $request) {
        if(session()->has('LoggedUser')) {
            $request->session()->flush();
            return redirect('/');
        }
    }
}
