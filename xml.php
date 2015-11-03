<?php
				$mysql_host = "localhost";
                $mysql_database = "1035483";
                $mysql_user = "1035483";
                 $mysql_password = "gergetto343";
				//csatlakozás a MySQL szerverhez
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
							

						$layout = "";
						$xmlstring = "<news></news>";
						$xmli= new SimpleXMLElement("<xml></xml>");
						$idojaras = $xmli->addChild('idojaras');
						$sql="select varos,homerseklet,aktido from idojaras ORDER BY aktido desc";
						$edt=mysql_query($sql);
								if(mysql_num_rows($edt) > 0):
									while($idj = mysql_fetch_assoc($edt)):
										$data = $idojaras->addChild('data');
										$varos = $data->addChild('varos');
										$varos->addAttribute("name",$idj['varos']);
										$homerseklet = $varos->addChild('homerseklet', $idj['homerseklet']);
										$aktido = $varos->addChild('aktido', $idj['aktido']);			
									endwhile;
								endif;
						header("Content-type: text/xml");
						header("Content-Disposition: attachment; filename=weatherdata.xml");
						header("Pragma: no-cache");
						header("Expires: 0");
						echo $xmli->asXML();
					}
				}
?>