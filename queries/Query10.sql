SELECT DISTINCT C1.Title 
From book as books, orders, order_details as details, customer,
        (SELECT DISTINCT Title
         From book as books, orders, order_details as details, customer
         Where customer.LastName = 'lastname1' 
                AND customer.FirstName = 'firstname1'
                AND customer.CustomerID = orders.CustomerID
                AND orders.OrderID = details.OrderID
                AND details.bookID = books.bookID) as C1,
        (SELECT DISTINCT Title
         From book as books, orders, order_details as details, customer
         Where customer.LastName = 'lastname4' 
                AND customer.FirstName = 'firstname4'
                AND customer.CustomerID = orders.CustomerID
                AND orders.OrderID = details.OrderID
                AND details.bookID = books.bookID) as C2
Where C1.Title = C2.Title;