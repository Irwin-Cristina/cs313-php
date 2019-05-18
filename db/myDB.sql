CREATE TABLE user_person (
	user_id SERIAL NOT NULL primary key,
	user_name varchar(80) NOT NULL
	);

INSERT INTO user_person(user_id, user_name) VALUES(DEFAULT, 'Cristina Irwin');
INSERT INTO user_person(user_id, user_name) VALUES(DEFAULT, 'Scott Irwin');
INSERT INTO user_person(user_id, user_name) VALUES(DEFAULT, 'Simon Irwin');
INSERT INTO user_person(user_id, user_name) VALUES(DEFAULT, 'Isabella Irwin');
INSERT INTO user_person(user_id, user_name) VALUES(DEFAULT, 'Isaac Irwin');
	
CREATE TABLE location (
	location_id SERIAL NOT NULL primary key,
	location_name varchar(80) NOT NULL	
	);
INSERT INTO location(location_id, location_name) VALUES(DEFAULT, 'Piano Room');
INSERT INTO location(location_id, location_name) VALUES(DEFAULT, 'Homework Room');
INSERT INTO location(location_id, location_name) VALUES(DEFAULT, 'Family Room');
INSERT INTO location(location_id, location_name) VALUES(DEFAULT, 'Parent''s Room');
INSERT INTO location(location_id, location_name) VALUES(DEFAULT, 'Isabella''s Room');
INSERT INTO location(location_id, location_name) VALUES(DEFAULT, 'Isaac''s Room');
INSERT INTO location(location_id, location_name) VALUES(DEFAULT, 'Simon''s Room');


CREATE TABLE borrower (
	borrower_id SERIAL NOT NULL primary key,
	borrower_name  varchar(80) NOT NULL
	);
INSERT INTO borrower(borrower_id, borrower_name) VALUES(DEFAULT, 'Tia Bunker');
INSERT INTO borrower(borrower_id, borrower_name) VALUES(DEFAULT, 'Jessica Sanders');
INSERT INTO borrower(borrower_id, borrower_name) VALUES(DEFAULT, 'Angie Berrio');
INSERT INTO borrower(borrower_id, borrower_name) VALUES(DEFAULT, 'Karen Berrio');
INSERT INTO borrower(borrower_id, borrower_name) VALUES(DEFAULT, 'Megan Gurney');
INSERT INTO borrower(borrower_id, borrower_name) VALUES(DEFAULT, 'Derrick Manning');
INSERT INTO borrower(borrower_id, borrower_name) VALUES(DEFAULT, 'Jessica Berrio');
	
--lookup-table--
CREATE TABLE genre (
	genre_id SERIAL NOT NULL primary key,
	genre_name varchar NOT NULL
 );
	
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'History');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Biography');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Fiction');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Non-Fiction');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Romance');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Mystery');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Fantasy');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Historical Fiction');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Self-Help');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Children');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Dystopia');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Poetry');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Informational');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Young Adult');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Spiritual');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Music');




CREATE TABLE author (
	author_id SERIAL NOT NULL primary key,
	author_name  varchar(80) NOT NULL
	);
INSERT INTO author(author_id, author_name) VALUES(DEFAULT, 'JK Rowling');
INSERT INTO author(author_id, author_name) VALUES(DEFAULT, 'Shell Silverstein');
INSERT INTO author(author_id, author_name) VALUES(DEFAULT, 'Mormon');
INSERT INTO author(author_id, author_name) VALUES(DEFAULT, 'Julie Lythcott-Haims');
INSERT INTO author(author_id, author_name) VALUES(DEFAULT, 'Daniel J. Siegel');
INSERT INTO author(author_id, author_name) VALUES(DEFAULT, 'Lisa McMann');
INSERT INTO author(author_id, author_name) VALUES(DEFAULT, 'Rachel Hunt Steenblik');
INSERT INTO author(author_id, author_name) VALUES(DEFAULT, 'Jon Duckett');
INSERT INTO author(author_id, author_name) VALUES(DEFAULT, 'John Williams');
INSERT INTO author(author_id, author_name) VALUES(DEFAULT, 'Richard Paul Evans');
INSERT INTO author(author_id, author_name) VALUES(DEFAULT, 'Terryl L. Givens');
INSERT INTO author(author_id, author_name) VALUES(DEFAULT, 'Linda King Newell');
INSERT INTO author(author_id, author_name) VALUES(DEFAULT, 'Marcus J Borg');
INSERT INTO author(author_id, author_name) VALUES(DEFAULT, 'Peter Enns');


CREATE TABLE status (
	status_id SERIAL NOT NULL primary key,
	status varchar(80) NOT NULL
	);

INSERT INTO status(status_id, status) VALUES(DEFAULT, 'Checked in');
INSERT INTO status(status_id, status) VALUES(DEFAULT, 'Checked out');
INSERT INTO status(status_id, status) VALUES(DEFAULT, 'Missing');

--
--CREATE TABLE cover_art (
--	cover_id SERIAL NOT NULL primary key,
--	cover_path  varchar(80) NOT NULL
--	);

CREATE TABLE genre (
	genre_id SERIAL NOT NULL primary key,
	genre_name varchar NOT NULL
 );
	
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'History');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Biography');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Fiction');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Non-Fiction');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Romance');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Mystery');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Fantasy');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Historical Fiction');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Self-Help');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Children');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Dystopia');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Poetry');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Informational');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Young Adult');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Spiritual');
INSERT INTO genre(genre_id, genre_name) VALUES(DEFAULT, 'Music');


CREATE TABLE book (
	book_id SERIAL NOT NULL primary key,
	book_title varchar NOT NULL,
	book_page_count int NOT NULL,
	book_summary text NOT NULL,
	author_id varchar NOT NULL,
	--cover_id int NOT NULL references cover_art(cover_id),
	location_id int NOT NULL references location(location_id),
	user_id int NOT NULL references user_person(user_id),
	--genre_id int NOT NULL references genre(genre_id),
	borrower_id int references borrower(borrower_id),
	status_id int NOT NULL references status(status_id)
	);
	
INSERT INTO book(book_id, book_title, book_page_count, book_summary, author_id, location_id, user_id, borrower_id, status_id) 
VALUES(DEFAULT, 'The Sin of Certainty', 240, 'Summary placeholder',14, 1, 1, NULL, 1);

INSERT INTO book(book_id, book_title, book_page_count, book_summary, author_id, location_id, user_id, borrower_id, status_id) 
VALUES(DEFAULT, 'Mormon Enigma: Emma Hale Smith', 423, 'Summary placeholder',12 ,4, 1,7, 2);	
	
	
CREATE TABLE book_genres (
	book_id int NOT NULL references book(book_id),
	genre_id int NOT NUll references genre(genre_id)
	--PRIMARY KEY (genre_id, book_id)
	);
	
INSERT INTO book_genres(book_id, genre_id) VALUES (1,4);
INSERT INTO book_genres(book_id, genre_id) VALUES (1,15);
INSERT INTO book_genres(book_id, genre_id) VALUES (2,2);
INSERT INTO book_genres(book_id, genre_id) VALUES (2,3);

	





\pset format wrapped


	