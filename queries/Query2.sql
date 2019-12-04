/*query 2
Works*/
SELECT Title, UnitPrice
FROM db_book
WHERE (SELECT MAX(UnitPrice)
		FROM db_book
		WHERE supplierID = 3) = UnitPrice;
