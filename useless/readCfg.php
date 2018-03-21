<?php
	# 
	session_start();
	$fp = fopen("./config.txt", "r");//open file in read mode 
	function find($fp){
		while(!feof($fp))
  			if(fgetc($fp) == ':')
  				return 1;
  		return 0;
	}
	function get_value($fp){
		$temp ="";
		while(!feof($fp)){
  			if(($ch = fgetc($fp)) != '\n')
  				$temp.=$ch;
  			else return $temp;
		}
  		return 1;
	}

	if(find($fp))
  		$_SESSION["database"]=get_value($fp);
  	if(find($fp))
  		$_SESSION["username"]=get_value($fp);
  	if(find($fp))
  		$_SESSION["password"]=get_value($fp);
?>