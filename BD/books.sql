CREATE TABLE books (
    id INT(11) NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    file VARCHAR(255) NOT NULL,
    date_published DATE NOT NULL,
    status VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);