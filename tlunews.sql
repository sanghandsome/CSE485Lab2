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

INSERT INTO categrories (id , NAME) VALUES (1, 'Thể Thao');
INSERT INTO categrories (id , NAME) VALUES (2, 'Chính Trị');
INSERT INTO categrories (id , NAME) VALUES (3, 'Nghệ Thuật');
INSERT INTO categrories (id , NAME) VALUES (4, 'Học Tập');

INSERT INTO news(id,title,content,image,create_at,category_id) VALUES(1,'V-League 2024: Kịch Tính Đỉnh Cao Giữa Hai Đội Đầu Bảng' , 'Vòng đấu thứ 15 của V-League 2024 đã khép lại với trận cầu kinh điển giữa đội tuyển Hà Nội FC và Hoàng Anh Gia Lai. Cả hai đội nhập cuộc đầy quyết tâm, tạo nên một màn trình diễn hấp dẫn trên sân vận động Mỹ Đình.
Với chiến thuật linh hoạt, Hà Nội FC đã mở tỷ số ở phút thứ 25 nhờ pha lập công đẹp mắt của Nguyễn Văn Quyết. Tuy nhiên, Hoàng Anh Gia Lai không hề dễ dàng bỏ cuộc khi Minh Vương ghi bàn gỡ hòa ở hiệp hai.
Trận đấu kết thúc với tỷ số hòa 1-1, giữ vững vị trí đầu bảng cho Hà Nội FC nhưng cũng khiến Hoàng Anh Gia Lai tiến sát ngôi vị thứ hai. V-League đang trở nên hấp dẫn hơn bao giờ hết khi các đội bóng cạnh tranh quyết liệt cho ngôi vô địch năm nay','./hoadep/haiduong.jpg','2024-10-26',1)





