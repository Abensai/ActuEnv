CREATE DATABASE yearbook;
USE yearbook;

CREATE TABLE fiches (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        civility ENUM('M', 'Mme', 'Mlle') NOT NULL,
                        name VARCHAR(50) NOT NULL,
                        firstname VARCHAR(50) NOT NULL,
                        address VARCHAR(100),
                        postal_code VARCHAR(10),
                        city VARCHAR(50),
                        country VARCHAR(50),
                        date_of_birth DATE,
                        phone VARCHAR(20),
                        fax VARCHAR(20),
                        email VARCHAR(100),
                        url VARCHAR(100)
);
