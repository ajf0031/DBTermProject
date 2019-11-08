/*These are the queries that we are required to test
Each one will need to be copied into its own call*/

/*query 1*/
SELECT Category
FROM db_book, db_subject
WHERE SupplierID = 2 AND db_book.SubjectID = db_subject.SubjectID;

/*query 2*/
SELECT Title, Price
FROM db_book
WHERE (SELECT MAX(Price)
		FROM db_book
		WHERE supplierID = 3) = Price;
		
/*query 3*/		
SELECT Title
From db_book as books, db_order as orders, db_order_detail as details, db_customer as customer
Where customers.LastName = 'lastname1' 
		AND customersFirstName = 'firstnamme1'
		AND customers.OrderID = orders.OrderId
		AND details.bookID = books.bookID;

/*query 4*/												  
Select Title 
From db_book
Where Quantity > 10;

/*query 5*/
Select Sum(UnitPrice * details.Quantity)
From db_book as books, db_order as orders, db_order_detail as details, db_customer as customer
where customers.LastName = 'lastname1' 
		AND customersFirstName = 'firstnamme1'
		AND customers.OrderID = orders.OrderId
		AND details.bookID = books.bookID;


 