DROP DATABASE IF EXISTS MCVShop;
CREATE DATABASE MCVShop;

USE MCVShop;

CREATE TABLE AdminUser (
    AdminUserID INT PRIMARY KEY,
    Username VARCHAR(50) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    Email VARCHAR(100) NOT NULL
);

CREATE TABLE `User` (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(50) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    StreetAddress VARCHAR(255) NOT NULL,
    City VARCHAR(50) NOT NULL,
    PostalCode VARCHAR(20) NOT NULL,
    Phone VARCHAR(15) NOT NULL
);

CREATE TABLE Product (
    ProductID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
    Description TEXT,
    Price DECIMAL(10, 2) NOT NULL,
    StockQuantity INT NOT NULL,
    ImagePath VARCHAR(255) NOT NULL,
    IsRecommended BOOLEAN NOT NULL DEFAULT FALSE
);

CREATE TABLE Cart (
    CartID INT PRIMARY KEY,
    UserID INT,
    FOREIGN KEY (UserID) REFERENCES `User`(UserID)
);

CREATE TABLE CartItem (
    CartItemID INT PRIMARY KEY,
    CartID INT,
    ProductID INT,
    Quantity INT NOT NULL,
    TotalPrice DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (CartID) REFERENCES Cart(CartID),
    FOREIGN KEY (ProductID) REFERENCES Product(ProductID)
);

CREATE TABLE News (
    NewsID INT PRIMARY KEY,
    Title VARCHAR(255) NOT NULL,
    Content TEXT NOT NULL,
    DatePosted DATE NOT NULL,
    IsLatest BOOLEAN NOT NULL DEFAULT FALSE
);

-- Insert the hashed password into the AdminUser table
INSERT INTO AdminUser (AdminUserID, Username, Password, FirstName, LastName, Email)
VALUES (
    1,
    'admin',
    '$2y$10$l7l7HTgkbzmPECse610DvODIjtFEsN17Eeoit0LeXGArcZuV7iN96',
    'Admin',
    'Test',
    'admin@test.com'
);

-- Update image paths for each product
UPDATE Product SET ImagePath = '/Mcvshop/img/prod1.png' WHERE ProductID = 1;
UPDATE Product SET ImagePath = '/Mcvshop/img/prod2.png' WHERE ProductID = 2;
UPDATE Product SET ImagePath = '/Mcvshop/img/prod3.png' WHERE ProductID = 3;

-- Insert recommended products
INSERT INTO Product (Name, Description, Price, StockQuantity, ImagePath, IsRecommended)
VALUES ('Product Name 1', 'High-quality red mobile cover', 250.00, 10, '/Mcvshop/img/prod1.png', TRUE);

INSERT INTO Product (Name, Description, Price, StockQuantity, ImagePath, IsRecommended)
VALUES ('Product Name 2', 'Stylish green mobile cover', 250.00, 15, '/Mcvshop/img/prod2.png', TRUE);

INSERT INTO Product (Name, Description, Price, StockQuantity, ImagePath, IsRecommended)
VALUES ('Product Name 3', 'Vibrant orange mobile cover', 250.00, 20, '/Mcvshop/img/prod3.png', TRUE);

-- Insert regular products
INSERT INTO Product (Name, Description, Price, StockQuantity, ImagePath, IsRecommended)
VALUES ('Product Name 1', 'Durable blue mobile cover', 300.00, 20, '/Mcvshop/img/prod1.png', FALSE);

INSERT INTO Product (Name, Description, Price, StockQuantity, ImagePath, IsRecommended)
VALUES ('Product Name 2', 'Elegant purple mobile cover', 280.00, 18, '/Mcvshop/img/prod2.png', FALSE);

INSERT INTO Product (Name, Description, Price, StockQuantity, ImagePath, IsRecommended)
VALUES ('Product Name 3', 'Classic black mobile cover', 270.00, 25, '/Mcvshop/img/prod3.png', FALSE);
INSERT INTO Product (Name, Description, Price, StockQuantity, ImagePath, IsRecommended)
VALUES ('Product Name 4', 'Durable blue mobile cover', 300.00, 20, '/Mcvshop/img/prod4.png', FALSE);

INSERT INTO Product (Name, Description, Price, StockQuantity, ImagePath, IsRecommended)
VALUES ('Product Name 5', 'Elegant purple mobile cover', 280.00, 18, '/Mcvshop/img/prod5.png', FALSE);

INSERT INTO Product (Name, Description, Price, StockQuantity, ImagePath, IsRecommended)
VALUES ('Product Name 6', 'Classic black mobile cover', 270.00, 25, '/Mcvshop/img/prod1.png', FALSE);

-- Insert sample news data
INSERT INTO News (NewsID, Title, Content, DatePosted, IsLatest)
VALUES (1, 'Guardians of Style: Choosing the Perfect Mobile Cover for Fashion and Function', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu libero egestas, dictum risus ac, consectetur risus...', '2023-12-01', TRUE);

INSERT INTO News (NewsID, Title, Content, DatePosted, IsLatest)
VALUES (2, 'Beyond Protection: Exploring Innovative Features in Modern Mobile Covers', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu libero egestas, dictum risus ac, consectetur risus...', '2023-12-05', TRUE);

INSERT INTO News (NewsID, Title, Content, DatePosted, IsLatest)
VALUES (3, 'DIY Trends: Personalizing Your Phone with Creative Mobile Cover Designs', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu libero egestas, dictum risus ac, consectetur risus...', '2023-12-10', TRUE);

INSERT INTO News (NewsID, Title, Content, DatePosted, IsLatest)
VALUES (4, 'Guardians of Style: Choosing the Perfect Mobile Cover for Fashion and Function', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu libero egestas, dictum risus ac, consectetur risus...', '2023-12-01', FALSE);

INSERT INTO News (NewsID, Title, Content, DatePosted, IsLatest)
VALUES (5, 'Beyond Protection: Exploring Innovative Features in Modern Mobile Covers', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu libero egestas, dictum risus ac, consectetur risus...', '2023-12-05', FALSE);

INSERT INTO News (NewsID, Title, Content, DatePosted, IsLatest)
VALUES (6, 'DIY Trends: Personalizing Your Phone with Creative Mobile Cover Designs', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu libero egestas, dictum risus ac, consectetur risus...', '2023-12-10', FALSE);

--Fix the error when you upload your database to the mysql real host.
ALTER TABLE `AdminUser` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE `User` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE `Product` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE `Cart` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE `CartItem` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE `News` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

