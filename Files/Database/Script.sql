CREATE DATABASE collegeGame;

USE collegeGame;

CREATE TABLE SystemUser(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    score INT NOT NULL,
    isActive BOOL NOT NULL
);

CREATE TABLE UserLogin(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    loginName varchar(255) not null,
    userPassword varchar(255) not null,
    keyword varchar(255) not null,
    isActive BOOL NOT NULL,
    idSystemUser int not null,
    FOREIGN KEY (idSystemUser) REFERENCES SystemUser(id)
);