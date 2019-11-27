Select Title, ShipperName
From orders, shipper, book, order_details
Where ShippedDate = "8/4/2016"
        AND orders.ShipperID = shipper.ShipperID
        AND orders.OrderID = order_details.OrderID
        AND order_details.BookID = book.BookID
