--
-- Building Web Applications using MySQL and PHP (W1)
-- HOE: Application design
--
-- *******************************************************************
-- WARNING: this script will destroy existing tables of the same name!
-- *******************************************************************
--

--
-- Create the Book table
--
DROP TABLE IF EXISTS book;
CREATE TABLE book
(
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(250),
	isbn CHAR(14),
	published DATE,
	price DECIMAL(6,2) 
);

--
-- Create the Author table
--
DROP TABLE IF EXISTS author;
CREATE TABLE author
(
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
	firstname VARCHAR(100),
	lastname VARCHAR(100)
);

--
-- Create the Book - Author linking table
--
DROP TABLE IF EXISTS book_author;
CREATE TABLE book_author
(
	book_id INT(11),
	author_id INT(11),
	PRIMARY KEY(book_id, author_id)
);


-- Add authors
INSERT INTO author 
	(id,firstname,lastname)
VALUES 
	(1,'Lorrie','Cranor'),
	(2,'Jakob','Nielsen'),
	(3,'Hoa','Loranger'),
	(4,'Simson','Garfinkel');

-- Add books
INSERT INTO book 
	(id,title,isbn,published,price)
VALUES
	(1,'Web Privacy with P3P','978-0596003715',20021004,19.99),
	(2,'Prioritizing Web Usability','978-0321350312',20060504,24.99),
	(3,'Security and Usability','978-0596008277',20050902,14.50);
	
-- Link the books and authors
INSERT INTO book_author
	(book_id, author_id)
VALUES
	(1,1),
	(2,2),
	(2,3),
	(3,1),
	(3,4);
