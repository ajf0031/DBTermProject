SELECT SUM(UnitPrice * OD.Quantity), FirstName, LastName
FROM db_book AS B, db_order AS O, db_order_details AS OD, db_customer AS C
WHERE B.BookID = OD.BookID AND OD.OrderID = O.OrderID AND C.CustomerID = O.CustomerID
GROUP BY O.CustomerID
ORDER BY SUM(UnitPrice * OD.Quantity) DESC;
