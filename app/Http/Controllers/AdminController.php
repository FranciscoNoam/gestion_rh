<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("login_admin.index");
    }



    public function nouveau()
    {
        return view("login_admin.create");
    }

      public function nouveau_super_admin(){
        return view("login_admin.nouveau_super_admin");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("login_admin.index");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function login(Request $req)
    {
        $rules = [
            'identifiant.required' => "l'identifiant ne doît pas être null",
            'password.required' => 'la confirmation du nouveau mot de passe ne doit pas etre null'
        ];
        $critereForm = [
            'identifiant' => 'required|string',
            'password' => 'required'
        ];
        $req->validate($critereForm, $rules);

        
   /*     $credentials = $req->validate([
            'identifiant' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $req->session()->regenerate();
 
            return redirect()->intended('home.index');
        }
 
        return back()->withErrors([
            'identifiant' => 'The provided credentials do not match our records.',
        ])->onlyInput('identifiant'); */
  /*      $credentials = $req->only('identifiant', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home')
                        ->withSuccess('Signed in');
        } else {
            return back()->with('error','email ou mot de passse est incorrect ');
        }
*/
        $user=DB::select("SELECT * FROM users WHERE email=? or identifiant=?",[$req->identifiant,$req->identifiant]);
        if($user!=null){
            $connected= $user[0];

            if(Hash::check($req->password, $connected->password)){
            
            dd(Auth::user());
                if ($req->session()->exists('users')) {
                    //
                } else {
                    session(['user' => $connected]);
                }
                redirect()->route('home');
            } else {
                return back()->with('error','email ou identifiant ou mot de passse est incorrect ');
            }
        } else {
            return back()->with('error','email ou identifiant ou mot de passse est incorrect ');
        } 

    }

    public function store_nouveau_super_admin(Request $req){
        $rules = [
            'nom.required' => 'le Nom du super Admin ne doît pas être null',
            'nom.string' => 'le texte seulement est autorisé',
            'email.required' => 'le mail ne doît pas être null',
            'email.email' => 'le mail doît contenir "@",merci de bien le suivre',
            'identifiant.required' => "l'identifiant ne doît pas être null",
            'identifiant.string' => 'le texte seulement est autorisé',
            'new_password.required' => 'le nouveau mot de passe ne doît pas être null',
            'confirm_password.required' => 'la confirmation du nouveau mot de passe ne doit pas etre null'
        ];
        $critereForm = [
            'nom' => 'required|string',
            'email' => 'required|email',
            'identifiant' => 'required|string',
            'confirm_password' => 'required',
            'new_password' => 'required'
        ];
        $req->validate($critereForm, $rules);

         User::create([
            "name"=>"".$req->nom,
            "email"=>"".$req->email,
            "identifiant"=>"".$req->identifiant,
            'password' => "".Hash::make($req->confirm_password),
            "activiter"=>True,
            "role_id"=>1
           ])->save();

           session()->flash('message','super admin a été créer');
        return redirect()->route('admin');
    }


    public function store(Request $req)
    {
        $rules = [
            'nom.required' => 'le Nom du super Admin ne doît pas être null',
            'nom.string' => 'le texte seulement est autorisé',
            'email.required' => 'le mail ne doît pas être null',
            'email.email' => 'le mail doît contenir "@",merci de bien le suivre',
            'identifiant.required' => "l'identifiant ne doît pas être null",
            'identifiant.string' => 'le texte seulement est autorisé',
            'new_password.required' => 'le nouveau mot de passe ne doît pas être null',
            'confirm_password.required' => 'la confirmation du nouveau mot de passe ne doit pas etre null'
        ];
        $critereForm = [
            'nom' => 'required|string',
            'email' => 'required|email',
            'identifiant' => 'required|string',
            'confirm_password' => 'required',
            'new_password' => 'required'
        ];
        $req->validate($critereForm, $rules);

         User::create([
            "name"=>"".$req->nom,
            "email"=>"".$req->email,
            "identifiant"=>"".$req->identifiant,
            'password' => "".Hash::make($req->confirm_password),
            "activiter"=>False,
            "role_id"=>2
           ])->save();

           session()->flash('message','super admin a été créer');
        return redirect()->route('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
