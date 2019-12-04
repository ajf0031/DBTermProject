SELECT DISTINCT C1.Title 
From db_book, db_order, db_order_details as details, db_customer,
        (SELECT DISTINCT Title
         From db_book, db_order, db_order_details as details, db_customer
         Where db_customer.LastName = 'lastname1' 
                AND db_customer.FirstName = 'firstname1'
                AND db_customer.CustomerID = db_order.CustomerID
                AND db_order.OrderID = details.OrderID
                AND details.BookID = db_book.BookID) as C1,
        (SELECT DISTINCT Title
         From db_book, db_order, db_order_details as details, db_customer
         Where db_customer.LastName = 'lastname4' 
                AND db_customer.FirstName = 'firstname4'
                AND db_customer.CustomerID = db_order.CustomerID
                AND db_order.OrderID = details.OrderID
                AND details.BookID = db_book.BookID) as C2
Where C1.Title = C2.Title;