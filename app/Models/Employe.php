<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

use App\Models\generique\FonctionGenerique;
use Illuminate\Support\Facades\DB;

class Employe extends Model
{
    use HasFactory;

    protected $table = "employes";
    protected $fillable = [
        'id', 'matricule', 'name', 'username', 'naissance', 'cin', 'email',
        'phone', 'poste_id', 'debut_job', 'fin_job', 'departement_id', 'salaire', 'adresse',
        'user_id', 'genre_id', 'conger_id', 'photo', 'activiter'
    ];

    public function insert($imput)
    {
        $fonct = new FonctionGenerique();
        $rules = [
            'nom.required' => 'le Nom ne doît pas être null',
            'nom.string' => 'le texte seulement est autorisé',
            'email.required' => 'le mail ne doît pas être null',
            'email.email' => 'le mail doît contenir "@",merci de bien le suivre'
        ];
        $critereForm = [
            'nom' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'cin' => 'required',
            'naissance' => 'required|date',
            'debut_job' => 'required|date',
            'salaire' => 'required'
        ];
        $imput->validate($critereForm, $rules);
        // $imput->validate($critereForm);

        $verify = $fonct->findWhere("users", ["email"], [$imput->email]);
        $verify2 = $fonct->findWhere("employes", ["email"], [$imput->cin]);

        if (count($verify) <= 0) {
            if (count($verify2) <= 0) {
            User::create([
                "name" => "" . $imput->nom . " " . $imput->prenom,
                "email" => "" . $imput->email,
                'password' => "" . Hash::make("0000"),
                "activiter" => True,
                "role_id" => 3
            ])->save();
            $user_id = $fonct->findWhereMulitOne("users", ["email"], [$imput->email])->id;
            $conger_id = $fonct->findAll("congers")[0]->id;

            Employe::create([
                "name" => "" . $imput->nom,
                "username" => "" . $imput->prenom,
                "cin" => "" . $imput->cin,
                "phone" => "" . $imput->phone,
                "email" => "" . $imput->email,
                "poste_id" => "" . $imput->poste,
                "debut_job" => "" . $imput->debut_job,
                "departement_id" => "" . $imput->departement_id,
                "naissance" => "" . $imput->naissance,
                "salaire" => "" . $imput->salaire,
                "adresse" => "" . $imput->adresse,
                "conger_id" => $conger_id,
                "user_id" => $user_id,
                "genre_id" => $imput->genre_id,
                "activiter" => True
            ])->save();

            return back()->with('success', 'employer a été ajouté');
        } else {
            return back()->with('error', 'CIN exist déjà');
        }
        } else {
            return back()->with('error', 'email exist déjà');
        }
    }

    public function modification($imput, $id)
    {
        $rules = [
            'nom.required' => 'le Nom  ne doît pas être null',
            'nom.string' => 'le texte seulement est autorisé',
            'email.required' => 'le mail ne doît pas être null',
            'email.email' => 'le mail doît contenir "@",merci de bien le suivre'
        ];
        $critereForm = [
            'nom' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'cin' => 'required',
            'naissance' => 'required|date',
            'debut_job' => 'required|date',
            'salaire' => 'required'
        ];
        $imput->validate($critereForm, $rules);
        $fin = null;
        if ($imput->fin_job != "" || $imput->fin_job != null) {
            $fin = $imput->fin_job;
        }
        $update = [
            "name" => "" . $imput->nom,
            "username" => "" . $imput->prenom,
            "cin" => "" . $imput->cin,
            "phone" => "" . $imput->phone,
            "email" => "" . $imput->email,
            "poste_id" => "" . $imput->poste,
            "debut_job" => "" . $imput->debut_job,
            "fin_job" =>  $fin,
            "departement_id" => "" . $imput->departement_id,
            "naissance" => "" . $imput->naissance,
            "salaire" => "" . $imput->salaire,
            "adresse" => "" . $imput->adresse,
            "genre_id" => $imput->genre_id
        ];
        $tmp =  Employe::where('id', $id)->update($update);


        if ($tmp) {
            return back()->with('success', 'l\'employer a été modifier');
        } else {
            return back()->with('error', 'une erreur est survenue lors de la modification du donnée');
        }
    }

    public function nouveau_compte_client($imput)
    {
        $fonct = new FonctionGenerique();
        $rules = [
            'nom.required' => 'le Nom ne doît pas être null',
            'nom.string' => 'le texte seulement est autorisé',
            'email.required' => 'le mail ne doît pas être null',
            'email.email' => 'le mail doît contenir "@",merci de bien le suivre'
        ];
        $critereForm = [
            'nom' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'cin' => 'required',
            'naissance' => 'required|date',
            'debut_job' => 'required|date',
            'salaire' => 'required'
        ];
        $imput->validate($critereForm, $rules);
        // $imput->validate($critereForm);

        $verify = $fonct->findWhere("users", ["email"], [$imput->email]);
        $verify2 = $fonct->findWhere("employes", ["email"], [$imput->cin]);

        if (count($verify) <= 0) {
            if (count($verify2) <= 0) {
            User::create([
                "name" => "" . $imput->nom . " " . $imput->prenom,
                "email" => "" . $imput->email,
                'password' => "" . Hash::make("0000"),
                "activiter" => True,
                "role_id" => 3
            ])->save();
            $user_id = $fonct->findWhereMulitOne("users", ["email"], [$imput->email])->id;
            $conger_id = $fonct->findAll("congers")[0]->id;

            Employe::create([
                "name" => "" . $imput->nom,
                "username" => "" . $imput->prenom,
                "cin" => "" . $imput->cin,
                "phone" => "" . $imput->phone,
                "email" => "" . $imput->email,
                "poste_id" => "" . $imput->poste,
                "debut_job" => "" . $imput->debut_job,
                "departement_id" => "" . $imput->departement_id,
                "naissance" => "" . $imput->naissance,
                "salaire" => "" . $imput->salaire,
                "adresse" => "" . $imput->adresse,
                "conger_id" => $conger_id,
                "user_id" => $user_id,
                "genre_id" => $imput->genre_id,
                "activiter" => True
            ])->save();

            return redirect()->route('home');
        } else {
            return back()->with('error', 'CIN exist déjà');
        }
        } else {
            return back()->with('error', 'email exist déjà');
        }
    }



}
