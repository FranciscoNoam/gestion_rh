<?php

namespace App\Http\Controllers;

use App\Models\Demande_absence;
use Illuminate\Http\Request;
use App\Models\generique\FonctionGenerique;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class DemandeAbsenceController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check() == false) return redirect('login');
            return $next($request);
        });

        $this->fonct = new FonctionGenerique();
        $this->demande = new Demande_absence();
    }

    public function index()
    {
        $nb_limit = 20;
        $nbPag_attente = 1;
        $nbPag_accepter = 1;
        $nbPag_refuser = 1;


        if (Gate::allows('isEmployer')) {
            $employe_id = $this->fonct->findWhereMultiOne("employes", ["user_id"], [Auth::user()->id])->id;
            $demande_absence = $this->fonct->findWhere("demande_absences", ["employe_id"], [$employe_id], ["id"], "DESC");
            return view("employer.demande_absence", compact('demande_absence'));
        }
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin')) {

            $nbreTotal_abs_attente = $this->fonct->getNbrePagination("v_demande_absence_attente", "id", [], [], [], "AND");
            $nbreTotal_abs_accepter = $this->fonct->getNbrePagination("v_demande_absence_accepter", "id", [], [], [], "AND");
            $nbreTotal_abs_refuser = $this->fonct->getNbrePagination("v_demande_absence_refuser", "id", [], [], [], "AND");

            $pagination_attente = $this->fonct->nb_liste_pagination($nbreTotal_abs_attente, $nbPag_attente, $nb_limit);
            $pagination_accepter = $this->fonct->nb_liste_pagination($nbreTotal_abs_accepter, $nbPag_accepter, $nb_limit);
            $pagination_refuser = $this->fonct->nb_liste_pagination($nbreTotal_abs_refuser, $nbPag_refuser, $nb_limit);

            $demande_absence_attente = $this->fonct->findWhereTrieOrderBy("v_demande_absence_attente", [], [], [], ["id"], "AND", "ASC", $nbPag_attente,  $nb_limit);
            $demande_absence_accepter = $this->fonct->findWhereTrieOrderBy( "v_demande_absence_accepter",[], [], [], ["id"],"AND","ASC", $nbPag_accepter,  $nb_limit );
            $demande_absence_refuser = $this->fonct->findWhereTrieOrderBy( "v_demande_absence_refuser", [], [], [], ["id"], "AND","ASC", $nbPag_refuser,  $nb_limit);

            return view("admin.demande.demande_absence", compact('pagination_attente','pagination_accepter','pagination_refuser','demande_absence_attente', 'demande_absence_accepter', 'demande_absence_refuser'));
        }
    }

    public function pagination( $nbPag_para_attente = null, $nbPag_para_accepter = null, $nbPag_para_refuser = null,$page_cible=null)
    {
        $nb_limit = 20;
        $nbPag_attente = 0;
        $nbPag_accepter = 0;
        $nbPag_refuser = 0;


        if ($nbPag_para_attente <= 0 || $nbPag_para_attente == null) {
            $nbPag_attente = 1;
        } else {
            $nbPag_attente = $nbPag_para_attente;
        }
        //========accepter
        if ($nbPag_para_accepter <= 0 || $nbPag_para_accepter == null) {
            $nbPag_accepter = 1;
        } else {
            $nbPag_accepter = $nbPag_para_accepter;
        }
        //========refuser
        if ($nbPag_para_refuser <= 0 || $nbPag_para_refuser == null) {
            $nbPag_refuser = 1;
        } else {
            $nbPag_refuser = $nbPag_para_refuser;
        }

        if (Gate::allows('isEmployer')) {
            $employe_id = $this->fonct->findWhereMultiOne("employes", ["user_id"], [Auth::user()->id])->id;
            $demande_absence = $this->fonct->findWhere("demande_absences", ["employe_id"], [$employe_id], ["id"], "DESC");
            return view("employer.demande_absence", compact('demande_absence'));
        }
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin')) {

            $nbreTotal_abs_attente = $this->fonct->getNbrePagination("v_demande_absence_attente", "id", [], [], [], "AND");
            $nbreTotal_abs_accepter = $this->fonct->getNbrePagination("v_demande_absence_accepter", "id", [], [], [], "AND");
            $nbreTotal_abs_refuser = $this->fonct->getNbrePagination("v_demande_absence_refuser", "id", [], [], [], "AND");

            $pagination_attente = $this->fonct->nb_liste_pagination($nbreTotal_abs_attente, $nbPag_attente, $nb_limit);
            $pagination_accepter = $this->fonct->nb_liste_pagination($nbreTotal_abs_accepter, $nbPag_accepter, $nb_limit);
            $pagination_refuser = $this->fonct->nb_liste_pagination($nbreTotal_abs_refuser, $nbPag_refuser, $nb_limit);

            $demande_absence_attente = $this->fonct->findWhereTrieOrderBy("v_demande_absence_attente", [], [], [], ["id"], "AND", "ASC", $nbPag_attente,  $nb_limit);
            $demande_absence_accepter = $this->fonct->findWhereTrieOrderBy( "v_demande_absence_accepter",[], [], [], ["id"],"AND","ASC", $nbPag_accepter,  $nb_limit );
            $demande_absence_refuser = $this->fonct->findWhereTrieOrderBy( "v_demande_absence_refuser", [], [], [], ["id"], "AND","ASC", $nbPag_refuser,  $nb_limit);

            return view("admin.demande.demande_absence", compact('page_cible','pagination_attente','pagination_accepter','pagination_refuser','demande_absence_attente', 'demande_absence_accepter', 'demande_absence_refuser'));
        }
    }

    public function accept(Request $req, $id)
    {
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin')) {
            return  $this->demande->accept($id);
        } else {
            return back()->with('error', 'les administrateurs seulement ont le droit d\'y entrer');
        }
    }
    public function refus(Request $req, $id)
    {
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin')) {
            return  $this->demande->refus($id);
        } else {
            return back()->with('error', 'les administrateurs seulement ont le droit d\'y entrer');
        }
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        if (Gate::allows('isEmployer')) {
            $employe_id = $this->fonct->findWhereMultiOne("employes", ["user_id"], [Auth::user()->id])->id;
            return  $this->demande->insert($request, $employe_id);
        } else {
            return back()->with('error', 'les employers seulement ont le droit d\'y entrer');
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        if (Gate::allows('isEmployer')) {
            return $this->demande->modification($request, $id);
        } else {
            return back()->with('error', 'les employers seulement ont le droit d\'y entrer');
        }
    }


    public function destroy($id)
    {
        if (Gate::allows('isEmployer')) {
            DB::delete("DELETE FROM demande_absences WHERE id=?", [$id]);
            return back();
        } else {
            return back()->with('error', 'les employers seulement ont le droit d\'y entrer');
        }
    }


    public function filtre(Request $req, $nbPag_para_attente = null, $nbPag_para_accepter = null, $nbPag_para_refuser = null, $search_name_para = null)
    {
        $nb_limit = 20;
        $nbPag_attente = 0;
        $nbPag_accepter = 0;
        $nbPag_refuser = 0;
        $search_name = "";


        if ($nbPag_para_attente <= 0 || $nbPag_para_attente == null) {
            $nbPag_attente = 1;
        } else {
            $nbPag_attente = $nbPag_para_attente;
        }
        //========accepter
        if ($nbPag_para_accepter <= 0 || $nbPag_para_accepter == null) {
            $nbPag_accepter = 1;
        } else {
            $nbPag_accepter = $nbPag_para_accepter;
        }
        //========refuser
        if ($nbPag_para_refuser <= 0 || $nbPag_para_refuser == null) {
            $nbPag_refuser = 1;
        } else {
            $nbPag_refuser = $nbPag_para_refuser;
        }

        if ($search_name_para <= 0 || $search_name_para == null) {
            $search_name = $req->search_name;
        } else {
            $search_name = $search_name_para;
        }

        $nbreTotal_abs_attente = $this->fonct->getNbrePagination("v_demande_absence_attente", "id", ["name", "username"], ["LIKE", "LIKE"], ["%" . $search_name . "%", "%" . $search_name . "%"], "OR");
        $nbreTotal_abs_accepter = $this->fonct->getNbrePagination("v_demande_absence_accepter", "id", ["name", "username"], ["LIKE", "LIKE"], ["%" . $search_name . "%", "%" . $search_name . "%"], "OR");
        $nbreTotal_abs_refuser = $this->fonct->getNbrePagination("v_demande_absence_refuser", "id", ["name", "username"], ["LIKE", "LIKE"], ["%" . $search_name . "%", "%" . $search_name . "%"], "OR");

        $demande_absence_attente = $this->fonct->findWhereTrieOrderBy(
            "v_demande_absence_attente",
            ["name", "username"],
            ["LIKE", "LIKE"],
            ["%" . $search_name . "%", "%" . $search_name . "%"],
            ["id"],
            "OR",
            "ASC",
            $nbPag_attente,
            $nb_limit
        );

        $demande_absence_accepter = $this->fonct->findWhereTrieOrderBy(
            "v_demande_absence_accepter",
            ["name", "username"],
            ["LIKE", "LIKE"],
            ["%" . $search_name . "%", "%" . $search_name . "%"],
            ["id"],
            "OR",
            "ASC",
            $nbPag_accepter,
            $nb_limit
        );

        $demande_absence_refuser = $this->fonct->findWhereTrieOrderBy(
            "v_demande_absence_refuser",
            ["name", "username"],
            ["LIKE", "LIKE"],
            ["%" . $search_name . "%", "%" . $search_name . "%"],
            ["id"],
            "OR",
            "ASC",
            $nbPag_refuser,
            $nb_limit
        );

        $pagination_attente = $this->fonct->nb_liste_pagination($nbreTotal_abs_attente, $nbPag_attente, $nb_limit);
        $pagination_accepter = $this->fonct->nb_liste_pagination($nbreTotal_abs_accepter, $nbPag_accepter, $nb_limit);
        $pagination_refuser = $this->fonct->nb_liste_pagination($nbreTotal_abs_refuser, $nbPag_refuser, $nb_limit);


        return view('admin.home.home', compact('search_name', 'pagination', 'employes', 'departements', 'genres', 'postes'));
    }

    public function trie(Request $req)
    {
        $nb_limit = 20;
        $nbPag = $req->debut_aff;
        $search_name = "";
        $order = "ASC";
        $colone_trie = ["id"];
        $employes = [];
        $query = "";
        if ($req->data_value == 0) { // order by ASC
            $order = "ASC";
        }
        if ($req->data_value == 1) { // order by DESC
            $order = "DESC";
        }
        if ($req->colone == "NAME_EMP") {
            $colone_trie = ["name"];
        }
        if ($req->colone == "SALAIRE_EMP") {
            $colone_trie = ["salaire"];
        }
        if ($req->colone == "DEBUT_JOB_EMP") {
            $colone_trie = ["debut_job"];
        }

        if (isset($req->search_name)) {
            $search_name = $req->search_name;
            $query = $this->fonct->queryWhereTrieOrderBy(
                "v_employe",
                ["name", "username"],
                ["LIKE", "LIKE"],
                ["%" . $search_name . "%", "%" . $search_name . "%"],
                $colone_trie,
                "OR",
                $order,
                $nbPag,
                $nb_limit
            );
            $employes = $this->fonct->findWhereTrieOrderBy(
                "v_employe",
                ["name", "username"],
                ["LIKE", "LIKE"],
                ["%" . $search_name . "%", "%" . $search_name . "%"],
                $colone_trie,
                "OR",
                $order,
                $nbPag,
                $nb_limit
            );
        } else {

            $query = $this->fonct->queryWhereTrieOrderBy(
                "v_employe",
                [],
                [],
                [],
                $colone_trie,
                "OR",
                $order,
                $nbPag,
                $nb_limit
            );
            $employes = $this->fonct->findWhereTrieOrderBy(
                "v_employe",
                [],
                [],
                [],
                $colone_trie,
                "OR",
                $order,
                $nbPag,
                $nb_limit
            );
        }
        return response()->json([
            "employes" => $employes
        ]);
    }
}
