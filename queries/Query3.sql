/*query 3*/		
SELECT Title
From book as books, orders, order_details as details, customer
Where customer.LastName = 'lastname1' 
		AND customer.FirstName = 'firstname1'
		AND customer.CustomerID = orders.CustomerID
		AND orders.OrderID = details.OrderID
		AND details.bookID = books.bookID;