-- ? MEMBUAT SEMUA TABLE

-- ! Buat Table magazines

CREATE TABLE authors (
    id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    image varchar(100)
)

--@block

-- ! Buat Table mangas

CREATE TABLE mangas (
    id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title varchar(100) NOT NULL,
    image VARCHAR(100),
    chapters int,
    volumes int,
    score float(4),
    magazine varchar(50),
    synopsis text,
    author_id int,
    FOREIGN KEY (author_id) REFERENCES authors(id)
)



--@block

-- ! Buat Table Users

CREATE TABLE users (
    id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    username varchar(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    image VARCHAR(100)
)

--@block

-- ! Buat Table Fav

CREATE TABLE fav_mangas (
    id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    user_id int,
    mangas_id int,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (mangas_id) REFERENCES mangas(id)
)

--@block

-- ! Buat Table Anime

CREATE TABLE animes (
    id int PRIMARY key not null AUTO_INCREMENT,
    title varchar(100) NOT NULL,
    image VARCHAR(150),
    synopsis text,
    episodes int,
    score float(4),
    season varchar(10),
    year int,
    studio varchar(50)
)

--@block

-- ! Buat Table Fav. Anime

CREATE TABLE fav_animes (
    id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    user_id int,
    anime_id int, 
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (anime_id) REFERENCES animes(id)
)

--@block

-- ! Buat Table Genre 

CREATE TABLE genres(
    id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(50),
    anime_id int, 
    manga_id int,
    FOREIGN KEY (anime_id) REFERENCES animes(id),
    FOREIGN KEY (manga_id) REFERENCES mangas(id)
)


-- * ================================================================

--  ? Tambahakan Value

--@block

-- ! Tambahkan Unknown Author

INSERT INTO authors (name, image)
VALUES ("Unknown", "")