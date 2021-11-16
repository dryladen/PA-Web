-- Buat Table Author
CREATE TABLE authors (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(50) NOT NULL
);

--@block
-- Buat table magazines
CREATE TABLE magazines (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(50) NOT NULL
);

--@block
-- Alter Table
ALTER TABLE magazines
ADD UNIQUE(nama)

--@block
-- Buat table mangas
CREATE TABLE mangas (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(50) NOT NULL,
    chapter int NOT NULL,
    author_id int,
    magazine_id int,
    FOREIGN KEY (author_id) REFERENCES authors(id),
    FOREIGN KEY (magazine_id) REFERENCES magazines(id)
    
);

--@block
-- Insert Magazine
INSERT INTO magazines (nama) VALUES
("good! Afternoon"),
("Weekly Shounen Jump"),
("Jump Plus"),
("Mobile Man"),
("Weekly Shonen Magazine");


--@block
-- Insert Authors
INSERT INTO authors (nama) 
VALUES("Eiichiro Oda"),
("Gege Akutami"),
("Negi Haruba"),
("Kimitake Yoshioka"),
("Wakou Honna");



--@block
SELECT * FROM authors;

--@block
-- Query Magazines
Select * from magazines;

--@block
-- Query Manga
SELECT * FROM mangas;

--@block
-- Query manga
SELECT mangas.id, mangas.nama as name, mangas.chapter, mangas.url_gambar, authors.nama as author, magazines.nama as magazine
from mangas 
inner join authors on mangas.author_id=authors.id 
inner join magazines on mangas.magazine_id=magazines.id where mangas.id=1


-- POSTTEST 6

--@block
-- Create User
CREATE TABLE users (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL
);

--@block
-- Create Fav User
CREATE TABLE fav_mangas (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id int,
    manga_id int,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (manga_id) REFERENCES mangas(id)
);

--@block
-- Get Favorite Manga
SELECT users.id as user_id, users.nama as user_name, mangas.id, mangas.nama as favorite_manga, mangas.chapter, 
mangas.url_gambar
from fav_mangas
inner join users on fav_mangas.user_id = user_id
inner join mangas on fav_mangas.manga_id = manga_id
-- inner join authors on mangas.author_id = authors.id
-- inner join magazines on mangas.magazine_id = magazines.id 