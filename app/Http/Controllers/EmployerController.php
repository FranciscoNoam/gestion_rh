<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;
use App\Models\generique\FonctionGenerique;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            // if (Auth::user()->exists == false) return redirect()->route('connection');
            if (Auth::user()->exists == false) return redirect('login');
            return $next($request);
        });

        $this->fonct = new FonctionGenerique();
    }

    public function index()
    {
    }

    public function filtre(Request $req, $nbPag_para = null, $search_name_para = null)
    {
        $nb_limit = 2;
        $nbPag = 0;
        $search_name = "";

        if ($nbPag_para <= 0 || $nbPag_para == null) {
            $nbPag = 1;
        } else {
            $nbPag = $nbPag_para;
        }
        if ($search_name_para <= 0 || $search_name_para == null) {
            $search_name = $req->search_name;
        } else {
            $search_name = $search_name_para;
        }
        $nbreTotal_emp = $this->fonct->getNbrePagination("v_employe", "id", ["name", "username"], ["LIKE", "LIKE"], ["%" . $search_name . "%", "%" . $search_name . "%"], "OR");
        $employes = $this->fonct->findWhereTrieOrderBy(
            "v_employe",
            ["name", "username"],
            ["LIKE", "LIKE"],
            ["%" . $search_name . "%", "%" . $search_name . "%"],
            ["id"],
            "OR",
            "ASC",
            $nbPag,
            $nb_limit
        );
        $pagination = $this->fonct->nb_liste_pagination($nbreTotal_emp, $nbPag, $nb_limit);

        $departements = $this->fonct->findAll("departements");
        $genres = $this->fonct->findAll("genres");
        $postes = $this->fonct->findAll("postes");

        return view('admin.home.home', compact('search_name', 'pagination', 'employes', 'departements', 'genres', 'postes'));
    }

    public function trie(Request $req)
    {
        $nb_limit = 2;
        $nbPag = $req->debut_aff;
        $search_name = "";
        $order = "ASC";
        $colone_trie = [];
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $emp = new Employe();
        return  $emp->insert($request);
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
        $emp = new Employe();
        return $emp->modification($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fonct = new FonctionGenerique();
        $emp =  $fonct->findById("employes", $id);
        DB::delete("DELETE FROM users WHERE id=?", [$emp->user_id]);
        DB::delete("DELETE FROM employes WHERE id=?", [$id]);
        return back();
    }
}
