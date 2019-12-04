/*query 1
-- Works*/
SELECT CategoryName
FROM db_book, db_subject
WHERE SupplierID = 2 AND db_book.SubjectID = db_subject.SubjectID;