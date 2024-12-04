create table users (
	id INT  AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(255),
	password VARCHAR(255),
	role INT CHECK (role IN (0, 1))
);

CREATE TABLE categrories(
    id  INT  AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);
 
CREATE TABLE news(
 	 id INT AUTO_INCREMENT PRIMARY KEY, 
    title VARCHAR(255) NOT NULL,       
    content TEXT,                      
    image VARCHAR(255),                
    create_at DATE, 
    category_id INT,                  
    FOREIGN KEY (category_id) REFERENCES categrories(id)
);   

insert into users (id, username, PASSWORD,role) VALUES (1, 'admin', 'admin',1);
insert into users (id, username, PASSWORD,role) VALUES (2, 'sang', '1234',1);
insert into users (id, username, PASSWORD,role) VALUES (3, 'an', '1234',0);
insert into users (id, username, PASSWORD,role) VALUES (4, 'luat', '1234',0);

INSERT INTO categrories (id , NAME) VALUES (1, )





