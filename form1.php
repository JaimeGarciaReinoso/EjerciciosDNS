<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dynamic Arrows Between Selects</title>
<style>
  table {
    border-collapse: separate;
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

.ticktemplate {
    width: 200px;
    border-top: 1px dashed black;
    border-bottom: 1px dashed black;
}

.top-header {
    background-color: #339933;
    padding: 6px;
    border: 0px;
    border-radius: 6px 6px 0 0;
    text-transform: capitalize;
}

.ip-dns-header {
    background-color: #40bf40;
    padding: 6px;
    border: 2px;
    box-sizing: border-box;
    border-radius: 0;
    text-transform: capitalize;
    font-weight: 550;
    font-size: 14px;
}

.content-header {
    background-color: #66cc66;
    padding: 6px;
    border: 0px;
    box-sizing: border-box;
    border-radius: 0;
    text-transform: capitalize;
    font-weight: 550;
    font-size: 14px;
}


.bottom-header {
    background-color: #8cd98c;
    padding: 6px;
    border: 0px;
    box-sizing: border-box;
    border-radius: 0;
    text-transform: capitalize;
    font-weight: 550;
    font-size: 14px;
}


</style>
</head>
<body>

	<p> Ejercicio 1 - Parte 1 </p>
	<p> Un cliente DNS desea obtener la dirección IP del equipo www.uah.es (IPwww). Se sabe que el DNS local sólo tiene la dirección IP de un servidor DNS raíz (IPr), que este sólo tiene las direcciones IP de servidores TLD (entre ellas la IPes del servidor DNS con nombre .es) y que el servidor DNS de Espanha tiene la IP del servidor DNS autorizado de la UAH (la IPuah cuyo nombre es AuthUAH.es). Represente el diagrama de intercambio de mensajes de DNS</p>

<div id="tableContainer" style="position: relative; display: inline-block;">


<form action="check.php" method="POST">
	<input type="hidden" id="ExerciseID" name="ExerciseID" value="1">
  <table id="formTable">

	<tr>
		<th class="top-header" colspan="10">Client</th>
		<td></td>
		<th class="top-header" colspan="10">Local DNS</th>
		<td></td>
		<th class="top-header" colspan="10">Root DNS</th>
		<td></td>
		<th class="top-header" colspan="10">TLD DNS</th>
		<td></td>
		<th class="top-header" colspan="10">Auth. DNS</th>
	</tr>
	<tr>
		<th class="ip-dns-header" colspan="1">IP</th>
		<th  class="ip-dns-header" colspan="9">DNS</th>
		<td></td>
		<th  class="ip-dns-header" colspan="1">IP</th>
		<th  class="ip-dns-header" colspan="9">DNS</th>
		<td></td>
		<th  class="ip-dns-header" colspan="1">IP</th>
		<th  class="ip-dns-header" colspan="9">DNS</th>
		<td></td>
		<th  class="ip-dns-header" colspan="1">IP</th>
		<th  class="ip-dns-header" colspan="9">DNS</th>
		<td></td>
		<th  class="ip-dns-header" colspan="1">IP</th>
		<th  class="ip-dns-header" colspan="9">DNS</th>
		<td></td>
	</tr>
	<tr>
		<th class="content-header" colspan="1">IPdest</th>
		<th class="content-header" colspan="4">Flags</th>
		<th class="content-header" colspan="2">Queries</th>
		<th class="content-header"  colspan="3">Answers</th>
		<td></td>
		<th class="content-header"  colspan="1">IPdest</th>
		<th class="content-header"  colspan="4">Flags</th>
		<th class="content-header"  colspan="2">Queries</th>
		<th class="content-header" colspan="3">Answers</th>
		<td></td>
		<th class="content-header"  colspan="1">IPdest</th>
		<th class="content-header"  colspan="4">Flags</th>
		<th class="content-header" colspan="2">Queries</th>
		<th class="content-header" colspan="3">Answers</th>
		<td></td>
		<th class="content-header" colspan="1">IPdest</th>
		<th class="content-header" colspan="4">Flags</th>
		<th class="content-header" colspan="2">Queries</th>
		<th class="content-header" colspan="3">Answers</th>
		<td></td>
		<th class="content-header" colspan="1">IPdest</th>
		<th class="content-header" colspan="4">Flags</th>
		<th class="content-header" colspan="2">Queries</th>
		<th class="content-header" colspan="3">Answers</th>
	<tr>
		<th class="bottom-header">IPdest</th>
		<th class="bottom-header">QR</th>
		<th class="bottom-header">RD</th>
		<th class="bottom-header">RA</th>
		<th class="bottom-header">AA</th>
		<th class="bottom-header">Name</th>
		<th class="bottom-header">Type</th>
		<th class="bottom-header">Name</th>
		<th class="bottom-header">Type</th>
		<th class="bottom-header">Address</th>
		<td></td>
		<th class="bottom-header">IPdest</th>
		<th class="bottom-header">QR</th>
		<th class="bottom-header">RD</th>
		<th class="bottom-header">RA</th>
		<th class="bottom-header">AA</th>
		<th class="bottom-header">Name</th>
		<th class="bottom-header">Type</th>
		<th class="bottom-header">Name</th>
		<th class="bottom-header">Type</th>
		<th class="bottom-header">Address</th>
		<td></td>
		<th class="bottom-header">IPdest</th>
		<th class="bottom-header">QR</th>
		<th class="bottom-header">RD</th>
		<th class="bottom-header">RA</th>
		<th class="bottom-header">AA</th>
		<th class="bottom-header">Name</th>
		<th class="bottom-header">Type</th>
		<th class="bottom-header">Name</th>
		<th class="bottom-header">Type</th>
		<th class="bottom-header">Address</th>
		<td></td>
		<th class="bottom-header">IPdest</th>
		<th class="bottom-header">QR</th>
		<th class="bottom-header">RD</th>
		<th class="bottom-header">RA</th>
		<th class="bottom-header">AA</th>
		<th class="bottom-header">Name</th>
		<th class="bottom-header">Type</th>
		<th class="bottom-header">Name</th>
		<th class="bottom-header">Type</th>
		<th class="bottom-header">Address</th>
		<td></td>
		<th class="bottom-header">IPdest</th>
		<th class="bottom-header">QR</th>
		<th class="bottom-header">RD</th>
		<th class="bottom-header">RA</th>
		<th class="bottom-header">AA</th>
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
		<td id=\"".($x*10+1)."\"><select name=\"c".($x+1)."-dest\"><option value=\"0\">NULL</option><option value=\"".(($x+1)*10+2)."\">Local</option><option value=\"".(($x+1)*10+3)."\">Root</option><option value=\"".(($x+1)*10+4)."\">TLD</option><option value=\"".(($x+1)*10+5)."\">Auth.</option></td>
		<td><input type=\"text\" side=\"client\" name=\"c".($x+1)."-qr\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"client\" name=\"c".($x+1)."-rd\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"client\" name=\"c".($x+1)."-ra\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"client\" name=\"c".($x+1)."-aa\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"client\" name=\"c".($x+1)."-Qname\" size=\"5\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"client\" name=\"c".($x+1)."-Qtype\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"client\" name=\"c".($x+1)."-Aname\" size=\"5\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"client\" name=\"c".($x+1)."-Atype\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"client\" name=\"c".($x+1)."-Aaddr\" size=\"5\" value=\"NULL\"></td>
		<td class=\"ticktemplate\"></td>
		<td id=\"".($x*10+2)."\"><select name=\"l".($x+1)."-dest\"><option value=\"0\">NULL</option><option value=\"".(($x+1)*10+1)."\">Client</option><option value=\"".(($x+1)*10+3)."\">Root</option><option value=\"".(($x+1)*10+4)."\">TLD</option><option value=\"".(($x+1)*10+5)."\">Auth.</option></td>
		<td><input type=\"text\" side=\"local\" name=\"l".($x+1)."-qr\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"local\" name=\"l".($x+1)."-rd\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"local\" name=\"l".($x+1)."-ra\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"local\" name=\"l".($x+1)."-aa\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"local\" name=\"l".($x+1)."-Qname\" size=\"5\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"local\" name=\"l".($x+1)."-Qtype\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"local\" name=\"l".($x+1)."-Aname\" size=\"5\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"local\" name=\"l".($x+1)."-Atype\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"local\" name=\"l".($x+1)."-Aaddr\" size=\"5\" value=\"NULL\"></td>
		<td class=\"ticktemplate\"></td>
		<td id=\"".($x*10+3)."\"><select name=\"r".($x+1)."-dest\"><option value=\"0\">NULL</option><option value=\"".(($x+1)*10+1)."\">Client</option><option value=\"".(($x+1)*10+2)."\">Local</option><option value=\"".(($x+1)*10+4)."\">TLD</option><option value=\"".(($x+1)*10+5)."\">Auth.</option></td>
		<td><input type=\"text\" side=\"root\" name=\"r".($x+1)."-qr\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"root\" name=\"r".($x+1)."-rd\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"root\" name=\"r".($x+1)."-ra\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"root\" name=\"r".($x+1)."-aa\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"root\" name=\"r".($x+1)."-Qname\" size=\"5\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"root\" name=\"r".($x+1)."-Qtype\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"root\" name=\"r".($x+1)."-Aname\" size=\"5\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"root\" name=\"r".($x+1)."-Atype\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"root\" name=\"r".($x+1)."-Aaddr\" size=\"5\" value=\"NULL\"></td>
		<td class=\"ticktemplate\"></td>
		<td id=\"".($x*10+4)."\"><select name=\"t".($x+1)."-dest\"><option value=\"0\">NULL</option><option value=\"".(($x+1)*10+1)."\">Client</option><option value=\"".(($x+1)*10+2)."\">Local</option><option value=\"".(($x+1)*10+3)."\">Root</option><option value=\"".(($x+1)*10+5)."\">Auth.</option></td>
		<td><input type=\"text\" side=\"tld\" name=\"t".($x+1)."-qr\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"tld\" name=\"t".($x+1)."-rd\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"tld\" name=\"t".($x+1)."-ra\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"tld\" name=\"t".($x+1)."-aa\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"tld\" name=\"t".($x+1)."-Qname\" size=\"5\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"tld\" name=\"t".($x+1)."-Qtype\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"tld\" name=\"t".($x+1)."-Aname\" size=\"5\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"tld\" name=\"t".($x+1)."-Atype\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"tld\" name=\"t".($x+1)."-Aaddr\" size=\"5\" value=\"NULL\"></td>
		<td class=\"ticktemplate\"></td>
		<td id=\"".($x*10+5)."\"><select name=\"a".($x+1)."-dest\"><option value=\"0\">NULL</option><option value=\"".(($x+1)*10+1)."\">Client</option><option value=\"".(($x+1)*10+2)."\">Local</option><option value=\"".(($x+1)*10+3)."\">Root</option><option value=\"".(($x+1)*10+4)."\">TLD</option></td>
		<td><input type=\"text\" side=\"auth\" name=\"a".($x+1)."-qr\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"auth\" name=\"a".($x+1)."-rd\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"auth\" name=\"a".($x+1)."-ra\" size=\"1\" value=\"NULL\"></td>
		<td><input type=\"text\" side=\"auth\" name=\"a".($x+1)."-aa\" size=\"1\" value=\"NULL\"></td>
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
		  		if (Number(selectTD.id) < (Number(destTD.id)-10)) {
			  		for (let i = 0; i < 10; i++) {
						selectTD = selectTD.nextElementSibling;
		  			}				
		  		} else {
					for (let i = 0; i < 10; i++) {
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

