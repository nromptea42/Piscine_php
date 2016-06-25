SELECT titre, resum FROM `film` WHERE resum LIKE "%42%" OR titre LIKE "%42%" order by duree_min;
