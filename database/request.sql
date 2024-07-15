-- operations de rendez-vous

select all_sortie.* , all_entree.*  , TIMEDIFF(all_entree.entree_date,all_sortie.sortie_date) as duree from
		( select sortie_date , sortie_time , slot from finals4_operation_rendez_vous order by sortie_date , sortie_time ) as all_sortie 
	left join 
		(select entree_date , entree_time , slot from finals4_operation_rendez_vous order by entree_date , entree_time) as all_entree 
	on all_sortie.sortie_date + all_sortie.sortie_time = all_entree.slot ;



SELECT * , CAST(TIMEDIFF(fotoana_m ,fotoana_v)-DATEDIFF(fotoana_m, fotoana_v)*140000 AS TIME) as diff FROM (
    SELECT
	 	  view_all_sortie.slot as slot,
        CONCAT(view_all_sortie.daty, ' ', view_all_sortie.fotoana) AS fotoana_v, 
        CONCAT(view_all_entree.daty, ' ', view_all_entree.fotoana) AS fotoana_m
    FROM view_all_sortie 
    LEFT JOIN view_all_entree ON view_all_sortie.slot = view_all_entree.slot
) AS tab where fotoana_v < fotoana_m;

