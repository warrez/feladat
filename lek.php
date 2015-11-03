<?php
	date_default_timezone_set('Europe/Budapest');
	$aktido = date("Y-m-d H:i:s");
	$response_array = array();

	$requestParams = array(
		'CityName' => 'Boston',
		'CountryName' => 'United States');

	$client = new SoapClient('http://www.webservicex.net/globalweather.asmx?WSDL');
	$response = $client->GetWeather($requestParams);

	$xml = simplexml_load_string(mb_convert_encoding($response->GetWeatherResult, "UTF-16"));

	$respxml = $xml[0];

	//print_r($respxml);
	//print("Boston");
	//print($respxml->Temperature);
	$response_array[0]['varosnev'] = 'Boston';
	$response_array[0]['homerseklet'] = $respxml->Temperature;
	
	
	//Worcester
	
	$requestParams = array(
		'CityName' => 'Worcester',
		'CountryName' => 'United States');

	$client = new SoapClient('http://www.webservicex.net/globalweather.asmx?WSDL');
	$response = $client->GetWeather($requestParams);

	$xml = simplexml_load_string(mb_convert_encoding($response->GetWeatherResult, "UTF-16"));

	$respxml = $xml[0];

	//print_r($respxml);
	//print("Worcester");
	//print($respxml->Temperature);
	$response_array[1]['varosnev'] = 'Worcester';
	$response_array[1]['homerseklet'] = $respxml->Temperature;
	
	//Providence
	
	$requestParams = array(
		'CityName' => 'Providence',
		'CountryName' => 'United States');

	$client = new SoapClient('http://www.webservicex.net/globalweather.asmx?WSDL');
	$response = $client->GetWeather($requestParams);

	$xml = simplexml_load_string(mb_convert_encoding($response->GetWeatherResult, "UTF-16"));

	$respxml = $xml[0];

	//print_r($respxml);
	//print("Providence");
	//print($respxml->Temperature);
	$response_array[2]['varosnev'] = 'Providence';
	$response_array[2]['homerseklet'] = $respxml->Temperature;
	
	//Newport
	
	$requestParams = array(
		'CityName' => 'Newport',
		'CountryName' => 'United States');

	$client = new SoapClient('http://www.webservicex.net/globalweather.asmx?WSDL');
	$response = $client->GetWeather($requestParams);

	$xml = simplexml_load_string(mb_convert_encoding($response->GetWeatherResult, "UTF-16"));

	$respxml = $xml[0];

	//print_r($respxml);
	//print("Newport");
	//print($respxml->Temperature);
	$response_array[3]['varosnev'] = 'Newport';
	$response_array[3]['homerseklet'] = $respxml->Temperature;
	
	//Hartford
	
	$requestParams = array(
		'CityName' => 'Hartford',
		'CountryName' => 'United States');

	$client = new SoapClient('http://www.webservicex.net/globalweather.asmx?WSDL');
	$response = $client->GetWeather($requestParams);

	$xml = simplexml_load_string(mb_convert_encoding($response->GetWeatherResult, "UTF-16"));

	$respxml = $xml[0];

	//print_r($respxml);
	//print("Hartford");
	//print($respxml->Temperature);
	$response_array[4]['varosnev'] = 'Hartford';
	$response_array[4]['homerseklet'] = $respxml->Temperature;
	
	//feltöltés ------------------------------------------------------
	
	//MySQL szerver jellemzõinek megadása
				$mysql_host = "localhost";
                                $mysql_database = "1035483";
                                $mysql_user = "1035483";
                               $mysql_password = "gergetto343";
				//csatlakozás a MySQL szerverhez
				$connect=mysql_connect($mysql_host,$mysql_user,$mysql_password);
				if (!$connect)
				{
					print("<h1> Az adatbázis szerver nem érhetõ el! </h1>");
				}
				else
				{
					//Adatbázis kiválasztás
					$datab=mysql_select_db($mysql_database);
					if (!$datab)
					{
						print("<h1> Az adatbázis szerver nem érhetõ el! </h1>");
					}
					else
					{
						
						mysql_query("SET NAMES'utf8'");
						
						foreach($response_array as $key => $value) {
							$vnev = $value['varosnev'];
							$homerseklet = $value['homerseklet'];
							$command="insert into idojaras (varos,homerseklet,aktido) value 
							('$vnev','$homerseklet','$aktido')";
							mysql_query($command);
							print (mysql_error());
						}
					}
				}
?>			