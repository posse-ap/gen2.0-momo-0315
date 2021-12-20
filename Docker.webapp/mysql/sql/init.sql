DROP DATABASE IF EXISTS webapp;
CREATE DATABASE webapp;
USE webapp;

DROP TABLE IF EXISTS learning_record;
CREATE TABLE learning_ecord (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  learning_date DATETIME NOT NULL,
  learning_time INT NOT NULL
);

INSERT INTO learning_record (learning_date, learning_time) VALUES
('2021-07-05', 12),
('2021-08-24', 2),
('2021-09-30', 7),
('2020-10-27', 5);

DROP TABLE IF EXISTS languages;
CREATE TABLE languages (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
language VARCHAR(225) NOT NULL,
color VARCHAR(225) NOT NULL
)DEFAULT CHARACTER SET=utf8;
 
INSERT INTO languages (language, color) VALUES 
("JavaScript","#1855EF"),
("CSS","#1170BC"),
("PHP","#20BDDE"),
("HTML","#3CCEFE"),
("Laravel","#B39EF3"),
("SQL","#6C47EB"),
("SHELL","#6C47EB"),
("情報システム基礎知識（その他）","#3004C0");
 

DROP TABLE IF EXISTS contents;
CREATE TABLE contents (
id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
content VARCHAR(225) NOT NULL,
color VARCHAR(225) NOT NULL
);

INSERT INTO contents (content, color) VALUES 
("ドットインストール","#1855EF"),
("N予備","#1170BC"),
("POSSE課題","#20BDDE");

DROP TABLE IF EXISTS records;
CREATE TABLE records (
id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
user_id INT NOT NULL,
language_id INT NOT NULL,
learning_date NOT NULL,
learning_time INT NOT NULL
);
INSERT INTO records (user_id, content_id, learning_date, learning_time) VALUES
(1, 1, '2021-09-17', 4),
(1, 2, '2021-03-24', 8),
(1, 3, '2021-09-08', 9),
(1, 1, '2021-09-30', 3),
(1, 2, '2021-07-08', 5),
(1, 3, '2020-10-08', 4);