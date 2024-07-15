-- operations de rendez-vous

select 
	view_all_sortie.* , 
	view_all_entree.* 
		from view_all_sortie 
		left join view_all_entree
		on view_all_sortie.slot = view_all_entree.slot
	;