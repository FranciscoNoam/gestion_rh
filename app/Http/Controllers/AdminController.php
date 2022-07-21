<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\generique\FonctionGenerique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            // if (Auth::user()->exists == false) return redirect()->route('connection');
            if (Auth::user()->exists == false) return redirect('/');
            return $next($request);
        });

        $this->fonct = new FonctionGenerique();
    }


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

    public function global()
    {
        $user_id = Auth::user()->id;
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin')) {
            $departements = $this->fonct->findAll("departements");
            $genres = $this->fonct->findAll("genres");
            $postes = $this->fonct->findAll("postes");

            return view('admin.home.global.global', compact('departements', 'genres','postes'));
        } else{
            return back()->with('error','les Administrateurs seulement on le droit d\'y entrer');
        }

        // if (Gate::allows('isAdmin')) {
        //     $employes = $this->fonct->findAll("v_employe");
        //     dd("tong: " . Auth::user()->role_id);

        //     return view('admin.home.home', compact('employes'));
        // }

    }

    public function store_nouveau_admin(Request $req){
        $rules = [
            'nom.required' => 'le Nom du super Admin ne doît pas être null',
            'nom.string' => 'le texte seulement est autorisé',
            'email.required' => 'le mail ne doît pas être null',
            'email.email' => 'le mail doît contenir "@",merci de bien le suivre',
             'new_password.required' => 'le nouveau mot de passe ne doît pas être null',
            'confirm_password.required' => 'la confirmation du nouveau mot de passe ne doit pas etre null'
        ];
        $critereForm = [
            'nom' => 'required|string',
            'email' => 'required|email',
            'confirm_password' => 'required',
            'new_password' => 'required'
        ];
        $req->validate($critereForm, $rules);

        $verify =  $this->fonct->findWhereMultiOne("users",["email"],[$req->email]);
        if($verify!=null){
            if($verify->activiter==true){
                return back()->with('error','désolé, cette identification existe déjà');
            }
            else if($verify->activiter==false){
                return back()->with('success','vous avez déjà une invitation en attente de l\'aprobation par super admin');
            } else {
                return back()->with('error','une erreur est survenue lors de l\'éxécution de la rêquete');
            }
        } else {
            User::create([
                "name"=>"".$req->nom,
                "email"=>"".$req->email,
                'password' => "".Hash::make($req->confirm_password),
                "activiter"=>false,
                "role_id"=>2
               ])->save();
               return back()->with('success','votre demande a été envoyer, veuillez contactez votre super admin pour votre aprobation confirmation');
        }
    }

    public function store_nouveau_super_admin(Request $req){
        $rules = [
            'nom.required' => 'le Nom du super Admin ne doît pas être null',
            'nom.string' => 'le texte seulement est autorisé',
            'email.required' => 'le mail ne doît pas être null',
            'email.email' => 'le mail doît contenir "@",merci de bien le suivre',
            'new_password.required' => 'le nouveau mot de passe ne doît pas être null',
            'confirm_password.required' => 'la confirmation du nouveau mot de passe ne doit pas etre null'
        ];
        $critereForm = [
            'nom' => 'required|string',
            'email' => 'required|email',
            'confirm_password' => 'required',
            'new_password' => 'required'
        ];
        $req->validate($critereForm, $rules);

        $verify =  $this->fonct->findWhere("users",["role_id"],[1],["id"],"ASC");
        if(count($verify)>0){
            return back()->with('error','une erreur est survenue lors de l\'éxécution de la rêquete');
        } else {
            User::create([
                "name"=>"".$req->nom,
                "email"=>"".$req->email,
                'password' => "".Hash::make($req->confirm_password),
                "activiter"=>True,
                "role_id"=>1
               ])->save();
            return redirect()->route('connection');
        }
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
