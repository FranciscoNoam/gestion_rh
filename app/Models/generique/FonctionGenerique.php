<?php

namespace App\Models\generique;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FonctionGenerique extends Model
{
    use HasFactory;

    public function queryWhereVerify($nomTab, $para = [], $val = [])
    {
        $query = "SELECT COUNT(id) id FROM " . $nomTab . " WHERE ";
        if (count($para) != count($val)) {
            return "ERROR: tail des onnees parametre et value est different";
        } else {
            for ($i = 0; $i < count($para); $i++) {
                $query .= "" . $para[$i] . "= ?";
                if ($i + 1 < count($para)) {
                    $query .= " AND ";
                }
            }
            return $query;
        }
    }

    public function queryWhereParam($nomTab, $para = [], $opt = [], $val = [])
    {
        $query = "SELECT * FROM " . $nomTab . " WHERE ";
        if (count($para) != count($val)) {
            return "ERROR: tail des onnees parametre et value est different";
        } else {
            for ($i = 0; $i < count($para); $i++) {
                $query .= "" . $para[$i] . "" . $opt[$i] . " ?";
                if ($i + 1 < count($para)) {
                    $query .= " AND ";
                }
            }
            return $query;
        }
    }

    public function queryWhereParamOr($nomTab, $para = [], $opt = [], $val = [])
    {
        $query = "SELECT * FROM " . $nomTab . " WHERE ";
        if (count($para) != count($val)) {
            return "ERROR: tail des onnees parametre et value est different";
        } else {
            for ($i = 0; $i < count($para); $i++) {
                $query .= "" . $para[$i] . "" . $opt[$i] . " ?";
                if ($i + 1 < count($para)) {
                    $query .= " OR ";
                }
            }
            return $query;
        }
    }

    public function queryWhereTrieOrderBy($nomTab, $para = [], $opt = [], $val = [], $tabOrderBy = [],$constraint, $order, $nbPag, $nb_limit)
    {
        if ($nbPag == null) {
            $nbPag = 1;
        }
        $query="";
        $query1="SELECT * FROM ";
        $query2 = "(SELECT * FROM " . $nomTab;
        if (count($para) != count($val)) {
            return "ERROR: tail des onnees parametre et value est different";
        } else {

            if(count($para)>0 && count($val)>0){
                $query2 .= " WHERE ";
                for ($i = 0; $i < count($para); $i++) {
                    $query2 .= "" . $para[$i] . " " . $opt[$i] . " ? ";
                    if ($i + 1 < count($para)) {
                        $query2 .= " ".$constraint." ";
                    }
                }
            }

            $query2 .= " LIMIT ".$nb_limit." OFFSET ".($nbPag-1).") AS t2";
            $query = $query1." ".$query2;

            if(count($tabOrderBy)>0){
                $query .= "  ORDER BY ";

                for ($j1 = 0; $j1 < count($tabOrderBy); $j1++) {
                    $query .= " " . $tabOrderBy[$j1];
                    if ($j1 + 1 < count($tabOrderBy)) {
                        $query .= " , ";
                    }
                }
                $query.=" ".$order;
            }
            return $query;
        }
    }

    public function queryWhere($nomTab, $para = [], $val = [],$order=[],$constraint)
    {
        $query = "SELECT * FROM " . $nomTab;
        if (count($para) != count($val)) {
            return "ERROR: tail des onnees parametre et value est different";
        } else {
            if(count($para)>0 && count($val)>0){
                $query .= " WHERE ";

                for ($i = 0; $i < count($para); $i++) {
                    $query .= "" . $para[$i] . "= ?";
                    if ($i + 1 < count($para)) {
                        $query .= " AND ";
                    }
                }
            }

        }
        if(count($order)>0){
            $query .= " ORDER BY ";
            for ($ii = 0; $ii < count($order); $ii++) {
                $query .= "" . $order[$ii] ;
                if ($ii + 1 < count($order)) {
                    $query .= ",";
                }
            }
            $query .= " ".$constraint;
        }
        return $query;
    }

    public function queryWhereMultiOne($nomTab, $para = [], $val = [])
    {
        $query = "SELECT * FROM " . $nomTab . " WHERE ";
        if (count($para) != count($val)) {
            return "ERROR: tail des onnees parametre et value est different";
        } else {
            for ($i = 0; $i < count($para); $i++) {
                $query .= "" . $para[$i] . "= ?";
                if ($i + 1 < count($para)) {
                    $query .= " AND ";
                }
            }

            return $query;
        }
    }

