<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)):
            return back()->with('error','email ou mot de passe est incorrect');
            // return redirect()->to('login')
            //     ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);

        return $this->authenticated($request, $user);
    }

/*    public function login(LoginRequest $request)
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

    //    return redirect()->route('home');
        return $this->authenticated($request, $user);
    } */

    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended();
    }

}
