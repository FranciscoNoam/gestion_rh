<?php

namespace App\Http\Controllers;

use App\Models\Demande_conger;
use Illuminate\Http\Request;
use App\Models\generique\FonctionGenerique;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class DemandeCongerController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check() == false) return redirect('login');
            return $next($request);
        });

        $this->fonct = new FonctionGenerique();
        $this->demande = new Demande_conger();
    }

   /* public function index()
    {
        if (Gate::allows('isEmployer')) {
            $reste_conger = 0;
            $emp = $this->fonct->findWhereMultiOne("v_employe", ["user_id"], [Auth::user()->id]);
            $demande_conger = $this->fonct->findWhere("v_demande_conger", ["employe_id"], [$emp->id], ["id"], "DESC");
            $totale_conger = $this->fonct->findWhereMultiOne("v_totale_conger", ["employe_id"], [$emp->id]);
            $dernier_conger = $this->fonct->findWhereMultiOne("v_dernier_demande_conger", ["employe_id"], [$emp->id]);
            if ($totale_conger != null) {
                $reste_conger = $totale_conger->rest_conger_year;
            } else {
                $reste_conger = $emp->total_day;
            }

            return view("employer.demande_conger", compact('demande_conger', 'reste_conger', 'dernier_conger'));
        }
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin')) {
            $demande_conger_attente = $this->fonct->findWhere("v_demande_conger_attente", [], [], ["id"], "ASC");
            $demande_conger_accepter = $this->fonct->findWhere("v_demande_conger_accepter", [], [], ["id"], "ASC");
            $demande_conger_refuser = $this->fonct->findWhere("v_demande_conger_refuser", [], [], ["id"], "ASC");

            return view("admin.demande.demande_conger", compact('demande_conger_attente', 'demande_conger_accepter', 'demande_conger_refuser'));
        }
    } */

    public function index( $nbPag_para_attente = null, $nbPag_para_accepter = null, $nbPag_para_refuser = null,$page_cible=null)
    {
        $nb_limit = 15;
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
            $reste_conger = 0;
            $emp = $this->fonct->findWhereMultiOne("v_employe", ["user_id"], [Auth::user()->id]);

            $nbreTotal= $this->fonct->getNbrePagination("v_demande_conger", "id", ["employe_id"], ["="], [$emp->id], "AND");
            $pagination = $this->fonct->nb_liste_pagination($nbreTotal, $nbPag_attente, $nb_limit);
            $demande_conger = $this->fonct->findWhereTrieOrderBy("v_demande_conger", ["employe_id"], ["="], [$emp->id], ["id"], "AND", "DESC", $nbPag_attente,  $nb_limit);

            $totale_conger = $this->fonct->findWhereMultiOne("v_totale_conger", ["employe_id"], [$emp->id]);
            $dernier_conger = $this->fonct->findWhereMultiOne("v_dernier_demande_conger", ["employe_id"], [$emp->id]);

            if ($totale_conger != null) {
                $reste_conger = $totale_conger->rest_conger_year;
            } else {
                $reste_conger = $emp->total_day;
            }

            return view("employer.demande_conger", compact('pagination','demande_conger', 'reste_conger', 'dernier_conger'));

        }
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin')) {

            $nbreTotal_abs_attente = $this->fonct->getNbrePagination("v_demande_conger_attente", "id", [], [], [], "AND");
            $nbreTotal_abs_accepter = $this->fonct->getNbrePagination("v_demande_conger_accepter", "id", [], [], [], "AND");
            $nbreTotal_abs_refuser = $this->fonct->getNbrePagination("v_demande_conger_refuser", "id", [], [], [], "AND");

            $pagination_attente = $this->fonct->nb_liste_pagination($nbreTotal_abs_attente, $nbPag_attente, $nb_limit);
            $pagination_accepter = $this->fonct->nb_liste_pagination($nbreTotal_abs_accepter, $nbPag_accepter, $nb_limit);
            $pagination_refuser = $this->fonct->nb_liste_pagination($nbreTotal_abs_refuser, $nbPag_refuser, $nb_limit);

            $demande_conger_attente = $this->fonct->findWhereTrieOrderBy("v_demande_conger_attente", [], [], [], ["id"], "AND", "ASC", $nbPag_attente,  $nb_limit);
            $demande_conger_accepter = $this->fonct->findWhereTrieOrderBy( "v_demande_conger_accepter",[], [], [], ["id"],"AND","ASC", $nbPag_accepter,  $nb_limit );
            $demande_conger_refuser = $this->fonct->findWhereTrieOrderBy( "v_demande_conger_refuser", [], [], [], ["id"], "AND","ASC", $nbPag_refuser,  $nb_limit);
            return view("admin.demande.demande_conger", compact('page_cible','pagination_attente','pagination_accepter','pagination_refuser','demande_conger_attente', 'demande_conger_accepter', 'demande_conger_refuser'));
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
            DB::delete("DELETE FROM demande_congers WHERE id=?", [$id]);
            return back();
        } else {
            return back()->with('error', 'les employers seulement ont le droit d\'y entrer');
        }
    }

    public function filtre(Request $req, $nbPag_para_attente = null, $nbPag_para_accepter = null, $nbPag_para_refuser = null,$page_cible=null, $search_name_para = null)
    {
        $nb_limit = 15;
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

        $nbreTotal_abs_attente = $this->fonct->getNbrePagination("v_demande_conger_attente", "id", ["name", "username"], ["LIKE", "LIKE"], ["%" . $search_name . "%", "%" . $search_name . "%"], "OR");
        $nbreTotal_abs_accepter = $this->fonct->getNbrePagination("v_demande_conger_accepter", "id", ["name", "username"], ["LIKE", "LIKE"], ["%" . $search_name . "%", "%" . $search_name . "%"], "OR");
        $nbreTotal_abs_refuser = $this->fonct->getNbrePagination("v_demande_conger_refuser", "id", ["name", "username"], ["LIKE", "LIKE"], ["%" . $search_name . "%", "%" . $search_name . "%"], "OR");

        $demande_conger_attente = $this->fonct->findWhereTrieOrderBy(
            "v_demande_conger_attente",
            ["name", "username"],
            ["LIKE", "LIKE"],
            ["%" . $search_name . "%", "%" . $search_name . "%"],
            ["id"],
            "OR",
            "ASC",
            $nbPag_attente,
            $nb_limit
        );

        $demande_conger_accepter = $this->fonct->findWhereTrieOrderBy(
            "v_demande_conger_accepter",
            ["name", "username"],
            ["LIKE", "LIKE"],
            ["%" . $search_name . "%", "%" . $search_name . "%"],
            ["id"],
            "OR",
            "ASC",
            $nbPag_accepter,
            $nb_limit
        );

        $demande_conger_refuser = $this->fonct->findWhereTrieOrderBy(
            "v_demande_conger_refuser",
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

        return view("admin.demande.demande_conger", compact('search_name','page_cible','pagination_attente','pagination_accepter','pagination_refuser','demande_conger_attente', 'demande_conger_accepter', 'demande_conger_refuser'));

    }


    public function month(Request $req, $nbPag_para_attente = null, $nbPag_para_accepter = null, $nbPag_para_refuser = null,$page_cible_para=null, $search_month_para = null)
    {
        $nb_limit = 15;
        $nbPag_attente = 0;
        $nbPag_accepter = 0;
        $nbPag_refuser = 0;
        $search_month = "";
        $page_cible="";
        if($req->page_cible!=null){
              $page_cible=$req->page_cible;
            } else {
                $page_cible=$page_cible_para;
            }

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

        if ($search_month_para <= 0 || $search_month_para == null) {
            $search_month = $req->search_month;
        } else {
            $search_month = $search_month_para;
        }

        $nbreTotal_abs_attente = $this->fonct->getNbrePagination("v_demande_conger_attente", "id", ["month_date_debut", "month_date_fin"], ["=", "="], [$search_month, $search_month], "OR");
        $nbreTotal_abs_accepter = $this->fonct->getNbrePagination("v_demande_conger_accepter", "id", ["month_date_debut", "month_date_fin"], ["=", "="], [$search_month, $search_month], "OR");
        $nbreTotal_abs_refuser = $this->fonct->getNbrePagination("v_demande_conger_refuser", "id", ["month_date_debut", "month_date_fin"], ["=", "="], [$search_month, $search_month], "OR");

        $demande_conger_attente = $this->fonct->findWhereTrieOrderBy(
            "v_demande_conger_attente",
            ["month_date_debut", "month_date_fin"], ["=", "="], [$search_month, $search_month],
            ["id"],
            "OR",
            "ASC",
            $nbPag_attente,
            $nb_limit
        );

        $demande_conger_accepter = $this->fonct->findWhereTrieOrderBy(
            "v_demande_conger_accepter",
            ["month_date_debut", "month_date_fin"], ["=", "="], [$search_month, $search_month],
            ["id"],
            "OR",
            "ASC",
            $nbPag_accepter,
            $nb_limit
        );

        $demande_conger_refuser = $this->fonct->findWhereTrieOrderBy(
            "v_demande_conger_refuser",
            ["month_date_debut", "month_date_fin"], ["=", "="], [$search_month, $search_month],
            ["id"],
            "OR",
            "ASC",
            $nbPag_refuser,
            $nb_limit
        );

        $pagination_attente = $this->fonct->nb_liste_pagination($nbreTotal_abs_attente, $nbPag_attente, $nb_limit);
        $pagination_accepter = $this->fonct->nb_liste_pagination($nbreTotal_abs_accepter, $nbPag_accepter, $nb_limit);
        $pagination_refuser = $this->fonct->nb_liste_pagination($nbreTotal_abs_refuser, $nbPag_refuser, $nb_limit);


        return view("admin.demande.demande_conger", compact('search_month','page_cible','pagination_attente','pagination_accepter','pagination_refuser','demande_conger_attente', 'demande_conger_accepter', 'demande_conger_refuser'));

    }


    public function trie(Request $req)
    {
        $nb_limit = 15;
            $nbPag_attente = $req->debut_aff_attente;
            $nbPag_accepter = $req->debut_aff_accepter;
            $nbPag_refuser = $req->debut_aff_refuser;
        $search_name = "";
        $search_month = "";
        $order = "ASC";
        $colone_trie = ["id"];

        $demande_conger_attente = [];
        $demande_conger_accepter = [];
        $demande_conger_refuser = [];
        if ($req->data_value == 0) { // order by ASC
            $order = "ASC";
        }
        if ($req->data_value == 1) { // order by DESC
            $order = "DESC";
        }

        if ($req->colone == "MOTIF_CONGER") {
            $colone_trie = ["object"];
        }

        if ($req->colone == "DATE_DEBUT_CONGER") {
            $colone_trie = ["date_debut"];
        }

        if ($req->colone == "NAME_EMP_CONGER") {
            $colone_trie = ["name"];
        }

        if (isset($req->search_name)) { // recherche par Employer
            $search_name = $req->search_name;

            $demande_conger_attente = $this->fonct->findWhereTrieOrderBy(
                "v_demande_conger_attente",["name", "username"], ["LIKE", "LIKE"], ["%" . $search_name . "%", "%" . $search_name . "%"],
                $colone_trie,
                "OR",
                $order,
                $nbPag_attente,
                $nb_limit
            );

            $demande_conger_accepter = $this->fonct->findWhereTrieOrderBy(
                "v_demande_conger_accepter",["name", "username"], ["LIKE", "LIKE"], ["%" . $search_name . "%", "%" . $search_name . "%"],
                $colone_trie,
                "OR",
                $order,
                $nbPag_accepter,
                $nb_limit
            );

            $demande_conger_refuser = $this->fonct->findWhereTrieOrderBy(
                "v_demande_conger_refuser",["name", "username"], ["LIKE", "LIKE"], ["%" . $search_name . "%", "%" . $search_name . "%"],
                $colone_trie,
                "OR",
                $order,
                $nbPag_refuser,
                $nb_limit
            );

        } else if (isset($req->search_month)) { // recherche par date(Mois et année)
                $search_month = $req->search_month;

                $demande_conger_attente = $this->fonct->findWhereTrieOrderBy(
                    "v_demande_conger_attente",["month_date_debut", "month_date_fin"], ["=", "="], [$search_month, $search_month],
                    $colone_trie,
                    "OR",
                    $order,
                    $nbPag_attente,
                    $nb_limit
                );

                $demande_conger_accepter = $this->fonct->findWhereTrieOrderBy(
                    "v_demande_conger_accepter",["month_date_debut", "month_date_fin"], ["=", "="], [$search_month, $search_month],
                    $colone_trie,
                    "OR",
                    $order,
                    $nbPag_accepter,
                    $nb_limit
                );

                $demande_conger_refuser = $this->fonct->findWhereTrieOrderBy(
                    "v_demande_conger_refuser",["month_date_debut", "month_date_fin"], ["=", "="], [$search_month, $search_month],
                    $colone_trie,
                    "OR",
                    $order,
                    $nbPag_refuser,
                    $nb_limit
                );

        } else {

            $demande_conger_attente = $this->fonct->findWhereTrieOrderBy("v_demande_conger_attente",[], [], [], $colone_trie,"OR", $order, $nbPag_attente,$nb_limit );

            $demande_conger_accepter = $this->fonct->findWhereTrieOrderBy("v_demande_conger_accepter",[], [], [], $colone_trie, "OR",$order, $nbPag_accepter, $nb_limit );

            $demande_conger_refuser = $this->fonct->findWhereTrieOrderBy("v_demande_conger_refuser",[], [], [], $colone_trie,"OR", $order, $nbPag_refuser,$nb_limit );
        }
        return response()->json([
             "demande_conger_attente" => $demande_conger_attente
            ,"demande_conger_accepter" => $demande_conger_accepter
            ,"demande_conger_refuser" => $demande_conger_refuser
        ]);
    }
}
