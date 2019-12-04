/*creates all empty tables for term project db */
CREATE TABLE db_book (
	BookID int,
	Title varchar(255),
	UnitPrice decimal(9,2),
	Author varchar(255),
	Quantity int,
	SupplierID int REFERENCES db_supplier.SupplierID,
	SubjectID int REFERENCES db_subject.SubjectiD,
	PRIMARY KEY (BookID)
);

CREATE TABLE db_subject (
    SubjectID int,
    CategoryName varchar(255),
    PRIMARY KEY (SubjectID)
);

CREATE TABLE db_customer (
    CustomerID int,
    LastName varchar(255),
    FirstName varchar(255),
    Phone varchar (12),
    PRIMARY KEY (CustomerID)
);

CREATE TABLE db_employee (
    EmployeeID int,
    LastName varchar(255),
    FirstName varchar(255),
    PRIMARY KEY (EmployeeID)
);

CREATE TABLE db_order (
    OrderID int,
    CustomerID int REFERENCES db_customer.CustomerID,
    EmployeeID int REFERENCES db_employee.EmployeeID,
    OrderDate DATE,
    ShippedDate varchar(10),
    ShipperID int REFERENCES db_shipper.ShipperID,
    PRIMARY KEY (OrderID)
);

CREATE TABLE db_order_details (
    BookID int REFERENCES db_book.BookID, 
    OrderID int REFERENCES db_order.OrderID,
    Quantity int NOT NULL,
    PRIMARY KEY (BookID, OrderID)
);

CREATE TABLE db_shipper (
    ShipperID int,
    ShipperName varchar(255),
    PRIMARY KEY (ShipperID)
);

CREATE TABLE db_supplier (
    SupplierID int,
    CompanyName varchar(255),
    ContactLastName varchar(255),
    ContactFirstName varchar(255),
    Phone varchar(12),
    PRIMARY KEY (SupplierID)
);
