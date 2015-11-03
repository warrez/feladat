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
		
						$sql="select * from idojaras where varos='Hartford' order by aktido desc limit 5";
						$idojaras=mysql_query($sql);
						
		// print('SQL szerver hiba:'.mysql_error());
						
						while($kat=mysql_fetch_array($idojaras)){
						print('<div class="ki">');
							print(''.$kat['varos'].$kat['homerseklet'].$kat['aktido']);
						print('</div>');
						}
						
					}
				}
?>