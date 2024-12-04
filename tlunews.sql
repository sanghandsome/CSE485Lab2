create table users (
	id INT,
	username VARCHAR(255),
	password VARCHAR(255),
	role INT CHECK (role IN (0, 1))
);

insert into users (id, username, PASSWORD,role) VALUES (1,'Brittney Brooksbank', 'qM3&Bu$ID>ZJAnJT',0);
insert into users (id, username, PASSWORD,role) values (2, 'Currey Bleythin', 'iN4$v@9R*wLS@5',0);
insert into users (id, username, PASSWORD,role) values (3, 'Wat Sayles', 'dV5"bT_w#',0);
insert into users (id, username, PASSWORD,role) values (4, 'Kathrine Grishakin', 'sX4*4k47E1e4N?<',0);
insert into users (id, username, PASSWORD,role) values (5, 'Romy Dauby', 'tQ1,BuHx3_R@q',0);
insert into users (id, username, PASSWORD,role) values (6, 'Haskel Mechan', 'cX0*4~}z',0);
insert into users (id, username, PASSWORD,role) VALUES (7, 'admin', 'admin',1);
insert into users (id, username, PASSWORD,role) VALUES (8, 'sang', '1234',1);




