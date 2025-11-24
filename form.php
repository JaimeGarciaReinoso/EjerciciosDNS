<html>

<head>
	<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body>

	<nav class="navbar">
		<h1>DNS Exercises</h1>
	</nav>


			<?php
			// Use centralized database connection
			require 'db_connection.php';
			$conn = $pdo; // form.php uses $conn variable
			
			//$ex stores all SegmentID, sender and tic of the exercise
			$id = (int) ($_GET['id'] ?? 0);
			$lang = (isset($_GET['langID']) && $_GET['langID'] === 'en') ? 'en' : 'es';
			$textColumn = ($lang == 'en') ? 'EnunTextEN' : 'EnunTextES';

			$search = "SELECT ExerciseNum, ExercisePart, $textColumn as EnunText FROM EnunDNS WHERE ExerciseID=" . $id;
			$ex = $conn->prepare($search);
			$ex->setFetchMode(PDO::FETCH_OBJ);
			$ex->execute();
			$result = $ex->fetch();

			if (!$result) {
				echo "<h2>Error: Exercise not found (ID: $id)</h2>";
			} else {
				$has_cc = ($result->congestion_control == 1);

				echo "<h2> <b>" . ($lang == 'en' ? 'Exercise ' : 'Ejercicio ') . $result->ExerciseNum . " - " . ($lang == 'en' ? 'Part ' : 'Parte ') . $result->ExercisePart . " </b></h2>
	            <p> " . $result->EnunText . " </p>";
			}
			?>

<div id="tableContainer" style="position: relative; display: inline-block;">
			<form action="check.php" method="POST">
				<input type="hidden" id="ExerciseID" name="ExerciseID" value="<?php echo $id; ?>">
				<input type="hidden" name="langID" value="<?php echo htmlspecialchars($lang); ?>">
  <table id="formTable">

	<tr>
		<th class="top-header" colspan="7">Client</th>
		<td></td>
		<th class="top-header" colspan="7">Local DNS</th>
		<td></td>
		<th class="top-header" colspan="7">Root DNS</th>
		<td></td>
		<th class="top-header" colspan="7">TLD DNS</th>
		<td></td>
		<th class="top-header" colspan="7">Auth. DNS</th>
	</tr>
	<tr>
		<th class="ip-dns-header" colspan="1">IP</th>
		<th  class="ip-dns-header" colspan="6">DNS</th>
		<td></td>
		<th  class="ip-dns-header" colspan="1">IP</th>
		<th  class="ip-dns-header" colspan="6">DNS</th>
		<td></td>
		<th  class="ip-dns-header" colspan="1">IP</th>
		<th  class="ip-dns-header" colspan="6">DNS</th>
		<td></td>
		<th  class="ip-dns-header" colspan="1">IP</th>
		<th  class="ip-dns-header" colspan="6">DNS</th>
		<td></td>
		<th  class="ip-dns-header" colspan="1">IP</th>
		<th  class="ip-dns-header" colspan="6">DNS</th>
		<td></td>
	</tr>
	<tr>
		<th class="content-header" colspan="1">IPdest</th>
		<th class="content-header" colspan="1">Flags</th>
		<th class="content-header" colspan="2">Queries</th>
		<th class="content-header"  colspan="3">Answers/Additional</th>
		<td></td>
		<th class="content-header"  colspan="1">IPdest</th>
		<th class="content-header"  colspan="1">Flags</th>
		<th class="content-header"  colspan="2">Queries</th>
		<th class="content-header" colspan="3">Answers/Additional</th>
		<td></td>
		<th class="content-header"  colspan="1">IPdest</th>
		<th class="content-header"  colspan="1">Flags</th>
		<th class="content-header" colspan="2">Queries</th>
		<th class="content-header" colspan="3">Answers/Additional</th>
		<td></td>
		<th class="content-header" colspan="1">IPdest</th>
		<th class="content-header" colspan="1">Flags</th>
		<th class="content-header" colspan="2">Queries</th>
		<th class="content-header" colspan="3">Answers/Additional</th>
		<td></td>
		<th class="content-header" colspan="1">IPdest</th>
		<th class="content-header" colspan="1">Flags</th>
		<th class="content-header" colspan="2">Queries</th>
		<th class="content-header" colspan="3">Answers/Additional</th>
	<tr>
		<th class="bottom-header">IPdest</th>
		<th class="bottom-header">QR</th>
		<th class="bottom-header">Name</th>
		<th class="bottom-header">Type</th>
		<th class="bottom-header">Name</th>
		<th class="bottom-header">Type</th>
		<th class="bottom-header">Address</th>
		<td></td>
		<th class="bottom-header">IPdest</th>
		<th class="bottom-header">QR</th>
		<th class="bottom-header">Name</th>
		<th class="bottom-header">Type</th>
		<th class="bottom-header">Name</th>
		<th class="bottom-header">Type</th>
		<th class="bottom-header">Address</th>
		<td></td>
		<th class="bottom-header">IPdest</th>
		<th class="bottom-header">QR</th>
		<th class="bottom-header">Name</th>
		<th class="bottom-header">Type</th>
		<th class="bottom-header">Name</th>
		<th class="bottom-header">Type</th>
		<th class="bottom-header">Address</th>
		<td></td>
		<th class="bottom-header">IPdest</th>
		<th class="bottom-header">QR</th>
		<th class="bottom-header">Name</th>
		<th class="bottom-header">Type</th>
		<th class="bottom-header">Name</th>
		<th class="bottom-header">Type</th>
		<th class="bottom-header">Address</th>
		<td></td>
		<th class="bottom-header">IPdest</th>
		<th class="bottom-header">QR</th>
		<th class="bottom-header">Name</th>
		<th class="bottom-header">Type</th>
		<th class="bottom-header">Name</th>
		<th class="bottom-header">Type</th>
		<th class="bottom-header">Address</th>
	</tr>

