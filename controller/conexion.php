<?php
	$host="127.0.0.1";
	$us="root";
	$pa="root";
	$conec=mysql_connect($host,$us,$pa);
	mysql_select_db("celulares");
	function protect($v){
			$v=mysql_real_escape_string($v);
			$v=htmlentities($v, ENT_QUOTES);
			$v=trim($v);
			return $v;
	}
?>