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

    public function queryWhere($nomTab, $para = [], $val = [])
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
    public function findWhere($nomTab, $para = [], $val = [])
    {
        $fonction = new FonctionGenerique();
        // echo $fonction->queryWhere($nomTab,$para,$val);
        $data =  DB::select($fonction->queryWhere($nomTab, $para, $val), $val);
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
        $data =  DB::select($fonction->queryWhere($nomTab, $para, $val), $val);
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


    public function findAllPagination($nomTab, $nom_id, $dernier_id, $nbPage)
    {
        if ($dernier_id <= 0) {
            $dernier_id = 1;
        }
        $query = "SELECT * FROM " . $nomTab . " WHERE " . $nom_id . ">=" . $dernier_id . " LIMIT " . $nbPage;
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
    //    dd($query);
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

}
