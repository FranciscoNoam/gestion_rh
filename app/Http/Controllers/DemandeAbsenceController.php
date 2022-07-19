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
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::user()->exists == false) return redirect()->route('connection');
            return $next($request);
        });

        $this->fonct = new FonctionGenerique();
        $this->demande = new Demande_absence();
    }

    public function index()
    {
        $employe_id = $this->fonct->findWhereMultiOne("employes",["user_id"],[Auth::user()->id])->id;
        $demande_absence = $this->fonct->findWhere("demande_absences",["employe_id"],[$employe_id],["id"],"DESC");
        return view("employer.demande_absence",compact('demande_absence'));
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
            DB::delete("DELETE FROM demande_absences WHERE id=?", [$id]);
            return back();
        } else {
            return back()->with('error', 'les employers seulement ont le droit d\'y entrer');
        }
    }
}