<?php
	for ($x=0;$x<=14;$x++) {
			echo "
	<tr>
		<td id=\"".($x*7+1)."\"><select name=\"c".($x+1)."-dest\"><option value=\"0\">NULL</option><option value=\"".(($x+1)*7+2)."\">Local</option><option value=\"".(($x+1)*7+3)."\">Root</option><option value=\"".(($x+1)*7+4)."\">TLD</option><option value=\"".(($x+1)*7+5)."\">Auth.</option></td>
		<td><input type=\"text\" side=\"client\" name=\"c".($x+1)."-qr\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"client\" name=\"c".($x+1)."-Qname\" size=\"5\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"client\" name=\"c".($x+1)."-Qtype\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"client\" name=\"c".($x+1)."-Aname\" size=\"5\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"client\" name=\"c".($x+1)."-Atype\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"client\" name=\"c".($x+1)."-Aaddr\" size=\"5\" value=\"NULL\"></td>
		<td class=\"ticktemplate\"></td>
		<td id=\"".($x*7+2)."\"><select name=\"l".($x+1)."-dest\"><option value=\"0\">NULL</option><option value=\"".(($x+1)*7+1)."\">Client</option><option value=\"".(($x+1)*7+3)."\">Root</option><option value=\"".(($x+1)*7+4)."\">TLD</option><option value=\"".(($x+1)*7+5)."\">Auth.</option></td>
		<td><input type=\"text\" side=\"local\" name=\"l".($x+1)."-qr\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"local\" name=\"l".($x+1)."-Qname\" size=\"5\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"local\" name=\"l".($x+1)."-Qtype\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"local\" name=\"l".($x+1)."-Aname\" size=\"5\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"local\" name=\"l".($x+1)."-Atype\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"local\" name=\"l".($x+1)."-Aaddr\" size=\"5\" value=\"NULL\"></td>
		<td class=\"ticktemplate\"></td>
		<td id=\"".($x*7+3)."\"><select name=\"r".($x+1)."-dest\"><option value=\"0\">NULL</option><option value=\"".(($x+1)*7+1)."\">Client</option><option value=\"".(($x+1)*7+2)."\">Local</option><option value=\"".(($x+1)*7+4)."\">TLD</option><option value=\"".(($x+1)*7+5)."\">Auth.</option></td>
		<td><input type=\"text\" side=\"root\" name=\"r".($x+1)."-qr\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"root\" name=\"r".($x+1)."-Qname\" size=\"5\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"root\" name=\"r".($x+1)."-Qtype\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"root\" name=\"r".($x+1)."-Aname\" size=\"5\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"root\" name=\"r".($x+1)."-Atype\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"root\" name=\"r".($x+1)."-Aaddr\" size=\"5\" value=\"NULL\"></td>
		<td class=\"ticktemplate\"></td>
		<td id=\"".($x*7+4)."\"><select name=\"t".($x+1)."-dest\"><option value=\"0\">NULL</option><option value=\"".(($x+1)*7+1)."\">Client</option><option value=\"".(($x+1)*7+2)."\">Local</option><option value=\"".(($x+1)*7+3)."\">Root</option><option value=\"".(($x+1)*7+5)."\">Auth.</option></td>
		<td><input type=\"text\" side=\"tld\" name=\"t".($x+1)."-qr\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"tld\" name=\"t".($x+1)."-Qname\" size=\"5\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"tld\" name=\"t".($x+1)."-Qtype\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"tld\" name=\"t".($x+1)."-Aname\" size=\"5\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"tld\" name=\"t".($x+1)."-Atype\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"tld\" name=\"t".($x+1)."-Aaddr\" size=\"5\" value=\"NULL\"></td>
		<td class=\"ticktemplate\"></td>
		<td id=\"".($x*7+5)."\"><select name=\"a".($x+1)."-dest\"><option value=\"0\">NULL</option><option value=\"".(($x+1)*7+1)."\">Client</option><option value=\"".(($x+1)*7+2)."\">Local</option><option value=\"".(($x+1)*7+3)."\">Root</option><option value=\"".(($x+1)*7+4)."\">TLD</option></td>
		<td><input type=\"text\" side=\"auth\" name=\"a".($x+1)."-qr\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"auth\" name=\"a".($x+1)."-Qname\" size=\"5\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"auth\" name=\"a".($x+1)."-Qtype\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"auth\" name=\"a".($x+1)."-Aname\" size=\"5\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"auth\" name=\"a".($x+1)."-Atype\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"auth\" name=\"a".($x+1)."-Aaddr\" size=\"5\" value=\"NULL\"></td>
	</tr>
";
																	}
