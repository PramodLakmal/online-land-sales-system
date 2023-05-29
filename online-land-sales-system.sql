-- create tables and add user data
CREATE TABLE admin(
	adminID INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	a_fname varchar(30) NOT NULL,
	a_lname varchar(30) NOT NULL,
	a_username varchar(30) NOT NULL,
	a_imgLoc varchar(300),
	role varchar(10) NOT NULL,
	a_password varchar(256) NOT NULL,
	a_email varchar(25) NOT NULL
);

INSERT INTO Admin
	(a_fname, a_lname, a_username, a_imgLoc, role, a_password, a_email)
VALUES
	('Pramod', 'Lakmal', 'admin', 'adminImage1.jpg', 'admin', SHA2('admin', 256), 'pramod@gmail.com');

CREATE TABLE buyer(
    buyerID INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	b_fname varchar(30) NOT NULL,
	b_lname varchar(30) NOT NULL,
   	b_dob date,
	b_username varchar(30) NOT NULL,
	b_imgLoc varchar(300),
	role varchar(10) NOT NULL,
    b_password varchar(256) NOT NULL,
	b_email varchar(30) NOT NULL,
);

CREATE TABLE seller(
    sellerID INT AUTO_INCREMENT PRIMARY KEY NOT NULL,   
	s_username varchar(30) NOT NULL,
	s_imgLoc varchar(300),
	s_fname varchar(30) NOT NULL,
	s_lname varchar(30) NOT NULL,
	role varchar(10) NOT NULL,
	s_password varchar(256) NOT NULL,
	s_mobile INT,
	s_address varchar(30),
	s_email varchar(30) NOT NULL	  
);