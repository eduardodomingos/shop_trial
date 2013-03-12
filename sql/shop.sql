-- create and select the database
DROP DATABASE IF EXISTS shop;
CREATE DATABASE shop;
USE shop;

-- create the tables for the database
CREATE TABLE users (
  userID        INT            NOT NULL   AUTO_INCREMENT,
  userName         VARCHAR(60)    NOT NULL,
  password          VARCHAR(60)    NOT NULL,
  email      VARCHAR(255)   NOT NULL,
  shippingAddress         VARCHAR(255)    NOT NULL,
  country         VARCHAR(60)    NOT NULL,
  PRIMARY KEY (userID),
  UNIQUE INDEX email (email)
);

CREATE TABLE products (
  productID         INT            NOT NULL   AUTO_INCREMENT,
  categoryID        INT            NOT NULL,
  productCode       VARCHAR(32)    NOT NULL,
  productName       VARCHAR(255)   NOT NULL,
  description       TEXT           NOT NULL,
  listPrice         DECIMAL(10,2)  NOT NULL,
  discountPercent   DECIMAL(10,2)  NOT NULL   DEFAULT 0.00,
  dateAdded         DATETIME       NOT NULL,
  PRIMARY KEY (productID), 
  INDEX categoryID (categoryID), 
  UNIQUE INDEX productCode (productCode)
);

CREATE TABLE categories (
  categoryID        INT            NOT NULL   AUTO_INCREMENT,
  categoryName      VARCHAR(255)   NOT NULL,
  PRIMARY KEY (categoryID)
);

CREATE TABLE orders (
  orderID           INT            NOT NULL   AUTO_INCREMENT,
  userID        INT            NOT NULL,
  orderDate         DATETIME       NOT NULL,
  csvItems LONGTEXT NOT NULL,
  shipAmount        DECIMAL(10,2)  NOT NULL,
  taxAmount         DECIMAL(10,2)  NOT NULL,
  shippingAddress     VARCHAR(255)            NOT NULL,
  PRIMARY KEY (orderID), 
  INDEX userID (userID)
);


-- Insert data into the tables
INSERT INTO users (userName,password,email,shippingAddress,country) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3','epcdomingos@gmail.com','1234 Any Place Street','Portugal');

INSERT INTO categories (categoryID, categoryName) VALUES
(1, 'cookies'),
(2, 'tarts');

INSERT INTO products (categoryID, productCode, productName, description, listPrice, discountPercent, dateAdded) VALUES
(1, 'f423f8b81273ce03a5b8709384389472', 'chocolate', 'smooth and luxuriously textured chocolate in a chocolate crust, topped with a fragrant edible rose petal and gold leaf', '10.00', '0.00', NOW()),
(1, '3b9e1c66431edf36f0bd08de2ded4df0', 'three berries', 'inspired by a classic, madagascar vanilla custard in a vanilla crust, topped with three perfect berries', '20.00', '0.00', NOW()),
(1, '9a1e2a5671162808b5e405ab653442a7', 'créme brulee', 'our take on a french classic, madagascar vanilla cream custard in a vanilla crust, topped with torched sugar and apricot slice', '25.00', '10.00', NOW()),
(2, '8e0fa3340e783729c35c75557868d11e', 'raspberry rolls', 'a soft raspberry cookie covered with sweet and sour raspberry dust', '5.50', '0.00',NOW()),
(2, 'd69e1c0f49c0fd1a05d02d1e7b52f127', 'lavender noir', 'delicate layer of fragrant lavender cream in between extra dark chocolate wafers', '18.00', '5.00', NOW()),
(2, '8d3a53a6fc634927c21995a2f93299d9', 'passion fruit', 'a cookie combination of tart, juicy passion fruit balanced with chocolate', '5.70', '0.00', NOW());

-- Create a user named s_user
GRANT SELECT, INSERT, UPDATE, DELETE
ON *
TO s_user@localhost
IDENTIFIED BY 'pa55word';