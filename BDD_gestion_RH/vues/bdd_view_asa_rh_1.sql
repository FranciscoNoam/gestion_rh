CREATE OR REPLACE VIEW v_employe AS SELECT
    employes.*,
    (postes.name) name_poste,
    (departements.name) name_departement,
    (genres.name) name_genre,
    congers.total_day,
    congers.total_year
FROM
    employes,
    genres,postes,congers,
    departements
WHERE
    employes.genre_id = genres.id AND employes.departement_id = departements.id AND employes.poste_id=postes.id AND employes.conger_id = congers.id;

CREATE OR REPLACE VIEW v_dernier_demande_conger_tmp AS SELECT
    MAX(id) AS idMax,
    employe_id
FROM
    demande_congers
GROUP BY
    employe_id;


CREATE OR REPLACE VIEW v_dernier_demande_conger AS SELECT
    v_dernier_demande_conger_tmp.employe_id, idMax,date_debut,date_fin
FROM
    demande_congers,
    v_dernier_demande_conger_tmp
WHERE
    v_dernier_demande_conger_tmp.employe_id = demande_congers.employe_id AND v_dernier_demande_conger_tmp.idMax = demande_congers.id;


CREATE OR REPLACE VIEW v_demande_conger AS SELECT
   demande_congers.*,DATEDIFF(date_fin,date_debut) AS totale_day_conger,YEAR(date_fin) AS year_date_fin,YEAR(date_debut) AS year_date_debut
FROM
    demande_congers;


CREATE OR REPLACE VIEW v_totale_conger_tmp AS SELECT
   employe_id,year_date_fin,year_date_debut,SUM(totale_day_conger) AS  sum_day_conger
FROM
    v_demande_conger
    GROUP BY employe_id,year_date_fin,year_date_debut;


CREATE OR REPLACE VIEW v_totale_conger AS SELECT
   employe_id,v_employe.name,v_employe.username,year_date_fin,year_date_debut,
   sum_day_conger, (v_employe.total_day-sum_day_conger) rest_conger_year
FROM
    v_totale_conger_tmp,v_employe
   WHERE v_totale_conger_tmp.employe_id = v_employe.id;
