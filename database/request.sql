-- operations de rendez-vous

-- left join de view_all_sortie et de view_all_entree


(select 
	view_all_sortie.* , 
	view_all_entree.* 
		from view_all_sortie 
		left join view_all_entree
		on view_all_sortie.slot = view_all_entree.slot
	)




