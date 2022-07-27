
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
demande_congers.*,DATEDIFF(date_fin,date_debut) AS totale_day_conger,DATE_FORMAT(date_fin, "%Y-%m") AS month_date_fin,DATE_FORMAT(date_debut, "%Y-%m") AS month_date_debut,YEAR(date_fin) AS year_date_fin,YEAR(date_debut) AS year_date_debut,
employes.name,employes.username,employes.email,employes.phone
FROM
demande_congers,employes WHERE demande_congers.employe_id = employes.id;

CREATE OR REPLACE VIEW v_totale_conger_tmp AS SELECT
employe_id,year_date_fin,year_date_debut,SUM(totale_day_conger) AS  sum_day_conger
FROM
v_demande_conger WHERE validation=True
GROUP BY employe_id,year_date_fin,year_date_debut;


CREATE OR REPLACE VIEW v_totale_conger AS SELECT
employe_id,v_employe.name,v_employe.username,year_date_fin,year_date_debut,
sum_day_conger, (v_employe.total_day-sum_day_conger) rest_conger_year
FROM
v_totale_conger_tmp,v_employe
WHERE v_totale_conger_tmp.employe_id = v_employe.id;


CREATE OR REPLACE VIEW v_demande_conger_attente AS SELECT
id,
object,
description,
date_debut,
date_fin,
month_date_fin,month_date_debut,
year_date_fin,
year_date_debut,
employe_id,
totale_day_conger,
name,
username,
email,
phone
FROM
v_demande_conger
WHERE
validation = FALSE AND refus = FALSE;


CREATE OR REPLACE VIEW v_demande_conger_accepter AS SELECT
id,
object,
description,
date_debut,
date_fin,
month_date_fin,month_date_debut,
year_date_fin,
year_date_debut,
employe_id,
totale_day_conger,
name,
username,
email,
phone
FROM
v_demande_conger
WHERE
validation = TRUE AND refus = FALSE;


CREATE OR REPLACE VIEW v_demande_conger_refuser AS SELECT
id,
object,
description,
date_debut,
date_fin,
month_date_fin,month_date_debut,
year_date_fin,
year_date_debut,
employe_id,
totale_day_conger,
name,
username,
email,
phone
FROM
v_demande_conger
WHERE
refus = TRUE;

