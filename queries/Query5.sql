/*query 5*/
/*done*/
Select Sum(UnitPrice * details.Quantity)
From db_book, db_order, db_order_details as details, db_customer
where db_customer.LastName = 'lastname1' 
		AND db_customer.FirstName = 'firstname1'
		AND db_customer.CustomerID = db_order.CustomerID
		AND details.OrderID = db_order.OrderID
		AND details.BookID = db_book.bookID;
