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
        $this->middleware(function ($request, $next) {
            if (Auth::check() == false) return redirect('login');
            return $next($request);
        });


        $this->fonct = new FonctionGenerique();
    }



    public function index($nbPag_para = null)
    {
        $user_id = Auth::user()->id;
        $nb_limit = 15;
        $nbPag = 0;

        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin')) {

            if ($nbPag_para <= 0 || $nbPag_para == null) {
                $nbPag = 1;
            } else {
                $nbPag = $nbPag_para;
            }
            $nbreTotal_emp = $this->fonct->getNbrePagination("employes", "id", [], [], [], "AND");
            $employes = $this->fonct->findWhereTrieOrderBy(
                "v_employe",
                [],
                [],
                [],
                ["id"],
                "AND",
                "ASC",
                $nbPag,
                $nb_limit
            );
            $pagination = $this->fonct->nb_liste_pagination($nbreTotal_emp, $nbPag, $nb_limit);
            $departements = $this->fonct->findAll("departements");
            $genres = $this->fonct->findAll("genres");
            $postes = $this->fonct->findAll("postes");
            return view('admin.home.home', compact('employes', 'departements', 'genres', 'postes', 'pagination'));
        } else if (Gate::allows('isEmployer')) {
            return view('employer.fiche_de_paie');
        }
    }
}
