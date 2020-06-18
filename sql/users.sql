CREATE TABLE users
(
    id INT PRIMARY KEY NOT NULL,
    user_id VARCHAR(20) NOT NULL,
    password VARCHAR(32) NOT NULL
);

INSERT INTO users VALUES
(
	'1',
	md5('admin'),
	'admin'
);	
