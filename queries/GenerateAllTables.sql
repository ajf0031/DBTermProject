/*creates all empty tables for term project db */
/*TODO add foreign keys*/
CREATE TABLE book (
	BookID int NOT NULL,
	Title varchar(255),
	UnitPrice decimal(9,2),
	Author varchar(255),
	Quantity int,
	SupplierID int,
	SubjectID int,
	PRIMARY KEY (BookID)
);

CREATE TABLE subject (
    SubjectID int NOT NULL,
    CatagoryName varchar(255),
    PRIMARY KEY (SubjectID)
);

CREATE TABLE customer (
    CustomerID int NOT NULL,
    LastName varchar(255),
    FirstName varchar(255),
    Phone varchar (12),
    PRIMARY KEY (CustomerID)
);

CREATE TABLE employee (
    EmployeeID int NOT NULL,
    LastName varchar(255),
    FirstName varchar(255),
    PRIMARY KEY (EmployeeID)
);

CREATE TABLE orders (
    OrderID int NOT NULL,
    CustomerID int NOT NULL,
    EmployeeID int NOT NULL,
    OrderDate varchar(8),
    ShippedDate varchar(8),
    ShipperID int NOT NULL,
    PRIMARY KEY (OrderID)
);

CREATE TABLE order_details (
    BookID int NOT NULL,
    OrderID int NOT NULL,
    Quantity int NOT NULL
);

CREATE TABLE shipper (
    ShipperID int NOT NULL,
    ShipperName varchar(255),
    PRIMARY KEY (ShipperID)
);

CREATE TABLE supplier (
    SupplierID int NOT NULL,
    CompanyName varchar(255),
    ContactLastName varchar(255),
    ContactFirstName varchar(255),
    Phone varchar(12),
    PRIMARY KEY (SupplierID)
);