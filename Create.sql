use food;

drop table if exists Ingredient;

create table Ingredient ( Id 			int			not null auto_increment,
						  Nom			varchar(20) not null,
                          Quantite		int			not null,
                          Primary key(Id)
						);
                        
insert into Ingredient(Nom, Quantite) values
	('tomate concombre', 50),
    ('fromage', 20),
    ('tomate', 10)
;
select * from Ingredient;
