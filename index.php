<!doctype html>
<html>
	<head>
		<title>Próba Feladat</title>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="style.css" type="text/css">  
		
		<script src="http://maps.googleapis.com/maps/api/js"></script>
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
	</head>
	
	<body onload="pr()">
	
		<h1>Feladat</h1>
		
		<a class="gomb" onclick="frissites()">Adatok frissítése</a>
		<a class="gomb" href="csv.php">CSV Letöltés</a>
		<a class="gomb" href="xml.php">XML Letöltés</a>
		<a class="gomb" href="xls.php">XLS Letöltés</a>
			
		<h2>GoogleMaps</h2>
		<div id="googleMap" style="width:670px;height:460px;"></div>
		
		<div id="kiir"></div>
			
		<div id="map1">
			<h2>OpenStreetMap</h2>
			<div id="map" style="width:670px;height:460px;"></div>
			<div id="footer">&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors</div>
		</div>
			
		<script type="text/javascript">
		
			function frissites(){
				  var xhttp = new XMLHttpRequest();
				  xhttp.onreadystatechange = function() {
					if (xhttp.readyState == 4 && xhttp.status == 200) {
					 //document.getElementById("kiir").innerHTML = "frissítve";
					 pr();
					}
				  }
				  xhttp.open("GET", "lek.php", true);
				  xhttp.send();
			}
					var Boston=new google.maps.LatLng(42.361507, -71.059227);
					var Worcester=new google.maps.LatLng(42.281599, -71.778846);
					var Providence=new google.maps.LatLng(41.845123, -71.413025);
					var Newport=new google.maps.LatLng(41.515798, -71.311772);
					var Hartford=new google.maps.LatLng(41.822344, -72.710107);
				
			function pr() {
				initialize();
				function initialize() {
					var mapProp = {
						center:new google.maps.LatLng(42.281599, -71.778846),
						zoom:8,
						mapTypeId:google.maps.MapTypeId.ROADMAP
					  };
						var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);

						var bostp = new XMLHttpRequest();
						  bostp.onreadystatechange = function() {
							if (bostp.readyState == 4 && bostp.status == 200) {
								var marker=new google.maps.Marker({ position:Boston});
						marker.setMap(map);
							  var infowindow = new google.maps.InfoWindow({content:bostp.responseText});
							  google.maps.event.addListener(marker, 'click', function() {
								infowindow.open(map,marker);
								});
							}
						  }
						  bostp.open("GET", "boston.php", true);
						  bostp.send();
						
						var worcp = new XMLHttpRequest();
							  worcp.onreadystatechange = function() {
								if (worcp.readyState == 4 && worcp.status == 200) {
						var marker=new google.maps.Marker({ position:Worcester});
							marker.setMap(map);
						  var infowindow = new google.maps.InfoWindow({ content:worcp.responseText});
							google.maps.event.addListener(marker, 'click', function() {
									infowindow.open(map,marker);
									});
								}
							  }
							  worcp.open("GET", "worcester.php", true);
							  worcp.send();
							
						var providp = new XMLHttpRequest();
							  providp.onreadystatechange = function() {
								if (providp.readyState == 4 && providp.status == 200) {
						var marker=new google.maps.Marker({ position:Providence});
							marker.setMap(map);
						  var infowindow = new google.maps.InfoWindow({ content:providp.responseText});
							google.maps.event.addListener(marker, 'click', function() {
									infowindow.open(map,marker);
									});
								}
							  }
							  providp.open("GET", "providence.php", true);
							  providp.send();
							
							var newp = new XMLHttpRequest();
							  newp.onreadystatechange = function() {
								if (newp.readyState == 4 && newp.status == 200) {
						var marker=new google.maps.Marker({ position:Newport});
							marker.setMap(map);
						  var infowindow = new google.maps.InfoWindow({ content:newp.responseText});
							google.maps.event.addListener(marker, 'click', function() {
									infowindow.open(map,marker);
								});
							}
						  }
						  newp.open("GET", "newport.php", true);
						  newp.send();
						  
						  var hartp = new XMLHttpRequest();
						  hartp.onreadystatechange = function() {
							if (hartp.readyState == 4 && hartp.status == 200) {
					var marker=new google.maps.Marker({ position:Hartford});
						marker.setMap(map);
					  var infowindow = new google.maps.InfoWindow({ content:hartp.responseText});
						google.maps.event.addListener(marker, 'click', function() {
								infowindow.open(map,marker);
								});
							}
						  }
						  hartp.open("GET", "hartford.php", true);
						  hartp.send();
					
			
					google.maps.event.addDomListener(window, 'load');
				}
			
				///////////////////// OSM /////////////////////////////
	 
				//Google maps API initialisation
				var element = document.getElementById("map");
	 
				var map = new google.maps.Map(element, {
					center: new google.maps.LatLng(42, -71),
					zoom: 8,
					mapTypeId: "OSM",
					mapTypeControl: false,
					streetViewControl: false
				});
				
				var bostp = new XMLHttpRequest();
						  bostp.onreadystatechange = function() {
							if (bostp.readyState == 4 && bostp.status == 200) {
								var marker=new google.maps.Marker({ position:Boston});
						marker.setMap(map);
							  var infowindow = new google.maps.InfoWindow({content:bostp.responseText});
							  google.maps.event.addListener(marker, 'click', function() {
								infowindow.open(map,marker);
								});
							}
						  }
						  bostp.open("GET", "boston.php", true);
						  bostp.send();
						  
						  var worcp = new XMLHttpRequest();
						  worcp.onreadystatechange = function() {
							if (worcp.readyState == 4 && worcp.status == 200) {
					var marker=new google.maps.Marker({ position:Worcester});
						marker.setMap(map);
					  var infowindow = new google.maps.InfoWindow({ content:worcp.responseText});
						google.maps.event.addListener(marker, 'click', function() {
								infowindow.open(map,marker);
								});
							}
						  }
						  worcp.open("GET", "worcester.php", true);
						  worcp.send();
						
					var providp = new XMLHttpRequest();
						  providp.onreadystatechange = function() {
							if (providp.readyState == 4 && providp.status == 200) {
					var marker=new google.maps.Marker({ position:Providence});
						marker.setMap(map);
					  var infowindow = new google.maps.InfoWindow({ content:providp.responseText});
						google.maps.event.addListener(marker, 'click', function() {
								infowindow.open(map,marker);
								});
							}
						  }
						  providp.open("GET", "providence.php", true);
						  providp.send();
						
						var newp = new XMLHttpRequest();
						  newp.onreadystatechange = function() {
							if (newp.readyState == 4 && newp.status == 200) {
					var marker=new google.maps.Marker({ position:Newport});
						marker.setMap(map);
					  var infowindow = new google.maps.InfoWindow({ content:newp.responseText});
						google.maps.event.addListener(marker, 'click', function() {
								infowindow.open(map,marker);
								});
							}
						  }
						  newp.open("GET", "newport.php", true);
						  newp.send();
						  
						  var hartp = new XMLHttpRequest();
						  hartp.onreadystatechange = function() {
							if (hartp.readyState == 4 && hartp.status == 200) {
					var marker=new google.maps.Marker({ position:Hartford});
						marker.setMap(map);
					  var infowindow = new google.maps.InfoWindow({ content:hartp.responseText});
						google.maps.event.addListener(marker, 'click', function() {
								infowindow.open(map,marker);
								});
							}
						  }
						  hartp.open("GET", "hartford.php", true);
						  hartp.send();
	 
				//Define OSM map type pointing at the OpenStreetMap tile server
				map.mapTypes.set("OSM", new google.maps.ImageMapType({
					getTileUrl: function(coord, zoom) {
						return "http://tile.openstreetmap.org/" + zoom + "/" + coord.x + "/" + coord.y + ".png";
					},
					tileSize: new google.maps.Size(256, 256),
					name: "OpenStreetMap",
					maxZoom: 18
				}));
			}
			</script>
		
	</body>
</html>	