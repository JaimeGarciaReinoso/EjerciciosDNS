<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title>Comprobación de ejercicio</title>
		<link rel="stylesheet" href="style.css">
	</head>
<body>
<?php

//const
$devices = 5;
$itemsMessage = 7;

require __DIR__ . '/credencialesDB.env';

try {
  $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully<br>";
} catch(PDOException $e) {
  echo "Connection to the database failed: " . $e->getMessage();
}

//$ex stores all SegmentID, sender and tic of the exercise
$ex = $conn->prepare("SELECT * FROM ExercisesDNS WHERE ExerciseID= :eid");
$ex->setFetchMode(PDO::FETCH_OBJ);
$ex->execute(array(':eid' => $_POST["ExerciseID"]));

//$arraySeg will include all segment information of the exercise and NULLs in case a <sender,tic> does not exist 
$arraySeg = array();
$tic = 1;
$sender = 1;

while ($row = $ex->fetch()){
	//tic=intval($row->TicID);
	//snd=intval($row->Sender);
	//ids=intval($row->SegmentID);
	//fill with NULLs in case segments do not exist in answers
	for ($senderAux=1; $senderAux <= $devices; $senderAux++) {
		if (($row->Sender != $senderAux)) {
			$arraySeg[] = array("NULL", "NULL", "NULL", "NULL", "NULL", "NULL", "NULL");
		} else {
			if (empty($row->Aname)) {
				$row->Aname = "NULL";
				$row->Atype = "NULL";
				$row->Aaddr = "NULL";
			}
			$arraySeg[] = array($row->Dest,$row->QR,$row->Qname,$row->Qtype,$row->Aname,$row->Atype,$row->Aaddr);
		}
	}
	$tic = $tic+1;
}

//fill with NULL 'til tic 15, which is what we have in the forms
while ($tic < 16) {
	$arraySeg[] = array("NULL", "NULL", "NULL", "NULL", "NULL", "NULL", "NULL");
	$sender = ($sender + 1) % $devices + 1;
	if ($sender == 1) $tic = $tic + 1;
}

//echo "ANSWER---------<br>";
//$tic = 0;
//$sender = 0;
//echo "Tic: $tic - Sender: $sender ::: ";
//foreach ($arraySeg as $seg) {
//	foreach ($seg as $field) {
//		echo $field . " ";
//	}
//	echo "<br>";
//	$sender = ($sender + 1) % 2;
//	if ($sender == 0) $tic = $tic + 1;
//	echo "Tic: $tic - Sender: $sender ::: ";
//}


//Load received FORM as an array
$aux = 0;
$exerciseIDAux = 0;
$postArray = array();
$auxArray = array();
foreach ($_POST as $key => $val) {
	if ($exerciseIDAux > 1) { //first two fields are hidden
		if ($aux == 0) {
			if ($val == 0) $auxArray[] = "NULL";
			else $auxArray[] = $val % $itemsMessage;
		}
		else 
			$auxArray[] = $val;
		$aux = $aux + 1;
		if ($aux == $itemsMessage) { 
			$postArray[] = $auxArray;
			$auxArray = array();
			$aux = 0;
		}
	}
	else $exerciseIDAux = $exerciseIDAux + 1;	
}

//echo "Student's answer +++++++++++++++++ <br>";
//$tic = 0;
//$sender = 0;
//echo "Tic: $tic - Sender: $sender ::: ";
//foreach ($postArray as $seg) {
//	foreach ($seg as $field) {
//		echo $field . " ";
//	}
//	echo "<br>";
//	$sender = ($sender + 1) % 2;
//	if ($sender == 0) $tic = $tic + 1;
//	echo "Tic: $tic - Sender: $sender ::: ";
//}


//Compare FORM and answer arrays
//
$ticAux = 0;
$senderAux = 0;

