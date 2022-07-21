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
            if (Auth::user()->exists == false) return redirect('/');
            return $next($request);
        });

        $this->fonct = new FonctionGenerique();
    }

    public function index()
    {
    }

    public function filtre(Request $req)
    {
        $employes =  DB::select("SELECT * FROM v_employe WHERE name LIKE '%" . $req->search_name . "%' OR username LIKE '%" . $req->search_name . "%'");
        $departements = $this->fonct->findAll("departements");
        $genres = $this->fonct->findAll("genres");
        $postes = $this->fonct->findAll("postes");

        return view('admin.home.home', compact('employes', 'departements', 'genres','postes'));
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
