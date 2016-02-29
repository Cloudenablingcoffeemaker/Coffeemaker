

<?php

	try
	{	
	ini_set('max_execution_time', 300);
	
		$username = $_REQUEST["username"];		
		$password = $_REQUEST["password"];	
		$selectOption = $_REQUEST["selectOption"];	
		
		$balLink =  loadLinkBalance($selectOption, $username, $password);		
		//$balance = file_get_contents($balLink);
		$balance = file_get_contents(html_entity_decode($balLink));

		
		$balLenght = trim(strlen($balance));             
	
	
	 function makecoffee($selectedSmsOption, $username, $password)
    {
		// This function would verify the username and password from the mobile end
		// Would also send a message to the arduino device to initiate the device to start making coffee
	}

?>

