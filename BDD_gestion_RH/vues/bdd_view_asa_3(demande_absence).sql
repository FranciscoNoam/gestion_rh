
CREATE OR REPLACE VIEW v_dernier_demande_absence_tmp AS SELECT
MAX(id) AS idMax,
employe_id
FROM
demande_absences
GROUP BY
employe_id;


CREATE OR REPLACE VIEW v_dernier_demande_absence AS SELECT
v_dernier_demande_absence_tmp.employe_id, idMax,date_debut,date_fin
FROM
demande_absences,
v_dernier_demande_absence_tmp
WHERE
v_dernier_demande_absence_tmp.employe_id = demande_absences.employe_id AND v_dernier_demande_absence_tmp.idMax = demande_absences.id;


CREATE OR REPLACE VIEW v_demande_absence AS SELECT
demande_absences.*,DATEDIFF(date_fin,date_debut) AS totale_day_absence,DATE_FORMAT(date_fin, "%Y-%m") AS month_date_fin,DATE_FORMAT(date_debut, "%Y-%m") AS month_date_debut,YEAR(date_fin) AS year_date_fin,YEAR(date_debut) AS year_date_debut,
employes.name,employes.username,employes.email,employes.phone
FROM
demande_absences,employes WHERE demande_absences.employe_id = employes.id;

CREATE OR REPLACE VIEW v_totale_absence_tmp AS SELECT
employe_id,year_date_fin,year_date_debut,SUM(totale_day_absence) AS  sum_day_absence
FROM
v_demande_absence  WHERE validation=True
GROUP BY employe_id,year_date_fin,year_date_debut;


CREATE OR REPLACE VIEW v_totale_absence AS SELECT
employe_id,v_employe.name,v_employe.username,year_date_fin,year_date_debut,
sum_day_absence, (v_employe.total_day-sum_day_absence) rest_absence_year
FROM
v_totale_absence_tmp,v_employe
WHERE v_totale_absence_tmp.employe_id = v_employe.id;


CREATE OR REPLACE VIEW v_demande_absence_attente AS SELECT
id,
object,
description,
date_debut,
date_fin,
hour_debut,
hour_fin,
month_date_fin,month_date_debut,
year_date_fin,
year_date_debut,
employe_id,
totale_day_absence,
name,
username,
email,
phone
FROM
v_demande_absence
WHERE
validation = FALSE AND refus = FALSE;


CREATE OR REPLACE VIEW v_demande_absence_accepter AS SELECT
id,
object,
description,
date_debut,
hour_debut,
hour_fin,
date_fin,
month_date_fin,month_date_debut,
year_date_fin,
year_date_debut,
employe_id,
totale_day_absence,
name,
username,
email,
phone
FROM
v_demande_absence
WHERE
validation = TRUE AND refus = FALSE;


CREATE OR REPLACE VIEW v_demande_absence_refuser AS SELECT
id,
object,
description,
date_debut,
hour_debut,
hour_fin,
date_fin,
month_date_fin,month_date_debut,
year_date_fin,
year_date_debut,
employe_id,
totale_day_absence,
name,
username,
email,
phone
FROM
v_demande_absence
WHERE
refus = TRUE;

