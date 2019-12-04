Select db_book.Title, Sum(db_order_details.quantity)
From db_book, db_order_details
Where db_order_details.BookID = db_book.BookID
Group By db_order_details.BookID