    public function queryWhereOr($nomTab, $para = [], $val = [])
    {
        $query = "SELECT * FROM " . $nomTab . " WHERE ";
        if (count($para) != count($val)) {
            return "ERROR: tail des onnees parametre et value est different";
        } else {
            for ($i = 0; $i < count($para); $i++) {
                $query .= "" . $para[$i] . "= ?";
                if ($i + 1 < count($para)) {
                    $query .= " OR ";
                }
            }
            return $query;
        }
    }

    public function queryWherePagination($nomTab, $para = [], $val = [])
    {
        $query = "SELECT * FROM " . $nomTab . " WHERE ";
        if (count($para) != count($val)) {
            return "ERROR: tail des onnees parametre et value est different";
        } else {
            for ($i = 0; $i < count($para); $i++) {
                $query .= "" . $para[$i] . "= '" . $val[$i] . "'";
                if ($i + 1 < count($para)) {
                    $query .= " AND ";
                }
            }
            return $query;
        }
    }

    //select colonne/* from table where value =  ... => tableau
    public function findWhere($nomTab, $para = [], $val = [],$order=[],$constraint)
    {
        $fonction = new FonctionGenerique();
        // echo $fonction->queryWhere($nomTab,$para,$val);
        $data =  DB::select($fonction->queryWhere($nomTab, $para, $val,$order,$constraint), $val);
        return $data;
    }

    public function findWhereParam($nomTab, $para = [], $opt = [], $val = [])
    {
        $fonction = new FonctionGenerique();
        // echo $fonction->queryWhere($nomTab,$para,$val);
        $data =  DB::select($fonction->queryWhereParam($nomTab, $para, $opt, $val), $val);
        return $data;
    }
    public function findWhereParamOr($nomTab, $para = [], $opt = [], $val = [])
    {
        $fonction = new FonctionGenerique();
        // echo $fonction->queryWhere($nomTab,$para,$val);
        $data =  DB::select($fonction->queryWhereParamOr($nomTab, $para, $opt, $val), $val);
        return $data;
    }
    //select colonne/* from table where value =  ... or  => tableau

    public function findWhereOr($nomTab, $para = [], $val = [])
    {
        $fonction = new FonctionGenerique();
        // echo $fonction->queryWhere($nomTab,$para,$val);
        $data =  DB::select($fonction->queryWhereOr($nomTab, $para, $val), $val);
        return $data;
    }


    //select colonne/* from table where value =  ... => une seule données
    public function findWhereMultiOne($nomTab, $para = [], $val = [])
    {
        $fonction = new FonctionGenerique();
        $data =  DB::select($fonction->queryWhereMultiOne($nomTab, $para, $val), $val);
        if (count($data) <= 0) {
            return $data;
        } else {
            return $data[0];
        }
    }

    public function verifyGenerique($nomTab, $para = [], $val = [])
    {
        $fonction = new FonctionGenerique();
        $data =  DB::select($fonction->queryWhereVerify($nomTab, $para, $val), $val);
        return $data[0];
    }

    //select * from

    public function findAll($nomTab)
    {
        $query = "SELECT * FROM " . $nomTab;
        return DB::select($query);
    }

    public function findWherePagination($nomTab, $para = [], $val = [], $nbDebutPagination, $nbPage)
    {
        $fonction = new FonctionGenerique();
        $query = $fonction->queryWherePagination($nomTab, $para, $val);
        if ($nbDebutPagination <= 0) {
            $nbDebutPagination = 0;
        }
        else {
            $nbDebutPagination = $nbDebutPagination - 1;
        }
        $query = $query . " LIMIT " . $nbPage . " OFFSET " . $nbDebutPagination;
        $data =  DB::select($query);
        return $data;
    }

    public function findAllQuery($query)
    {
        return DB::select($query);
    }

    public function findWhereOne($nomTab, $para, $opt, $val)
    {
        $query = "SELECT * FROM " . $nomTab . " WHERE " . $para . " " . $opt . "?";
        $data =  DB::select($query, [$val]);
        if (count($data) <= 0) {
            return $data;
        } else {
            return $data[0];
        }
    }

