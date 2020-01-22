/****************************************************************************************/
/*  Date	           Name	                Description                                 */
/*  ---------------------------------------------------------------                     */
/*                                                                                      */
/*  1/16/2020  Derek Dombek   Initial deployed. Script for bobs fishing contact form.   */
/****************************************************************************************/

DROP DATABASE IF EXISTS bobscontact;
CREATE DATABASE bobscontact;
USE bobscontact;

CREATE TABLE IF NOT EXISTS employee
(
	employeeID int not null auto_increment primary key,
	firstName varchar(255) not null,
	lastName varchar(255) not null
);


CREATE TABLE IF NOT EXISTS customer
(
	customerID int not null auto_increment primary key,
	customerName varchar(255) not null,
	customerEmail varchar(255) not null,
	customerDropDown tinyint not null,
	customerMsg varchar(500) not null,
	employeeID int not null references employee(employeeID)
);

INSERT into employee
	(firstName, lastName)
VALUES
	('Meredith', 'Murdoch'),
	('Ian', 'Bar'),
	('Mike', 'Irish'),
	('Sam', 'Intihar'),
	('Erik', 'Diehle'),
	('Darren', 'Caskey'),
	('Derek', 'Dombek'),
	('bob', 'McGhee'),
	('Pamela', 'Dombek'),
	('Fred', 'Dombek'),
	('Bob', 'Miller'),
	('Sue', 'Miller'),
	('Pat', 'White'),
	('Joe', 'White'),
	('Bill', 'Murdoch'),
	('Mary ann', 'Murdoch'),
	('Jessie','Peters'),
	('Jose', 'Brod'),
	('Pet', 'parter'),
	('DJ', 'Fetzer'),
	('Sue', 'Hovan');
	
	
insert into customer
	(customerName, customerEmail, customerDropDown, customerMsg, employeeID)
VALUES
	('Mickey', 'mickey@mouse.com', 1, 'Hello', 1),
	('John', 'John@yahoo.com', 2, 'yo', 1),
	('joe', 'John@yahoo.com', 3, 'hi', 1),
	('pete', 'pete@yahoo.com', 3, 'yello', 1),
	('willie', 'willie@yahoo.com', 1, 'sup', 1),
	('paulie', 'paulie@yahoo.com', 2, 'bruh!', 1),
	('chris', 'chris@yahoo.com', 1, 'hi', 1),
	('chop', 'chop@yahoo.com', 3, 'yooo', 1),
	('allison', 'allison@yahoo.com', 3, 'holla', 1),
	('sam', 'sam@yahoo.com', 1, 'ballin', 1),
	('lulu', 'lulu@yahoo.com', 1, 'yo mama', 1),
	('matt', 'matt@yahoo.com', 2, 'lets kick it', 1),
	('mike', 'mike@yahoo.com', 1, 'like butta', 1),
	('derrick', 'derrick@yahoo.com', 3, 'killin it', 1),
	('mona', 'mona@yahoo.com', 1, 'hollaaa', 1),
	('payton', 'payton@yahoo.com', 2, 'feelin it', 1),
	('loyd', 'loyd@yahoo.com', 2, 'bad boy', 1),
	('henry', 'henry@yahoo.com', 1, 'sup bro!', 1),
	('trevor', 'trevor@yahoo.com', 3, 'peace', 1),
	('tonia', 'tonia@yahoo.com', 2, 'yo gurl', 1),
	('tammy', 'tammy@yahoo.com', 3, 'people be playin', 1);
