/*query 1
-- Works*/
SELECT CategoryName
FROM book, subject
WHERE SupplierID = 2 AND book.SubjectID = subject.SubjectID;