use food;

drop table if exists ingredients;

create table ingredients ( id 			int			not null,
						  nom			varchar(20) not null,
                          quantite		int			not null,
                          prix			double      not null,
                          Primary key(Id)
						);

select * from ingredients;
