-- author : Moch Deden (https://github.com/selesdepselesnul)
CREATE DATABASE cai;
USE cai;

CREATE TABLE Admin (
    username VARCHAR(20) PRIMARY KEY,
    password TEXT
);

CREATE TABLE Item (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    label TEXT,    
    price BIGINT,    
    quantity BIGINT, 
    discount DECIMAL(5,2),    
    type TEXT, 
    createdAt DATETIME DEFAULT NOW(), 
    updatedAt DATETIME DEFAULT NOW() 
);

CREATE TABLE ItemTransaction (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    transactionTime DATETIME DEFAULT NOW(),
    itemId BIGINT NOT NULL, 
    price BIGINT,
    FOREIGN KEY (itemId) REFERENCES Item (id) 
);