echo "
  <table id=\"formTable\">

	<tr>
		<th class=\"top-header\" colspan=\"7\">Client</th>
		<td></td>
		<th class=\"top-header\" colspan=\"7\">Local DNS</th>
		<td></td>
		<th class=\"top-header\" colspan=\"7\">Root DNS</th>
		<td></td>
		<th class=\"top-header\" colspan=\"7\">TLD DNS</th>
		<td></td>
		<th class=\"top-header\" colspan=\"7\">Auth. DNS</th>
	</tr>
	<tr>
		<th class=\"ip-dns-header\" colspan=\"1\">IP</th>
		<th  class=\"ip-dns-header\" colspan=\"6\">DNS</th>
		<td></td>
		<th  class=\"ip-dns-header\" colspan=\"1\">IP</th>
		<th  class=\"ip-dns-header\" colspan=\"6\">DNS</th>
		<td></td>
		<th  class=\"ip-dns-header\" colspan=\"1\">IP</th>
		<th  class=\"ip-dns-header\" colspan=\"6\">DNS</th>
		<td></td>
		<th  class=\"ip-dns-header\" colspan=\"1\">IP</th>
		<th  class=\"ip-dns-header\" colspan=\"6\">DNS</th>
		<td></td>
		<th  class=\"ip-dns-header\" colspan=\"1\">IP</th>
		<th  class=\"ip-dns-header\" colspan=\"6\">DNS</th>
		<td></td>
	</tr>
	<tr>
		<th class=\"content-header\" colspan=\"1\">IPdest</th>
		<th class=\"content-header\" colspan=\"1\">Flags</th>
		<th class=\"content-header\" colspan=\"2\">Queries</th>
		<th class=\"content-header\"  colspan=\"3\">Answers</th>
		<td></td>
		<th class=\"content-header\"  colspan=\"1\">IPdest</th>
		<th class=\"content-header\"  colspan=\"1\">Flags</th>
		<th class=\"content-header\"  colspan=\"2\">Queries</th>
		<th class=\"content-header\" colspan=\"3\">Answers</th>
		<td></td>
		<th class=\"content-header\"  colspan=\"1\">IPdest</th>
		<th class=\"content-header\"  colspan=\"1\">Flags</th>
		<th class=\"content-header\" colspan=\"2\">Queries</th>
		<th class=\"content-header\" colspan=\"3\">Answers</th>
		<td></td>
		<th class=\"content-header\" colspan=\"1\">IPdest</th>
		<th class=\"content-header\" colspan=\"1\">Flags</th>
		<th class=\"content-header\" colspan=\"2\">Queries</th>
		<th class=\"content-header\" colspan=\"3\">Answers</th>
		<td></td>
		<th class=\"content-header\" colspan=\"1\">IPdest</th>
		<th class=\"content-header\" colspan=\"1\">Flags</th>
		<th class=\"content-header\" colspan=\"2\">Queries</th>
		<th class=\"content-header\" colspan=\"3\">Answers</th>
	<tr>
		<th class=\"bottom-header\">IPdest</th>
		<th class=\"bottom-header\">QR</th>
		<th class=\"bottom-header\">Name</th>
		<th class=\"bottom-header\">Type</th>
		<th class=\"bottom-header\">Name</th>
		<th class=\"bottom-header\">Type</th>
		<th class=\"bottom-header\">Address</th>
		<td></td>
		<th class=\"bottom-header\">IPdest</th>
		<th class=\"bottom-header\">QR</th>
		<th class=\"bottom-header\">Name</th>
		<th class=\"bottom-header\">Type</th>
		<th class=\"bottom-header\">Name</th>
		<th class=\"bottom-header\">Type</th>
		<th class=\"bottom-header\">Address</th>
		<td></td>
		<th class=\"bottom-header\">IPdest</th>
		<th class=\"bottom-header\">QR</th>
		<th class=\"bottom-header\">Name</th>
		<th class=\"bottom-header\">Type</th>
		<th class=\"bottom-header\">Name</th>
		<th class=\"bottom-header\">Type</th>
		<th class=\"bottom-header\">Address</th>
		<td></td>
		<th class=\"bottom-header\">IPdest</th>
		<th class=\"bottom-header\">QR</th>
		<th class=\"bottom-header\">Name</th>
		<th class=\"bottom-header\">Type</th>
		<th class=\"bottom-header\">Name</th>
		<th class=\"bottom-header\">Type</th>
		<th class=\"bottom-header\">Address</th>
		<td></td>
		<th class=\"bottom-header\">IPdest</th>
		<th class=\"bottom-header\">QR</th>
		<th class=\"bottom-header\">Name</th>
		<th class=\"bottom-header\">Type</th>
		<th class=\"bottom-header\">Name</th>
		<th class=\"bottom-header\">Type</th>
		<th class=\"bottom-header\">Address</th>
	</tr>
";
$errors=0;

while ($ticAux < 15) {
	for ($dev = 0; $dev < $devices; $dev++)  {
		for ($i = 0; $i < $itemsMessage; $i++) { //5 devices x 9 elements per message = 45 inputs per row
			if ($errors >=3) {
				echo "<td><input disabled id=\"yellow\" type=\"text\" side=\"client\" size=\"5\" value=\""; 
			} elseif ($postArray[$ticAux*$devices+$dev][$i] != $arraySeg[$ticAux*$devices+$dev][$i]) {
				echo "<td><input disabled id=\"red\" type=\"text\" side=\"client\" size=\"5\" value=\""; 
				$errors++;
			} else
				echo "<td><input disabled id=\"green\" type=\"text\" side=\"client\" size=\"5\" value=\""; 
			
			echo $postArray[$ticAux*$devices+$dev][$i] . "\"></td>\n";
//echo "Mismatch in tic = $ticAux, sender = $senderAux, field= $i | Student: " .  $postArray[2*$ticAux+$senderAux][$i] . " vs  Answer: " . $arraySeg[2*$ticAux+$senderAux][$i] . "<br>";
	}
		echo "<td></td>";
	}
	$ticAux = $ticAux + 1;
	echo "</tr><tr>\n";
}	
echo "</tr> </table>";

if ($errors == 0)
  echo "<h2>¡Felicidades! ¡Tu respuesta es correcta!</h2>";
elseif ($errors == 1)
  echo "<h3>Lo siento, tienes un error. <br>Inténtalo otra vez dándole al botón de ir atrás en tu navegador.</h3>";
elseif ($errors < 3)
  echo "<h3>Lo siento, tienes " . $errors . " errores. <br>Inténtalo otra vez dándole al botón de ir atrás en tu navegador.</h3>";
else
  echo "<h3>Tienes tres errores o más y por lo tanto no se ha corregido completamente tu respuesta. <br>Inténtalo otra vez dándole al botón de ir atrás en tu navegador.</h3>";

?>
 
  <p>
    <h3>
      Para volver al índice principal pulsar <a href="index.html">aquí</a>.
  </h3>
  </p>
</body>
</html>

