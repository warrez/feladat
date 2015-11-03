<?php
	//MySQL szerver jellemzőinek megadása
				$mysql_host = "localhost";
                $mysql_database = "1035483";
                $mysql_user = "1035483";
                $mysql_password = "gergetto343";
	//Csatlakozás a MySQL szerverhez
		$connect=mysql_connect($mysql_host,$mysql_user,$mysql_password);
			if (!$connect)
				{
					print("<h1>Nincs kapcsolat az SQL szerverrel!</h1>");
				}
				else
				{
		//Adatbázis kiválasztás
					$datab=mysql_select_db($mysql_database);
					if (!$datab)
					{
						print("<h1> Az adatbázis szerver nem érhető el! </h1>");
					}
					else
					{
						mysql_query("SET NAMES'utf8'");
						
		//Adatbázis lekérdezés
							$sql="select varos, homerseklet, aktido from idojaras order by aktido desc";
							$eredmenytabla=mysql_query($sql);
							$adatok = "";
							while($res = mysql_fetch_row($eredmenytabla)){
							$adatok .= implode(";", $res);
							$adatok .= "\n";
						}

					}
				}
				header("Content-type: text/csv");
				header("Content-Disposition: attachment; filename=weatherdata.csv");
				header("Pragma: no-cache");
				header("Expires: 0");
				echo $adatok;
?>