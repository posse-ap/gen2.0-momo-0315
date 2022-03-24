SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- webbappのデータベースに接続
DROP DATABASE IF EXISTS webapp;
CREATE DATABASE webapp;
USE webapp;

-- 学習コンテンツそのものを定義するtable
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

-- 学習コンテンツのデータtable
DROP TABLE IF EXISTS content_records;
CREATE TABLE content_records (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  `learning_date` DATETIME NOT NULL,
  `learning_time` INT NOT NULL,
  `contents_id` INT NOT NULL
);

INSERT INTO content_records (learning_date, learning_time, contents_id) VALUES
('2021-12-22', 2,1),
('2021-12-22', 2,1),
('2021-12-22', 2,1),
('2021-12-28', 7,2),
('2021-12-29', 5,3),
('2021-12-30', 5,3),
('2022-1-3', 5,2),
('2022-1-4', 7,1),
('2022-1-5', 5,3),
('2022-1-5', 5,3),
('2022-1-5', 5,3),
('2022-1-6', 5,3),
('2022-1-6', 6,3),
('2022-1-6', 1,3),
('2022-1-6', 1,3);

-- 学習言語そのものを定義するtable
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

-- 学習言語のデータtable
DROP TABLE IF EXISTS language_records;
CREATE TABLE language_records (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  `learning_date` DATETIME NOT NULL,
  `learning_time` INT NOT NULL,
  `language_id` INT NOT NULL
);

INSERT INTO language_records (learning_date, learning_time, language_id) VALUES
('2021-12-22', 2,1),
('2021-12-22', 2,1),
('2021-12-22', 1,2),
('2021-12-22', 2,3),
('2021-12-28', 7,4),
('2021-12-29', 5,8),
('2021-12-30', 5,7),
('2022-1-3', 5,7),
('2022-1-4', 7,6),
('2022-1-5', 5,7),
('2022-1-5', 5,7),
('2022-1-5', 5,7),
('2022-1-6', 5,7),
('2022-1-6', 6,7),
('2022-1-6', 1,7),
('2022-1-6', 1,7),
('2022-1-6', 1,5);