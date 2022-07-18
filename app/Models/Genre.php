<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;


    protected $table = "genres";
    protected $fillable = [
        'id', 'name'
    ];

    public function insert($imput)
    {
        $rules = [
            'nom.required' => 'la description ne doît pas être null'
        ];
        $critereForm = [
            'nom' => 'required|string'
        ];
        $imput->validate($critereForm, $rules);
        Genre::create([
            "name" => "" . $imput->nom
        ])->save();

        return back()->with('success', 'nouveau genre  a été ajouté');
    }

    public function modification($imput, $id)
    {
        $rules = [
            'nom.required' => 'la description ne doît pas être null'
        ];
        $critereForm = [
            'nom' => 'required|string'
        ];
        $imput->validate($critereForm, $rules);

        $update = [
            "name" => "" . $imput->nom
        ];
        $tmp =  Genre::where('id', $id)->update($update);

        if ($tmp) {
            return back()->with('success', 'le genre a été modifier');
        } else {
            return back()->with('error', 'une erreur est survenue lors de la modification du donnée');
        }
    }

}
