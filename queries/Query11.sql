Select Title 
From db_book, db_employee, db_order, db_order_details
Where db_employee.LastName = 'lastname6'
    And db_employee.FirstName = 'firstname6'
    And db_employee.EmployeeID = db_order.EmployeeID
    And db_order_details.OrderID = db_order.OrderID
    And db_order_details.BookID = db_book.BookID