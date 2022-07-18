CREATE OR REPLACE VIEW v_employe AS SELECT
    employes.*,
    (postes.name) name_poste,
    (departements.name) name_departement,
    (genres.name) name_genre
FROM
    employes,
    genres,postes,
    departements
WHERE
    employes.genre_id = genres.id AND employes.departement_id = departements.id AND employes.poste_id=postes.id;
