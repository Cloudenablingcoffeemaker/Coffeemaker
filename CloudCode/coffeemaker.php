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

             if ($selectOption==0)
                   {
                       echo $balance;
		   }

             else if ($selectOption>0 && $selectOption<9)
               {

                     if (($balance=="2905")||($balance=="1803")||($balance=="Error!! Authentication Failed.")||($balance=="AUTHORIZATION FAILED")||($balance=="ERR_LOGIN"))
                        {
                           echo("-2905");
                        }
                     else
                       {
                      if ($balLenght==1)
			{
				echo $balance.".0000";
			}
			else if ($balLenght==2)
			{
				echo $balance.".000";
			}
			else if ($balLenght==3)
			{
				echo $balance.".00";
			}
			else if ($balLenght==4)
			{
				echo $balance.".0";
			}
			else
			{
				echo $balance;
			}
                      }

               } 

		
	}
	catch (Exception $e)
	{
            echo "Exception: ".$e;
	}

	
	
	 function loadLinkBalance($selectedSmsOption, $username, $password)
    {
        //no sms
        if ($selectedSmsOption==0)
        {
            $bal = "http://www.estoresms.com/smsapi.php?username=".$username."&password=".$password."&balance=true&";
        }
        //estoresms
        else if ($selectedSmsOption==1) {
            $bal="http://sms.bbnplace.com/bulksms/acctbals.php?username=".$username."&password=".$password;
        }
        //bbnSms
        else if ($selectedSmsOption==2)
        {
			$bal = "http://www.bulksmsnigeria.net/components/com_spc/smsapi.php?username=". $username."&password=". $password."&balance=true&";
        }
        //http://www.cheapestbulksmsinnigeria.com/
        else if ($selectedSmsOption==3)
        {
			$bal = "http://cheapestbulksmsinnigeria.com/components/com_spc/smsapi.php?username=". $username."&password=". $password."&balance=true&";
        }
        //way2txtsms.net
        else if ($selectedSmsOption==4) {    
     			$bal="http://www.way2txtsms.com/sendsms/checkbalance.php?username=". $username."&password=". $password;       
        }
		//smartweb
		else if ($selectedSmsOption==5)
		{
			$bal="http://api.smartsmssolutions.com/smsapi.php?username=". $username."&password=". $password."&balance=true&";
		}
		
		//routesms
		else if ($selectedSmsOption==6)
		{
			$bal="http://smsplus.routesms.com/CreditCheck/checkcredits?username=".$username."&password=".$password;
		}
		
		else if ($selectedSmsOption==7)
		{
			$bal="http://smsmobile24.com/components/com_spc/smsapi.php?username=". $username."&password=". $password."&balance=true&";
		}
		
		else if ($selectedSmsOption==8)
		{
			$bal="http://smsclone.com/components/com_spc/smsapi.php?username=". $username."&password=". $password."&balance=true&";
		}
		
		else if ($selectedSmsOption==9)
		{
			$bal="http://www.mobileautomatedsystems.com/components/com_spc/smsapi.php?username=". $username."&password=". $password."&balance=true&";
		}
		
		
		

		
		
		return $bal;
    }

?>

