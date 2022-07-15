<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

use App\Models\generique\FonctionGenerique;
class Employe extends Model
{
    use HasFactory;

    protected $table = "employes";
    protected $fillable = ['id','matricule','name','username','naissance','cin','email',
          'phone','poste', 'debut_job','fin_job', 'departement_id', 'salaire','adresse',
        'user_id','genre_id','conger_id', 'photo','activiter'];

    public function insert($imput){
        $fonct = new FonctionGenerique();
        $rules = [
            'nom.required' => 'le Nom du super Admin ne doît pas être null',
            'nom.string' => 'le texte seulement est autorisé',
            'email.required' => 'le mail ne doît pas être null',
            'email.email' => 'le mail doît contenir "@",merci de bien le suivre'
        ];
        $critereForm = [
            'nom' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'cin' => 'required',
            'poste' => 'required',
            'naissance' => 'required|date',
            'debut_job' => 'required|date',
            'salaire' => 'required'
        ];
        $imput->validate($critereForm, $rules);
        // $imput->validate($critereForm);

        $verify = $fonct->findWhere("users",["email"],[$imput->email]);

        if(count($verify)<=0){
            User::create([
                "name"=>"".$imput->nom." ".$imput->prenom,
                "email"=>"".$imput->email,
                'password' => "".Hash::make("0000"),
                "activiter"=>True,
                "role_id"=>3
               ])->save();
              $user_id = $fonct->findWhereMulitOne("users",["email"],[$imput->email])->id;
              $conger_id = $fonct->findAll("congers")[0]->id;

               Employe::create([
                "name"=>"".$imput->nom,
                "username"=>"".$imput->prenom,
                "cin"=>"".$imput->cin,
                "phone"=>"".$imput->phone,
                "email"=>"".$imput->email,
                "poste"=>"".$imput->poste,
                "debut_job"=>"".$imput->debut_job,
                "departement_id"=>"".$imput->departement_id,
                "naissance"=>"".$imput->naissance,
                "salaire"=>"".$imput->salaire,
                "adresse"=>"".$imput->adresse,
                "conger_id"=>$conger_id,
                "user_id"=>$user_id,
                "genre_id"=>$imput->genre_id,
                "activiter"=>True
               ])->save();

               return back()->with('success','employer a été ajouté');
        } else {
            return back()->with('error','email exist déjà');
        }


    }



}
