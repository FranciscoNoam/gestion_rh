<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;
use App\Models\generique\FonctionGenerique;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class DepartementController extends Controller
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
        $this->dep = new Departement();
    }

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin')) {
            return  $this->dep->insert($request);
        } else {
            return back()->with('error', 'les Administrateurs seulement ont le droit d\'y entrer');
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
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin')) {
            return $this->dep->modification($request, $id);
        } else {
            return back()->with('error', 'les Administrateurs seulement ont le droit d\'y entrer');
        }
    }


    public function destroy($id)
    {
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin')) {
            DB::delete("DELETE FROM departements WHERE id=?", [$id]);
            return back();
        } else {
            return back()->with('error', 'les Administrateurs seulement ont le droit d\'y entrer');
        }
    }
}
