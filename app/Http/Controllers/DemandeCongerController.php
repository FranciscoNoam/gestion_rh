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
            if (Auth::user()->exists == false) return redirect()->route('connection');
            return $next($request);
        });

        $this->fonct = new FonctionGenerique();
        $this->demande = new Demande_conger();
    }

    public function index()
    {
        $employe_id = $this->fonct->findWhereMultiOne("employes",["user_id"],[Auth::user()->id])->id;
        $demande_conger = $this->fonct->findWhere("demande_congers",["employe_id"],[$employe_id]);
        $totale_conger = $this->fonct->findWhereMultiOne("v_totale_conger",["employe_id"],[$employe_id]);
        return view("employer.demande_conger",compact('demande_conger','totale_conger'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        if (Gate::allows('isEmployer')) {
            $employe_id = $this->fonct->findWhereMultiOne("employes",["user_id"],[Auth::user()->id])->id;
            return  $this->demande->insert($request,$employe_id);
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
