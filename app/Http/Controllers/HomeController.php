<?php

namespace App\Http\Controllers;

use App\Models\generique\FonctionGenerique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::user()->exists == false) return redirect()->route('connection');
            return $next($request);
        });

        $this->fonct = new FonctionGenerique();
    }


    public function index()
    {
        $user_id = Auth::user()->id;

        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin')) {
            $employes = $this->fonct->findAll("v_employe");
            $departements = $this->fonct->findAll("departements");
            $genres = $this->fonct->findAll("genres");
            $postes = $this->fonct->findAll("postes");
            return view('admin.home.home', compact('employes', 'departements', 'genres','postes'));
        }

       else if (Gate::allows('isEmployer')) {
            return view('employer.fiche_de_paie');
        }

       else if (Gate::allows('isSuperAdmin')) {
            $employes = $this->fonct->findAll("employes");
            dd("tong: " . Auth::user()->role_id);

            return view('admin.home.home', compact('employes'));
        }
    }
    // public function login(Request $req){
    //     var_dump($req->input());
    //     $user=DB::select("SELECT * FROM users WHERE email=? or identifiant=?",[$req->identifiant,$req->identifiant]);
    //     if($user!=null){
    //         $connected= $user[0];
    //         if(Hash::check($req->password, $connected->password)){
    //             redirect()->route('home');
    //         } else {
    //             return back()->with('error','email ou identifiant ou mot de passse est incorrect ');
    //         }
    //     } else {
    //         return back()->with('error','email ou identifiant ou mot de passse est incorrect ');
    //     }
    // }
}
