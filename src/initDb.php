<?php
$code = file_get_contents(__FILE__);			// 1. Get this file as string	
$code = substr($code, __COMPILER_HALT_OFFSET__);	// 2. Filter only the second part of the file
$code_shortcuts = [					// 3. List all the code shortcuts
	"ak"	=> "array_keys",
	"im"	=> "implode",
	"am"	=> "array_map",
	"fn"	=> "function",
	"rt"	=> "return",
];
							// 4. Replace the shortcuts with actual keywords
$code = str_replace(array_keys($code_shortcuts),$code_shortcuts,$code);
$tmp_file = exec("mktemp");				// 5. Create temporary file
file_put_contents($tmp_file, $code);			// 6. Output: write the produced code to the temp file
include $tmp_file;					// 7. Execute: parse the temporary file
system("rm $tmp_file");					// 8. Clean-up: remove the temporary file
die();							// 9. exit
__halt_compiler();

<?php
$cols = [
	'mail_id'	=>'int(11)',
	'date'		=>'datetime',
	'from'		=>'varchar(128)',
	'to'		=>'varchar(128)',
	'subject'	=>'varchar(255)',
	'body'		=>'text',
	'charset'	=>'varchar(32)',
	'mail'		=>'longblob',
	'spam_score'	=>'float',
	'hash'		=>'char(32)',
	'content_type'	=>'varchar(64)',
	'recipient'	=>'varchar(128)',
	'has_attach'	=>'int(11)',
	'ip_addr'	=>'varchar(64)'
	
];
?>
DROP DATABASE IF EXISTS gmail_mail;
CREATE DATABASE gmail_mail;

DROP USER IF EXISTS gmail_mail;
CREATE USER 'gmail_mail' IDENTIFIED BY 'ok';
GRANT ALL ON gmail_mail.* TO gmail_mail;

USE gmail_mail;
CREATE TABLE new_mail(<?=im(", ",am(fn($o,$k){rt "`$o` $k";},ak($cols),$cols));?>);

DELIMITER //
CREATE Procedure Received_Email (<?=im(", ",am(fn($o){rt "IN $o";},ak($cols)))?>)
BEGIN
	INSERT INTO new_mail
	(<?=im(", ",ak($cols))?>
	VALUES
	(<?=im(", ",ak($cols))?>);
END
DELIMITER ;

