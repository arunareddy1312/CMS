<?php

include "system/libs/Controller.php";
include "system/libs/Model.php";
include "system/libs/Load.php";

include_once "system/libs/Database.php";



$url = isset($_GET['url']) ? $_GET['url'] : NULL;

if($url != NULL)
{
	$url = rtrim($url,'/');
	$url = explode("/", filter_var($url,FILTER_SANITIZE_URL));

}
else{
	unset($url);
}

if(isset($url[0])){
	if($url[0] == "admin")
	{
		$Controller = $url[1]."Controller";
		include "app/controllers/admin/".$Controller.".php";
		$ur = new $Controller();

		if(isset($url[3])){		
			$method = $url[2];
			$ur->$method($url[3]);				
		}
		else if(isset($url[2])){		
			$method = $url[2];
			$ur->$method();				
		}
		else {
			$ur->index();			
		}
	}else
	{
		if(endsWith($url[0],"Controller"))
		{
			include "app/controllers/".$url[0].".php";
			$ur = new $url[0]();
					
			if(isset($url[2])){
				$method = $url[1];
				$ur->$method($url[2]);
			}
			else{	
				if(isset($url[1])){
					$method = $url[1];
					$ur->$method();
				}else{

				}
			}
		}
		else
		{
			$Controller = $url[0]."Controller";
			include "app/controllers/".$Controller.".php";
			$New = new $Controller();		
			$New->index();
		}
	}		
}else{	
	include "app/controllers/HomeController.php";
	$ur = new HomeController();
	$ur->home();
}

function endsWith($string, $endString)
{
    $len = strlen($endString);
    if ($len == 0) {
        return true;
    }
    return (substr($string, -$len) === $endString);
}
?>