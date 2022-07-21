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
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            // if (Auth::user()->exists == false) return redirect()->route('connection');
            if (Auth::user()->exists == false) return redirect('/');
            return $next($request);
        });

        $this->fonct = new FonctionGenerique();
        $this->demande = new Demande_conger();
    }

    public function index()
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
}
