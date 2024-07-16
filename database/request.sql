

-- Find the free slots
CREATE OR REPLACE VIEW finals4_view_free_slots AS
SELECT *,
       CAST(
           TIMEDIFF(fotoana_m, fotoana_v) - DATEDIFF(fotoana_m, fotoana_v) * 140 AS TIME
       ) AS diff
FROM (
    SELECT finals4_view_all_sortie.slot AS slot,
           CONCAT(finals4_view_all_sortie.daty, ' ', finals4_view_all_sortie.fotoana) AS fotoana_v,
           CONCAT(finals4_view_all_entree.daty, ' ', finals4_view_all_entree.fotoana) AS fotoana_m
    FROM finals4_view_all_sortie
    LEFT JOIN finals4_view_all_entree ON finals4_view_all_sortie.slot = finals4_view_all_entree.slot
    WHERE finals4_view_all_sortie.daty >= '2024-07-12'  -- Replace with the fixed reference date
) AS tab
WHERE fotoana_v < fotoana_m;

SELECT 
    *,
    CASE 
        WHEN (fotoana_v < '2024-07-13 10:00:00' AND fotoana_m > '2024-07-13 11:00:00')
             AND (diff > 3600 OR diff IS NULL)
        THEN 'Available'
        ELSE 'Not Available'
    END AS slot_availability
FROM finals4_view_free_slots;