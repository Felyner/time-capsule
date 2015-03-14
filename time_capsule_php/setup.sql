

CREATE DATABASE time_capsule;

CREATE TABLE capsule(
	capsule_id INT(10) PRIMARY KEY AUTO_INCREMENT,
	ts_created TIMESTAMP NOT NULL,
	ts_unlock DATE NOT NULL,
	user_id INT(10) NOT NULL,
	capsule_name VARCHAR(255) NOT NULL
);

CREATE TABLE capsule_item(
	item_id INT(10) PRIMARY KEY AUTO_INCREMENT,
	capsule_id INT(10) NOT NULL,
	location VARCHAR(255) NOT NULL,
	item_name VARCHAR(255) NOT NULL
);

CREATE TABLE sessions(
	session_id VARCHAR(40) NOT NULL,
	ip_address VARCHAR(16) NOT NULL,
	user_agent VARCHAR(50) NOT NULL,
	last_activity INT(10) NOT NULL,
	user_data NOT NULL
);

CREATE TABLE users(
	id INT(10) PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(10) NOT NULL,
	password VARCHAR(50) NOT NULL
);