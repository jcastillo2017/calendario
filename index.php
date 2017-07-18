<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <title>Prueba calendario - Prosoft</title>
    </head>

  <body>

  <form>
	  <table>
	  	<tr>
	  		<td>Start date: </td>
	  		<td><input type="text" name="start-date" id="startdate" required value="08/15/2008"></td>
	  	</tr>
	  	<tr>
	  		<td>Number of days: </td>
	  		<td><input type="text" name="number-days" id="numberdays" required value="17"></td>
	  	</tr>
	  	<tr>
	  		<td>Country Code: </td>
	  		<td><input type="text" name="country-code" id="countrycode" required value="US"></td>
	  	</tr>
	  	<tr>
	  		<td></td>
	  		<td><button type="button" id="generate" onclick="estructurar();numerar();">Generate calendar</button></td>
	  	</tr>
	  </table>
  </form>

  <br>


  <div class="mes">

  </div>

<script type="text/javascript">
	
	var startdate = document.getElementById("startdate").value;
	var numberdays = document.getElementById("numberdays").value;
	var countrycode = document.getElementById("countrycode").value;

	console.log(startdate,numberdays,countrycode);

	var mes_text = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
	var dia_text = ["S", "M", "T", "W", "T", "F", "S"];

function estructurar() {
  for (m = 0; m <= 11; m++) {
    //Mes
    let mes = document.createElement("DIV");
    mes.className = "mes";
    document.body.appendChild(mes);
    //Tabla
    let tabla_mes = document.createElement("TABLE");
    tabla_mes.className = "tabla_mes";
    mes.appendChild(tabla_mes);
    //Título
    let titulo = document.createElement("CAPTION");
    titulo.className = "titulo";
    titulo.innerText = mes_text[m];
    tabla_mes.appendChild(titulo);
    //Cabecera
    let cabecera = document.createElement("THEAD");
    tabla_mes.appendChild(cabecera);
    let fila = document.createElement("TR");
    cabecera.appendChild(fila);
    for (d = 0; d < 7; d++) {
      let dia = document.createElement("TH");
      dia.innerText = dia_text[d];
      fila.appendChild(dia);
    }
    //Cuerpo
    let cuerpo = document.createElement("TBODY");
    tabla_mes.appendChild(cuerpo);
    for (f = 0; f < 6; f++) {
      let fila = document.createElement("TR");
      cuerpo.appendChild(fila);
      for (d = 0; d < 7; d++) {
        let dia = document.createElement("TD");
        dia.innerText = "";
        fila.appendChild(dia);
      }     
    }    
  }
}

function numerar() {
  for (i = 1; i < 366; i++) {
    let fecha = fechaPorDia(2008, i);
    let mes = fecha.getMonth();
    let select_tabla = document.getElementsByClassName('tabla_mes')[mes];
    let dia = fecha.getDate()
    let dia_semana = fecha.getDay();
    if (dia == 1) {var sem = 0;}
    select_tabla.children[2].children[sem].children[dia_semana].innerText = dia;
    if (dia_semana == 6) { sem = sem + 1; }
  }
}

function fechaPorDia(año, dia) {
  var date = new Date(año, 0);
  return new Date(date.setDate(dia));
}

</script>

  </body>
</html>