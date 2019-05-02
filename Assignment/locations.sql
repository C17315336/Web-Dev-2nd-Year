CREATE TABLE locations (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(255) NOT NULL,
    price INT(10) NOT NULL,
    beds INT(5) NOT NULL,
    baths INT(5) NOT NULL,
    description VARCHAR(255) NOT NULL,
    wifi VARCHAR(1) NOT NULL,
    available VARCHAR(1) NOT NULL
);