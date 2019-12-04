/*query 6*/    
Select FirstName, LastName
From db_customer, 
        (Select Sum(orderPrice) as customerPrice, CustomerID
        From 
                (Select Sum(UnitPrice * details.Quantity) as orderPrice, db_order.OrderID
                From db_book, db_order, db_order_details as details, db_customer
                Where db_customer.CustomerID = db_order.CustomerID
                        AND db_order.OrderID = details.OrderID
                        AND details.BookID = db_book.BookID
                Group by OrderID
                ORDER BY OrderID) as OC
                Inner Join db_order On db_order.OrderID = OC.OrderID
        Group By CustomerID
        Having customerPrice < 80) as Q1
Where Q1.CustomerID = db_customer.CustomerID