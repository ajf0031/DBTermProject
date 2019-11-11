/*query 5*/
Select Sum(UnitPrice * details.Quantity)
From book as books, orders, order_details as details, customer
where customer.LastName = 'lastname1' 
		AND customer.FirstName = 'firstname1'
		AND customer.OrderID = orders.OrderId
		AND details.bookID = books.bookID;
