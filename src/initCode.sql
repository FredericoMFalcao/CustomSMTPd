
CREATE TABLE new_mail(<?=im(", ",ak($cols));?>);

DELIMITER //
CREATE Procedure Received_Email (<?=im(", ",am(fn($o){rt "IN $o";},ak($cols)))?>)
BEGIN
	INSERT INTO new_mail
	(<?=im(", ",ak($cols))?>
	VALUES
	(<?=im(", ",ak($cols))?>);
END
DELIMITER ;
