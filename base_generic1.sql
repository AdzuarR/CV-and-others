drop table espece;
drop table famille;

Create table famille(
Id_f int(4) primary key,
famille varchar(25),
info_famille varchar(400)
)ENGINE=INNODB;

Create table espece (
Id_sp int(4) primary key,
espece varchar(25),
genre varchar(25),
famille varchar(25),
lien_photo varchar(200)
)ENGINE=INNODB;
