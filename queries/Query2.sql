/*query 2
Works*/
SELECT Title, UnitPrice
FROM book
WHERE (SELECT MAX(UnitPrice)
		FROM book
		WHERE supplierID = 3) = UnitPrice;
