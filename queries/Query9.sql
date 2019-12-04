Select Title, ShipperName
From db_order, db_shipper, db_book, db_order_details
Where ShippedDate = "8/4/2016"
        AND db_order.ShipperID = db_shipper.ShipperID
        AND db_order.OrderID = db_order_details.OrderID
        AND db_order_details.BookID = db_book.BookID
