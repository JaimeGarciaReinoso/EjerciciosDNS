<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dynamic Arrows Between Selects</title>
<style>
  table {
    border-collapse: collapse;
    margin: 20px auto;
  }
  td {
    border: 1px solid #ccc;
    padding: 5px;
    text-align: center;
    position: relative;
  }
  select {
    width: 60px;
  }
  /* SVG overlay on top of the table */
  #arrowLayer {
    position: absolute;
    top: 0;
    left: 0;
    pointer-events: none;
  }
</style>
</head>
<body>

<div id="tableContainer" style="position: relative; display: inline-block;">
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
		<th colspan="1">IP</th>
		<th colspan="6">DNS</th>
	</tr>
	<tr>
		<th colspan="1">IPdest</th>
		<th colspan="1">Flags</th>
		<th colspan="2">Queries</th>
		<th colspan="3">Answers</th>
		<td></td>
		<th colspan="1">IPdest</th>
		<th colspan="1">Flags</th>
		<th colspan="2">Queries</th>
		<th colspan="3">Answers</th>
		<td></td>
		<th colspan="1">IPdest</th>
		<th colspan="1">Flags</th>
		<th colspan="2">Queries</th>
		<th colspan="3">Answers</th>
		<td></td>
		<th colspan="1">IPdest</th>
		<th colspan="1">Flags</th>
		<th colspan="2">Queries</th>
		<th colspan="3">Answers</th>
		<td></td>
		<th colspan="1">IPdest</th>
		<th colspan="1">Flags</th>
		<th colspan="2">Queries</th>
		<th colspan="3">Answers</th>
	<tr>
		<th class="bottom-header">IPdest</th>
		<th class="bottom-header">Resp.</th>
		<th class="bottom-header">Name</th>
		<th class="bottom-header">Type</th>
		<th class="bottom-header">Name</th>
		<th class="bottom-header">Type</th>
		<th class="bottom-header">Address</th>
		<td></td>
		<th class="bottom-header">IPdest</th>
		<th class="bottom-header">Resp.</th>
		<th class="bottom-header">Name</th>
		<th class="bottom-header">Type</th>
		<th class="bottom-header">Name</th>
		<th class="bottom-header">Type</th>
		<th class="bottom-header">Address</th>
		<td></td>
		<th class="bottom-header">IPdest</th>
		<th class="bottom-header">Resp.</th>
		<th class="bottom-header">Name</th>
		<th class="bottom-header">Type</th>
		<th class="bottom-header">Name</th>
		<th class="bottom-header">Type</th>
		<th class="bottom-header">Address</th>
		<td></td>
		<th class="bottom-header">IPdest</th>
		<th class="bottom-header">Resp.</th>
		<th class="bottom-header">Name</th>
		<th class="bottom-header">Type</th>
		<th class="bottom-header">Name</th>
		<th class="bottom-header">Type</th>
		<th class="bottom-header">Address</th>
		<td></td>
		<th class="bottom-header">IPdest</th>
		<th class="bottom-header">Resp.</th>
		<th class="bottom-header">Name</th>
		<th class="bottom-header">Type</th>
		<th class="bottom-header">Name</th>
		<th class="bottom-header">Type</th>
		<th class="bottom-header">Address</th>
	</tr>

