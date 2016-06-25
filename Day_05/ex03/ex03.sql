INSERT INTO `ft_table`(login, date_de_creation, groupe) select nom, date_naissance, 'other' from fiche_personne where nom like "%a%" and length(nom)<9 order by nom limit 10;