?>
  <input type="submit">
  </table>
</form>

  <!-- SVG overlay for drawing arrows -->
  <svg id="arrowLayer" width="100%" height="100%">
    <defs>
      <marker id="arrowhead" markerWidth="10" markerHeight="7" refX="10" refY="3.5" orient="auto">
        <polygon points="0 0, 10 3.5, 0 7" fill="black" />
      </marker>
    </defs>
  </svg>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const svg = document.getElementById('arrowLayer');
  const selects = document.querySelectorAll('#formTable select');

  selects.forEach(select => {
    select.addEventListener('change', () => {
      // Clear previous arrows
      svg.querySelectorAll('line').forEach(line => line.remove());

      // Redraw all connections
      selects.forEach(s => {
        if (s.value) {
		  selectTD = s.closest('td');
		  destTD = document.getElementById(s.value);

		  if (destTD) {
		  		if (Number(selectTD.id) < (Number(destTD.id)- 7)) {
			  		for (let i = 0; i < 7; i++) {
						selectTD = selectTD.nextElementSibling;
		  			}				
		  		} else {
					for (let i = 0; i < 7; i++) {
						destTD = destTD.nextElementSibling;
					}
		  		} 
		  		const fromCell = selectTD;
          		const toCell = destTD;
          		if (toCell) drawArrow(fromCell, toCell);
		  }
        }
      });
    });
  });

  function drawArrow(fromEl, toEl) {
    const rect1 = fromEl.getBoundingClientRect();
    const rect2 = toEl.getBoundingClientRect();
    const containerRect = document.getElementById('tableContainer').getBoundingClientRect();

    const x1 = rect1.left + rect1.width / 2 - containerRect.left;
    const y1 = rect1.top + rect1.height / 2 - containerRect.top;
    const x2 = rect2.left + rect2.width / 2 - containerRect.left;
    const y2 = rect2.top + rect2.height / 2 - containerRect.top;

    const line = document.createElementNS("http://www.w3.org/2000/svg", "line");
    line.setAttribute("x1", x1);
    line.setAttribute("y1", y1);
    line.setAttribute("x2", x2);
    line.setAttribute("y2", y2);
    line.setAttribute("stroke", "black");
    line.setAttribute("stroke-width", "2");
    line.setAttribute("marker-end", "url(#arrowhead)");

    svg.appendChild(line);
  }

  // Optional: Update arrows if window resizes
  window.addEventListener('resize', () => {
    svg.querySelectorAll('line').forEach(line => line.remove());
    selects.forEach(s => {
      if (s.value) {
        const fromCell = s.closest('td');
        const toCell = document.getElementById(s.value);
        if (toCell) drawArrow(fromCell, toCell);
      }
    });
  });
});
</script>
</body>

</html>
