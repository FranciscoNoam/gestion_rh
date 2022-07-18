<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande_absence extends Model
{
    use HasFactory;

    protected $table = "demande_absences";
    protected $fillable = [
        'id', 'object','description','date_debut','date_fin','hour_debut','hour_fin','validation','refus','employe_id'
    ];

     public function insert($imput,$emp_id)
    {
        $rules = [
            'object.required' => 'la objectif ne doît pas être null',
            'description.required' => 'la description ne doît pas être null',
            'date_debut.required' => 'la date debut ne doît pas être null',
            'date_fin.required' => 'la date fin ne doît pas être null',
            'hour_debut.required' => 'la heure debut ne doît pas être null',
            'hour_fin.required' => 'la heure fin ne doît pas être null'
        ];
        $critereForm = [
            'object' => 'required|string',
            'description' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'hour_debut' => 'required',
            'hour_fin' => 'required'
        ];
        $imput->validate($critereForm, $rules);
        Demande_absence::create([
            "object" => "" . $imput->object,
            "description" => "" . $imput->description,
            "date_debut" => "" . $imput->date_debut,
            "date_fin" => "" . $imput->date_fin,
            "hour_debut" => "" . $imput->hour_debut,
            "hour_fin" => "" . $imput->hour_fin,
            "validation" =>false,
            "refus" =>false,
            "employe_id" => $emp_id
        ])->save();

        return back()->with('success', 'demande de conger a été ajouté');
    }

    public function modification($imput, $id)
    {
        $rules = [
            'object.required' => 'la objectif ne doît pas être null',
            'description.required' => 'la description ne doît pas être null',
            'date_debut.required' => 'la date debut ne doît pas être null',
            'date_fin.required' => 'la date fin ne doît pas être null',
            'hour_debut.required' => 'la heure debut ne doît pas être null',
            'hour_fin.required' => 'la heure fin ne doît pas être null'
        ];
        $critereForm = [
            'object' => 'required|string',
            'description' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'hour_debut' => 'required',
            'hour_fin' => 'required'
        ];
        $imput->validate($critereForm, $rules);

        $update = [
            "object" => "" . $imput->object,
            "description" => "" . $imput->description,
            "date_debut" => "" . $imput->date_debut,
            "date_fin" => "" . $imput->date_fin,
            "hour_debut" => "" . $imput->hour_debut,
            "hour_fin" => "" . $imput->hour_fin
        ];
        $tmp =  Demande_absence::where('id', $id)->update($update);

        if ($tmp) {
            return back()->with('success', 'la demande d\'absence a été modifier');
        } else {
            return back()->with('error', 'une erreur est survenue lors de la modification du donnée');
        }
    }

}