    public function findById($nomTab, $id)
    {
        $query = "SELECT * FROM " . $nomTab . " WHERE id=?";
        $data = DB::select($query, [$id]);
        if (count($data) <= 0) {
            return $data;
        } else {
            return $data[0];
        }
    }
    public function concatTwoList($etp1, $etp2)
    {
        $tab = array();
        for ($i = 0; $i < count($etp1); $i += 1) {
            $tab[] = $etp1[$i];
        }
        for ($j = 0; $j < count($etp2); $j += 1) {
            $tab[] = $etp2[$j];
        }

        return $tab;
    }

/*
	public function queryWhereTrieOrderBy($nomTab, $para = [], $opt = [], $val = [], $tabOrderBy = [], $order, $nbPag, $nb_limit)
    {
        if ($nbPag == null) {
            $nbPag = 1;
        }
        $query="";
        $query1="SELECT * FROM ";
        $query2 = "(SELECT * FROM " . $nomTab;
        if (count($para) != count($val)) {
            return "ERROR: tail des onnees parametre et value est different";
        }
		else {

            if(count($para)>0 && count($val)>0  && count($opt)>0){
                $query2 .= " WHERE ";
                for ($i = 0; $i < count($para); $i++) {
                    $query2 .= "" . $para[$i] . " " . $opt[$i] . " '".$val[$i]."'";
                    if ($i + 1 < count($para)) {
                        $query2 .= " AND ";
                    }
                }
            }

            $query2 .= " LIMIT ".$nb_limit." OFFSET ".($nbPag-1).") AS t2";
            $query = $query1." ".$query2;
            $query .= "  ORDER BY ";

            for ($j1 = 0; $j1 < count($tabOrderBy); $j1++) {
                $query .= " " . $tabOrderBy[$j1];
                if ($j1 + 1 < count($tabOrderBy)) {
                    $query .= " , ";
                }
            }
            $query.=" ".$order;
            return $query;
        }
    } */

    public function findWhereTrieOrderBy($nomTab, $para = [], $opt = [], $val = [], $tabOrderBy = [],$constraint, $order, $nbPag, $nb_limit)
    {
        $data =  DB::select($this->queryWhereTrieOrderBy($nomTab, $para, $opt, $val, $tabOrderBy,$constraint, $order, $nbPag, $nb_limit), $val);
		return $data;
    }



    public function queryPagination($nomTab, $col_para, $para = [], $opt = [], $val = [],$constraint)
    {
        $query = "SELECT ( COUNT(".$col_para.")) totale FROM " . $nomTab ;
        if (count($para) != count($val)) {
            return "ERROR: tail des onnees parametre et value est different";
        } else {

            if(count($para)>0 && count($val)>0 && count($opt)>0){
                $query .= " WHERE ";
                for ($i = 0; $i < count($para); $i++) {
                    $query .= "" . $para[$i] . " ".$opt[$i]." ?";
                    if ($i + 1 < count($para)) {
                        $query .= " ".$constraint." ";
                    }
                }
            }

            return $query;
        }
    }

    public function getNbrePagination($nomTab, $col_para, $para = [], $opt = [], $val = [],$constraint){

        $data =  DB::select($this->queryPagination($nomTab, $col_para, $para, $opt, $val,$constraint), $val);

	  return $data[0]->totale;
    }

    public function nb_liste_pagination($totaleDataList, $nb_debut_pag,$nb_limit)
    {

        if ($totaleDataList != null) {
            $totale_pagination = $totaleDataList;
        } else {
            $totale_pagination = 0;
        }
        $debut_aff = 0;
        $fin_aff = 0;

        if ($nb_debut_pag <= 0 || $nb_debut_pag == null) {
            $nb_debut_pag = 1;
        }

        if ($nb_debut_pag == 1) { // 1
            $nb_debut_pag = 1;
            $debut_aff = 1;
            $fin_aff = $nb_debut_pag + $nb_limit;

            if($fin_aff>=$totale_pagination){
                $fin_aff = $totale_pagination;
            }
        }

        if ($nb_debut_pag > 1 && $nb_debut_pag < $totale_pagination) {
            $fin_aff = $nb_debut_pag + $nb_limit;
            $debut_aff = $nb_debut_pag;
        }
        if ($nb_debut_pag  == $totale_pagination) {
            $fin_aff = ($nb_debut_pag - 1) + $nb_limit;
            if($fin_aff>=$totale_pagination){
                $fin_aff = $totale_pagination;
            }
            $debut_aff = $nb_debut_pag;
        }

        if($fin_aff>=$totale_pagination){
            $fin_aff = $totale_pagination;
        }

        $data["nb_limit"] = $nb_limit;
        $data["debut_aff"] = $debut_aff;
        $data["fin_aff"] = $fin_aff;
        $data["totale_pagination"] = $totale_pagination;
        return $data;
    }



}
