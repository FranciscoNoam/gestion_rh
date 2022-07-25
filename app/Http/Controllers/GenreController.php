<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Gate;

class GenreController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check() == false) return redirect('login');
            return $next($request);
        });

        $this->genre = new Genre();
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
            return  $this->genre->insert($request);
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
            return $this->genre->modification($request, $id);
        } else {
            return back()->with('error', 'les Administrateurs seulement ont le droit d\'y entrer');
        }
    }


    public function destroy($id)
    {
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin')) {
            DB::delete("DELETE FROM genres WHERE id=?", [$id]);
            return back();
        } else {
            return back()->with('error', 'les Administrateurs seulement ont le droit d\'y entrer');
        }
    }
}
