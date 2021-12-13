DROP DATABASE IF EXISTS quizy;
CREATE DATABASE quizy;
USE quizy;
DROP TABLE IF EXISTS big_questions;
 
CREATE TABLE big_questions (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
name TEXT NOT NULL
)DEFAULT CHARACTER SET=utf8;
 
INSERT INTO big_questions (name) VALUES ("東京の難読地名クイズ"),("広島の難読地名クイズ");


DROP TABLE IF EXISTS questions;
 
CREATE TABLE questions (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
big_quistion_id INT NOT NULL,
image TEXT NOT NULL
)DEFAULT CHARACTER SET=utf8;
 
INSERT INTO questions (big_quistion_id,image) VALUES 
(1,"takanawa.png"),(1,'kameido.png'),(2,'mukainada.png');


DROP TABLE IF EXISTS choices;
 
CREATE TABLE choices (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
quistion_id INT NOT NULL,
name TEXT NOT NULL,
valid INT NOT NULL
)DEFAULT CHARACTER SET=utf8;
 
INSERT INTO choices (quistion_id,name,valid) VALUES 
(1,"たかなわ",1),
(1,"こうわ",0),
(1,"たかわ",0),
(2,"かめと",0),
(2,"かめど",0),
(2,"かめイド",1),
(3,"むこうひら",0),
(3,"むきひら",0),
(3,"むかいなだ",1);

