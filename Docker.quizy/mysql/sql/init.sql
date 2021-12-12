DROP DATABASE IF EXISTS quizy;
CREATE DATABASE quizy;
USE quizy;
DROP TABLE IF EXISTS big_questions;
 
CREATE TABLE big_questions (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
name TEXT NOT NULL
)DEFAULT CHARACTER SET=utf8;
 
INSERT INTO big_questions (name) VALUES ("東京の難読地名クイズ"),("広島の難読地名クイズ");
