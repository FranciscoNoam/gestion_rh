<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\generique\FonctionGenerique;
use Illuminate\Http\Request;

class NouveauCompteController extends Controller
{

    public function __construct()
    {

        $this->fonct = new FonctionGenerique();
    }

    public function nouveau(){
        $departements = $this->fonct->findAll("departements");
        $genres = $this->fonct->findAll("genres");
        $postes = $this->fonct->findAll("postes");
        return view('admin.nouveau', compact('departements', 'genres','postes'));
    }


    public function index()
    {
        //
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
        return  $emp->nouveau_compte_client($request);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
