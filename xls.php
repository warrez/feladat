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
							$query="select varos, homerseklet, aktido from idojaras order by aktido desc";
							$header = '';
							$data ='';								
							$export = mysql_query($query );
							// export data 
							while( $row = mysql_fetch_row( $export ) )
							{
								$line = '';
								foreach( $row as $value )
								{
									if ( ( !isset( $value ) ) || ( $value == "" ) )
									{
										$value = "\t";
									}
									else
									{
										$value = str_replace( '"' , '""' , $value );
										$value = '"' . $value . '"' . "\t";
									}
									$line .= $value;
								}
								$data .= trim( $line ) . "\n";
							}
							$data = str_replace( "\r" , "" , $data );
							 
							if ( $data == "" )
							{
								$data = "\nNo Record(s) Found!\n";                        
							}
							 
							// allow exported file to download forcefully
							header("Content-type: application/octet-stream");
							header("Content-Disposition: attachment; filename=weatherdata.xls");
							header("Pragma: no-cache");
							header("Expires: 0");
							print "$header\n$data";
					}
				}
?>