/*query 3*/
SELECT DISTINCT Title
From db_book, db_order, db_order_details as details, db_customer
Where db_customer.LastName = 'lastname1' 
		AND db_customer.FirstName = 'firstname1'
		AND db_customer.CustomerID = db_order.CustomerID
		AND db_order.OrderID = details.OrderID
		AND details.BookID = db_book.BookID;