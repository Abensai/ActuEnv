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

INSERT INTO fiches (civility, name, firstname, address, postal_code, city, country, date_of_birth, phone, fax, email, url)
VALUES
    ('M', 'Dupont', 'Jean', '123 Rue de la Paix', '75001', 'Paris', 'France', '1990-01-15', '01 23 45 67 89', '01 23 45 67 88', 'jean.dupont@email.com',
     'https://www.example.com'),
    ('Mme', 'Martin', 'Marie', '456 Avenue du Soleil', '69002', 'Lyon', 'France', '1988-05-20', '01 23 45 67 89', '01 23 45 67 88', 'marie.martin@email.com',
     'https://www.example2.com'),
    ('Mlle', 'Doe', 'Jane', '789 Avenue de la Lune', '59000', 'Lille', 'France', '1991-09-12', '01 23 45 67 89', '01 23 45 67 88', 'jane.doe@email.com',
     'https://www.example3.com');
