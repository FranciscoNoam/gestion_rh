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
