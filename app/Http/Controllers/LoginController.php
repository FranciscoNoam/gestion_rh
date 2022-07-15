<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        $rules = [
            'identifiant.required' => "l'identifiant ne doît pas être null",
            'password.required' => 'la confirmation du nouveau mot de passe ne doit pas etre null'
        ];
        $critereForm = [
            'identifiant' => 'required|string',
            'password' => 'required'
        ];
        $request->validate($critereForm, $rules);
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
       return redirect()->route('home');
        // return $this->authenticated($request, $user);
    }

    /**
     * Handle response after user authenticated
     * 
     * @param Request $request
     * @param Auth $user
     * 
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user) 
    {
        return redirect()->intended();
    }
}