<?php
	for ($x=0;$x<=10;$x++) {
			echo "
	<tr>
		<td id=\"".($x*10+1)."\"><select name=\"c".($x+1)."-dest\"><option value=\"0\">NULL</option><option value=\"".(($x+1)*10+2)."\">Local</option><option value=\"".(($x+1)*10+3)."\">Root</option><option value=\"".(($x+1)*10+4)."\">TLD</option><option value=\"".(($x+1)*10+5)."\">Auth.</option></td>
		<td><input type=\"text\" side=\"client\" name=\"c".($x+1)."-resp\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"client\" name=\"c".($x+1)."-Qname\" size=\"5\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"client\" name=\"c".($x+1)."-Qtype\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"client\" name=\"c".($x+1)."-Aname\" size=\"5\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"client\" name=\"c".($x+1)."-Atype\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"client\" name=\"c".($x+1)."-Aaddr\" size=\"5\" value=\"NULL\"></td>
		<td class=\"ticktemplate\"></td>
		<td id=\"".($x*10+2)."\"><select name=\"l".($x+1)."-dest\"><option value=\"0\">NULL</option><option value=\"".(($x+1)*10+1)."\">Client</option><option value=\"".(($x+1)*10+3)."\">Root</option><option value=\"".(($x+1)*10+4)."\">TLD</option><option value=\"".(($x+1)*10+5)."\">Auth.</option></td>
		<td><input type=\"text\" side=\"local\" name=\"l".($x+1)."-resp\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"local\" name=\"l".($x+1)."-Qname\" size=\"5\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"local\" name=\"l".($x+1)."-Qtype\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"local\" name=\"l".($x+1)."-Aname\" size=\"5\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"local\" name=\"l".($x+1)."-Atype\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"local\" name=\"l".($x+1)."-Aaddr\" size=\"5\" value=\"NULL\"></td>
		<td class=\"ticktemplate\"></td>
		<td id=\"".($x*10+3)."\"><select name=\"r".($x+1)."-dest\"><option value=\"0\">NULL</option><option value=\"".(($x+1)*10+1)."\">Client</option><option value=\"".(($x+1)*10+2)."\">Local</option><option value=\"".(($x+1)*10+4)."\">TLD</option><option value=\"".(($x+1)*10+5)."\">Auth.</option></td>
		<td><input type=\"text\" side=\"root\" name=\"r".($x+1)."-resp\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"root\" name=\"r".($x+1)."-Qname\" size=\"5\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"root\" name=\"r".($x+1)."-Qtype\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"root\" name=\"r".($x+1)."-Aname\" size=\"5\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"root\" name=\"r".($x+1)."-Atype\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"root\" name=\"r".($x+1)."-Aaddr\" size=\"5\" value=\"NULL\"></td>
		<td class=\"ticktemplate\"></td>
		<td id=\"".($x*10+4)."\"><select name=\"t".($x+1)."-dest\"><option value=\"0\">NULL</option><option value=\"".(($x+1)*10+1)."\">Client</option><option value=\"".(($x+1)*10+2)."\">Local</option><option value=\"".(($x+1)*10+3)."\">Root</option><option value=\"".(($x+1)*10+5)."\">Auth.</option></td>
		<td><input type=\"text\" side=\"tld\" name=\"t".($x+1)."-resp\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"tld\" name=\"t".($x+1)."-Qname\" size=\"5\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"tld\" name=\"t".($x+1)."-Qtype\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"tld\" name=\"t".($x+1)."-Aname\" size=\"5\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"tld\" name=\"t".($x+1)."-Atype\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"tld\" name=\"t".($x+1)."-Aaddr\" size=\"5\" value=\"NULL\"></td>
		<td class=\"ticktemplate\"></td>
		<td id=\"".($x*10+5)."\"><select name=\"a".($x+1)."-dest\"><option value=\"0\">NULL</option><option value=\"".(($x+1)*10+1)."\">Client</option><option value=\"".(($x+1)*10+2)."\">Local</option><option value=\"".(($x+1)*10+3)."\">Root</option><option value=\"".(($x+1)*10+4)."\">TLD</option></td>
		<td><input type=\"text\" side=\"auth\" name=\"a".($x+1)."-resp\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"auth\" name=\"a".($x+1)."-Qname\" size=\"5\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"auth\" name=\"a".($x+1)."-Qtype\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"auth\" name=\"a".($x+1)."-Aname\" size=\"5\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"auth\" name=\"a".($x+1)."-Atype\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"auth\" name=\"a".($x+1)."-Aaddr\" size=\"5\" value=\"NULL\"></td>
	</tr>
";
																	}
?>

  </table>

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
		  		if (Number(selectTD.id) < (Number(destTD.id)-10)) {
			  		for (let i = 0; i < 6; i++) {
						selectTD = selectTD.nextElementSibling;
		  			}				
		  		} else {
					for (let i = 0; i < 6; i++) {
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

