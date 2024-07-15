-- operations de rendez-vous

select all_sortie.* , all_entree.*  , TIMEDIFF(all_entree.entree_date,all_sortie.sortie_date) as duree from
		( select sortie_date , sortie_time , slot from finals4_operation_rendez_vous order by sortie_date , sortie_time ) as all_sortie 
	left join 
		(select entree_date , entree_time , slot from finals4_operation_rendez_vous order by entree_date , entree_time) as all_entree 
	on all_sortie.sortie_date + all_sortie.sortie_time = all_entree.slot ;

