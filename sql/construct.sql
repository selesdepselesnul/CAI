CREATE DATABASE cai;
USE cai;

CREATE TABLE admins (
    username VARCHAR(20) PRIMARY KEY,
    password TEXT
);

CREATE TABLE items (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    label TEXT,    
    price BIGINT,    
    quantity BIGINT, 
    discount DECIMAL(5,2),    
    type TEXT, 
    created_at DATETIME DEFAULT NOW(), 
    updated_at DATETIME DEFAULT NOW() 
);

CREATE TABLE items_transactions (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    transaction_time DATETIME DEFAULT NOW(),
    item_id BIGINT NOT NULL, 
    price BIGINT,
    FOREIGN KEY (item_id) REFERENCES items (id) 
);

